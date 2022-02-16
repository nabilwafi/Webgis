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
        $results = DB::table('tb_lahan')
                    ->select('nama_lahan','alamat_lahan', 'foto_lahan', 'luas_lahan' ,'latitude', 'longitude')
                    ->get();
        
        return $results;
    }

    public function getLokasi($id= '')
    {
        $result = DB::table('tb_lahan')
                    ->select('nama_lahan', 'alamat_lahan', 'foto_lahan', 'luas_lahan')
                    ->where('id_lahan', $id)
                    ->get();

        return $result;
    }
}
