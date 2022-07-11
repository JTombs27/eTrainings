<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models;
use Illuminate\Http\Request;
class TrainingsController extends Controller
{
    public function __construct(Training $model)
    {
        $this->model = $model;
    }
    //
    public function index(Request $request)
    {
        return inertia('Trainings/Index', [
            //returns an array of users with name field only
            "trainings" => $this->model
                ->with(['venues'=> function($query_v){
                        $query_v->select('Venuecode','ven_name');
                }])
                ->with(['reftrain'=> function($query_x){
                    $query_x->select('train_num','train_desc');
                }])
                ->when($request->search, function ($query, $searchItem) 
                {
                    $query->whereHas('reftrain',function($q) use ($searchItem)
                                    {
                                        $q->where('train_desc','like','%'.$searchItem.'%');
                                    })
                    ->orWhereHas('venues',function($y) use ($searchItem){
                        $y->where('ven_name','like','%'.$searchItem.'%');
                    });
                })
                ->orderBy('tr_dtefr', 'DESC')
                ->simplePaginate(10)
                ->withQueryString()
                ,
            "filters" => $request->only(['search']),
            "VenCount"=> (Models\Venues::class)::get()->count(),
            "RTCount"=> (Models\RefTrain::class)::get()->count(),
            "FaCount"=>  (Models\Facilitator::class)::get()->count(),
            "can" => [
                'createUser' => auth()->user()->can('create', User::class),
                'canDeleteUser' => auth()->user()->can('canDeleteUser', User::class),
            ],
        ]);
    }

    public function getTrainings(Request $request)
    {
        $data = $this->model
        ->with(['venues'=> function($query_v){
                $query_v->select('Venuecode','ven_name');
        }])
        ->with(['reftrain'=> function($query_x){
            $query_x->select('train_num','train_desc');
        }])
        ->with('TrainAvail','Facilitators')
        ->when($request->id, function ($query, $searchItem) 
        {
            $query->whereHas('TrainAvail',function($q) use ($searchItem)
                            {
                                $q->where('fempidno',$searchItem);
                            });
        })
        ->select('train_id','tr_dtefr','tr_dteto','tr_hours','tr_code','venuecode','ref_train_train_num')
        ->orderBy('tr_dtefr', 'DESC')->get();
        return $data;
        //$this->model->where('tr_code',$var_empl_id)->first();
        //return "sample ".$var_empl_id;
    }
}
