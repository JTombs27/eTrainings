<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipality;

class MunicipalityController extends Controller
{
    public function __construct(Municipality $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->get()->map(fn($row) => [
            'id' => $row->citymunCode,
            'text' => $row->citymunDesc
        ]);
        
        
    }
}
