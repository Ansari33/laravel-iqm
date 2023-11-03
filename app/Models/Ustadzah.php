<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ustadzah extends Model
{
    use HasFactory;

    protected $table = 'ustadzah';
    protected $guarded = [];


    // public function merk()  {
    //     return $this->belongsTo('App\Models\Merk','merk_id','id');
    // }

    // public function jenis()  {
    //     return $this->belongsTo('App\Models\Jenis','jenis_id','id');
    // }

}
