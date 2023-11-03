<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaporKelas extends Model
{
    use HasFactory;

    protected $table = 'rapor_kelas';
    protected $guarded = [];

    public function siswa()  {
        return $this->belongsTo('App\Models\Siswa','siswa_id','id');
    }

    public function indikator()  {
        return $this->belongsTo('App\Models\IndikatorKelas','indikator_id','id');
    }

}
