<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;

class MarkerController extends Controller
{

    public function __construct()
    {
        $this->Marker = new Marker();
    }

    public function index() 
    {   
        $data_gedung_id = null;
        return view('contents.home', compact('data_gedung_id'));
    }

    public function index2($id) 
    {
        $data_gedung_id = Marker::find($id);
        return view('contents.home', compact('data_gedung_id'));
    }

    public function admin() {
        $markers = Marker::all();
        return view('contents.dashboard', compact('markers'));
    }

    public function create() {
        return view('contents.form');
    }

    public function store(Request $request) {
        
        $validated = $request->validate([
            'nama_gedung' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'foto' => 'required|mimes:jpg,bmp,png,jpeg'
        ]);

        $nama_gedung = $request->nama_gedung;
        $alamat = $request->alamat;
        $deskripsi = $request->deskripsi;
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        $image = $request->foto;
        if($image) {
            $image_input = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('image/posting/'.$image_input);
            
            $DBMarker = new Marker;
            $DBMarker->nama_gedung = $nama_gedung;
            $DBMarker->alamat = $alamat;
            $DBMarker->deskripsi = $deskripsi;
            $DBMarker->foto = 'image/posting/'.$image_input;
            $DBMarker->latitude = $latitude;
            $DBMarker->longitude = $longitude;
            $DBMarker->save();
        }

        return redirect()->route('dashboard');
    }

    public function edit($id) {

        $marker = Marker::where('id', $id)->first();
        // var_dump($marker);
        return view('contents.edit', compact('marker'));
    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            'nama_gedung' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $nama_gedung = $request->nama_gedung;
        $alamat = $request->alamat;
        $deskripsi = $request->deskripsi;
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        $old_image = $request->old_image;
        $image = $request->foto;
        if($image) {
            $image_input = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('image/posting/'.$image_input);
            
            unlink($old_image);
            $DBmarker = Marker::find($id);
            $DBmarker->nama_gedung = $nama_gedung;
            $DBmarker->alamat = $alamat;
            $DBmarker->deskripsi = $deskripsi;
            $DBmarker->foto = 'image/posting/'.$image_input;
            $DBmarker->latitude = $latitude;
            $DBmarker->longitude = $longitude;
            $DBmarker->update();
            
            return redirect('/dashboard');
        }

        $DBmarker = Marker::find($id);
        $DBmarker->nama_gedung = $nama_gedung;
        $DBmarker->alamat = $alamat;
        $DBmarker->deskripsi = $deskripsi;
        $DBmarker->foto = $old_image;
        $DBmarker->latitude = $latitude;
        $DBmarker->longitude = $longitude;
        $DBmarker->update();
        
        return redirect('/dashboard');
    }

    public function find(Request $request) {
        $data_gedung = Marker::where('nama_gedung', $request->nama_gedung)->first();
        return redirect()->route('home', $data_gedung);
    }

    public function gedung($id) {
        $data_gedung = Marker::find($id);
        return view('contents.home2', compact('data_gedung'));
    }


    public function delete($id) {
        $DBMarker = Marker::find($id);
        $DBMarker->delete();

        return redirect('/dashboard');
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
