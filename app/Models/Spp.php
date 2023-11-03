<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;
    protected $table = 'pembayaran_spp';
    protected $guarded = [];


    public function siswa()  {
        return $this->belongsTo('App\Models\Siswa','siswa_id','id');
    }

   
}
