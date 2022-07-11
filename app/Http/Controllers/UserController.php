<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    protected function resourceAbilityMap()
    {
        return array_merge(parent::resourceAbilityMap(), [
            'canDeleteUser' => 'canDeleteUser'
        ]);
    } 

    public function index(Request $request)
    {
        return inertia('Users/Index', [
            //returns an array of users with name field only
            "users" => $this->model
                ->with('permissions')
                ->when($request->search, function ($query, $searchItem) {
                    $query->where('name', 'like', '%' . $searchItem . '%');
                })
                ->orderBy('name', 'asc')
                ->simplePaginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'permissions' => $user->permissions,
                    'email' => $user->email,
                    'name' => $user->name,
                    'photo' => $user->getFirstMedia('avatars') ? $user->getFirstMedia('avatars')->getUrl() : '/images/no-avatar.png',
                    "can" => [
                        // 'edit' => auth()->user()->can('edit', $user),
                    ],
                ]),
            "filters" => $request->only(['search']),
            "can" => [
                'createUser' => auth()->user()->can('create', User::class),
                'canDeleteUser' => auth()->user()->can('canDeleteUser', User::class),
            ],
        ]);
    }

    public function create()
    {
        return inertia('Users/Create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        //transactions are functions that are used when you want to CRUD multiple table simultaneously
        //this will help rollback all changes if one of the table breaks which saves time to clean the mess
        DB::beginTransaction();
        try {

            $attributes['password'] = bcrypt($request->password);
            $newUser = $this->model->create($attributes);
            $user = User::find($newUser->id);

            if ($request->permission == 'Admin') {
                //1,2,3 are all available permissions for the admin
                $user->permissions()->sync([1, 2, 3]);
            } else {
                //specify an Array of permissions id here manually
                $user->permissions()->sync([]);
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/users')->with('message', $e);
        }

        return redirect('/users')->with('message', 'User created');
    }

    public function edit(Request $request, $id)
    {
        $data = $this->model->where('id', $id)->first([
            'name', 'id', 'email', 'citymunCode', 'brgyCode',
        ]);

        return inertia('Users/Create', [
            "editData" => $data,
        ]);
    }

    public function update(Request $request)
    {
        $data = $this->model->findOrFail($request->id);
        $data->update([
            'name' => $request->name,
            'citymunCode' => $request->municipal_id,
            'brgyCode' => $request->barangay_id,
        ]);

        return redirect('/users')->with('message', 'User updated');
    }

    public function destroy(Request $request)
    {
        $data = $this->model->findOrFail($request->id);
        $data->delete();

        return redirect('/users')->with('message', 'User deleted');
    }

    public function changePassword()
    {
        return inertia("Users/ChangePassword");
    }

    public function updatePassword(Request $request)
    {
        $old = $request->old;
        $new = $request->new;
        $confirm = $request->confirm;

        if (!Hash::check($old, auth()->user()->password)) {
            return back()->with('error', 'Wrong Credentials');
        }

        if ($new !== $confirm) {
            return back()->with('error', 'Not the same');
        }

        $user = $this->model->findOrFail(auth()->user()->id);
        $user->password = bcrypt($new);
        $user->save();

        return back()->with('message', 'Password Updated');
    }

    public function settings()
    {
        return inertia('Users/Settings');
    }

    public function changeName(Request $request)
    {
        $data = $this->model->findOrFail(auth()->user()->id);
        $data->update([
            'name' => $request->name,
        ]);

        return redirect('/users/settings')->with('message', 'User updated');
    }

    public function changePhoto(Request $request)
    {
        $data = $this->model->findOrFail(auth()->user()->id);

        $temporaryFile = TemporaryFile::where('folder', $request->folder)->first();

        if ($temporaryFile) {
            $data->addMedia(storage_path('app/avatars/tmp/' . $request->folder . '/' . $temporaryFile->filename))
                ->toMediaCollection('avatars');

            rmdir(storage_path('app/avatars/tmp/' . $request->folder));
            $temporaryFile->delete();
        }

        return redirect('/users/settings')->with('message', 'User updated');
    }
}
