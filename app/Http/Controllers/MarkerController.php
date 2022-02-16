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


    public function admin() {
        $lahans = DB::table('tb_lahan')->get();
        return view('contents.dashboard', compact('lahans'));
    }

    public function create() {
        return view('contents.form');
    }

    public function store(Request $request) {
        
        $validated = $request->validate([
            'nama_lahan' => 'required',
            'alamat_lahan' => 'required',
            'luas_lahan' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'foto_lahan' => 'required|mimes:jpg,bmp,png,jpeg'
        ]);

        $data = array(
            'nama_lahan' => $request->nama_lahan,
            'alamat_lahan' => $request->alamat_lahan,
            'luas_lahan' => $request->luas_lahan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        );

        $image = $request->foto_lahan;
        if($image) {
            $image_input = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('image/posting/'.$image_input);
            
            $data['foto_lahan'] = 'image/posting/'.$image_input;
            $DBMarker = DB::table('tb_lahan')->insert($data);
            return redirect()->route('dashboard');
        }
    }

    public function edit($id) {

        $lahan = DB::table('tb_lahan')->where('id_lahan', $id)->first();
        return view('contents.edit', compact('lahan'));
    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            'nama_lahan' => 'required',
            'alamat_lahan' => 'required',
            'luas_lahan' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $data = array(
            'nama_lahan' => $request->nama_lahan,
            'alamat_lahan' => $request->alamat_lahan,
            'luas_lahan' => $request->luas_lahan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        );

        $old_image = $request->old_image;
        $image = $request->foto_lahan;
        if($image) {
            $image_input = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('image/posting/'.$image_input);
            
            unlink($old_image);
            $data['foto_lahan'] = 'image/posting/'.$image_input;

            DB::table('tb_lahan')->where('id_lahan', $id)->update($data);
            
            return redirect('/dashboard');
        }

        DB::table('tb_lahan')->where('id_lahan', $id)->update($data);
        return redirect('/dashboard');
    }

    public function delete($id) {
        $data = DB::table('tb_lahan')->where('id_lahan', $id)->first();
        DB::table('tb_lahan')->where('id_lahan', $id)->delete();
        unlink($data->foto_lahan);
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
