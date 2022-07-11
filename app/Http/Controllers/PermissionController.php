<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }

    public function getAllPermissions()
    {
        return $this->model->get(['id', 'permission_name', 'permission_group']);
    }

    public function updateUserPermissions(Request $request) 
    {
        $user = User::find($request->user_id);

        $user->permissions()->sync($request->permissions);

        return redirect('/users')->with('message', 'Permissions updated');
    }
}
