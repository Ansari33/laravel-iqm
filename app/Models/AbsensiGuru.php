<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiGuru extends Model
{
    use HasFactory;

    protected $table = 'absen_guru';
    protected $guarded = [];

    public function guru()  {
        return $this->belongsTo('App\Models\Ustadzah','ustadzah_id','id');
    }

    // public function kelas()  {
    //     return $this->belongsTo('App\Models\Kelas','kelas_id','id');
    // }

}
