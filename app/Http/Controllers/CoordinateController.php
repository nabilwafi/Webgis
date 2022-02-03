<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use Illuminate\Http\Request;

class CoordinateController extends Controller
{
    
    public function __construct()
    {
        $this->Marker = new Marker();
    }

    public function index() 
    {
        return view('index');
    }

    public function coordinate_json()
    {
        $results = $this->Marker->allData();
        return json_encode($results);
    }
}
