<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesUser extends Model
{
    use HasFactory;
    protected $table = 'user_menu_akses';
    protected $guarded = [];


    public function user()  {
        return $this->belongsTo('App\Models\UserLogin','user','id');
    }

   
}
