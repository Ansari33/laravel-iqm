<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Route;
use App\Models\AksesUser;
use Session;

class AksesCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Session::get('user_id');
        $menu = explode ('/',Route::current()->uri)[0];
        $akses = AksesUser::where('user_id',Session::get('user_id'))->where('menu',$menu)->first();
        if($akses){
            return $next($request);
        }else{
            return redirect()->back()->with('error','Anda Tidak Memiliki Akses!');
        }
        
    }
}
