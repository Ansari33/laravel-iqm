<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HafalanUstadzah extends Model
{
    use HasFactory;

    protected $table = 'hafalan_ustadzah';
    protected $guarded = [];

    public function ustadzah()  {
        return $this->belongsTo('App\Models\Ustadzah','ustadzah_id','id');
    }

    public function penguji()  {
        return $this->belongsTo('App\Models\Ustadzah','penguji_id','id');
    }

}
