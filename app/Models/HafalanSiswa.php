<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HafalanSiswa extends Model
{
    use HasFactory;

    protected $table = 'hafalan_siswa';
    protected $guarded = [];

    public function siswa()  {
        return $this->belongsTo('App\Models\Siswa','siswa_id','id');
    }

    public function penguji()  {
        return $this->belongsTo('App\Models\Ustadzah','penguji_id','id');
    }

}
