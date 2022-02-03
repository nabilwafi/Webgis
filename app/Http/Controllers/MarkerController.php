<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use Illuminate\Http\Request;

class MarkerController extends Controller
{

    public function __construct()
    {
        $this->Marker = new Marker();
    }

    public function index() 
    {
        return view('contents.home');
    }

    public function marker_json()
    {
        $results = $this->Marker->allData();
        return json_encode($results);
    }

    public function lokasi($id='')
    {
        $result = $this->Marker->getLokasi($id);
        return json_encode($result);
    }

}
