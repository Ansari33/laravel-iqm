<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $guarded = [];

    public function wali_1()  {
        return $this->belongsTo('App\Models\Ustadzah','wali_1_id','id')->select(['id','nama']);
    }

    public function wali_2()  {
        return $this->belongsTo('App\Models\Ustadzah','wali_2_id','id')->select(['id','nama']);
    }

}
