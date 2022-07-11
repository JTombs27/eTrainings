<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangay;

class BarangayController extends Controller
{
    public function __construct(Barangay $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        return $this->model
                    ->where('citymunCode', $request->citymunCode)
                    ->get()->map(fn($row) => [
                        'id' => $row->brgyCode,
                        'text' => $row->brgyDesc
                    ]);
    }
}
