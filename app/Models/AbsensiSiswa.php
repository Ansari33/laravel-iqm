<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiSiswa extends Model
{
    use HasFactory;

    protected $table = 'absen_siswa';
    protected $guarded = [];

    public function siswa()  {
        return $this->belongsTo('App\Models\Siswa','siswa_id','id');
    }

    // public function kelas()  {
    //     return $this->belongsTo('App\Models\Kelas','kelas_id','id');
    // }

}
