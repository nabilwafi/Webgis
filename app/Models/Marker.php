<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Marker extends Model
{
    use HasFactory;

    protected $fillable = [
        'latitude',
        'longitude',
    ];

    public function allData() {
        $results = DB::table('markers')
                    ->select('nama_gedung','alamat', 'deskripsi', 'foto' ,'latitude', 'longitude')
                    ->get();
        
        return $results;
    }

    public function getLokasi($id= '')
    {
        $result = DB::table('markers')
                    ->select('nama_gedung', 'alamat', 'deskripsi', 'foto')
                    ->where('id', $id)
                    ->get();

        return $result;
    }
}
