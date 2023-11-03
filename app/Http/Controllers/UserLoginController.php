<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserLogin;
use App\Models\AksesUser;
use App\Models\Ustadzah;
use Carbon\Carbon;
use Session;
use Hash;

class UserLoginController extends Controller
{
    //
    public function authLogin(Request $request){
        #return $request->all();
        $data = UserLogin::with(['ustadzah'])->where('username',$request->username)->first();
        if ($data) {
            if (Hash::check($request->password,$data->password)) {
                Session::put('username',$data->username);
                Session::put('user_id',$data->id);
                Session::put('ustadzah_id',$data->ustadzah_id);
                Session::put('auth',true);
                return redirect('/dashboard');
            }
        }
        return redirect('/login');
        
    }

    public function index(){
        
        $data = UserLogin::with(['ustadzah'])->get();
        return view('user-menu.index',compact('data'));
    }

    public function tambah(){
         $ustadzah =Ustadzah::get(['id','nama']);
        return view('user-menu.tambah',compact('ustadzah'));
    }

    public function simpan(Request $request ){
       
        $result = UserLogin::create([
            'ustadzah_id' => $request->ustadzah,
            'username' => $request->username,
            'email' => $request->ayat,
            'password' => Hash::make($request->password),
        ]);

        if ($result) {
            return redirect('/user-menu')->with('berhasil','Ditambahkan!');
        }else{
            return redirect()->back()->with('Gagal','Gagal Ditambahkan!');
        }

    }
    public function edit($id){
         $ustadzah = Ustadzah::get(['id','nama']);
         $data = UserLogin::find($id);
        return view('user-menu.edit',compact('ustadzah','data'));
    }

    public function update(Request $request ){
        

       $result = UserLogin::find($request->id);
       $result->ustadzah_id = $request->ustadzah;
       $result->username = $request->username;
       $result->email = $request->email;
       if (isset($request->password) && $request->password !== null) {
        $result->password = Hash::make($request->password);
       } 
       $result->save();

        if ($result) {

            return redirect('/user-menu')->with('berhasil','Diupdate!');
        }else{
            return redirect()->back()->with('berhasil','Gagal Diupdate!');
        }

    }

    public function hapus($id){
       
         $result = UserLogin::find($id)->delete();

         if ($result) {
             return redirect('/user-menu')->with('berhasil','Dihapus!');
         }else{
             return redirect()->back()->with('berhasil','Gagal Terhapus!');
         }
 
     }

     public function editAkses($id){
        $ustadzah = Ustadzah::get(['id','nama']);
        $data = UserLogin::find($id);
        $akses = AksesUser::where('user_id',$id)->get(['menu'])->pluck('menu')->toArray();
       return view('user-menu.akses',compact('ustadzah','data','akses'));
   }

   public function updateAkses(Request $request ){
     
     AksesUser::where('user_id',$request->id)->delete();
     $result = false;
     foreach ($request->akses as $key => $value) {
       $result = AksesUser::create([
            'user_id' => $request->id,
            'menu'    => $value
        ]);
     }

       if ($result) {

           return redirect('/user-menu')->with('berhasil','Mengupdate Akses!');
       }else{
           return redirect()->back()->with('berhasil','Gagal Mengupdate Akses!');
       }

   }
}
