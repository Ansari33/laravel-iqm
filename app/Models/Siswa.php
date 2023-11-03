<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use SoftDelete;

class Siswa extends Model
{
    use HasFactory;
    //use SoftDelete;

    protected $table = 'siswa';
    protected $guarded = [];


    public function kelas_siswa()  {
        return $this->belongsTo('App\Models\KelasSiswa','id','siswa_id');
    }


}
