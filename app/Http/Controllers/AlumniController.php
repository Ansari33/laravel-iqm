<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alumni;
use App\Models\Siswa;
//use App\Models\Jenis;
use Carbon\Carbon;

class AlumniController extends Controller
{
    //
    public function index(){
        
        $data = Alumni::with(['siswa'])->get();
        return view('alumni.index',compact('data'));
    }

    public function tambah(){
        $terdaftar = collect(Alumni::get(['id']))->pluck('id')->toArray();
        $siswa = Siswa::whereNotIn('id',$terdaftar)->get(['id','nama']);
        return view('alumni.tambah', compact('siswa'));
    }

    public function simpan(Request $request ){
       // return $request->nama;
        $result = Alumni::create([
            'siswa_id' => $request->siswa,
            'tahun_lulus' => $request->tahun,
            'lanjutan' => $request->lanjutan,
        ]);

        if ($result) {

            return redirect('/alumni')->with('berhasil','Ditambahkan!');
        }else{
            return redirect()->back()->with('berhasil','Berhasil!');
        }

    }
    public function edit($id){
        $data = Alumni::with('siswa')->find($id);
        $terdaftar = collect(Alumni::get(['siswa_id']))->pluck('siswa_id')->toArray();
        $siswa = Siswa::whereNotIn('id',$terdaftar)->get(['id','nama']);
        return view('alumni.edit',compact('data','siswa'));
    }

    public function update(Request $request ){
        
        $result = Alumni::where('id',$request->id)->update([
            'siswa_id' => $request->siswa,
            'tahun_lulus' => $request->tahun,
            'lanjutan' => $request->lanjutan,
        ]);

        if ($result) {
            return redirect('/alumni')->with('berhasil','Diupdate!');
        }else{
            return redirect()->back()->with('berhasil','Berhasil!');
        }

    }

    public function hapus($id){
      
         $result = Alumni::where('id',$id)->delete();
 
         if ($result) {
             return redirect('/alumni')->with('berhasil','Dihapus!');
         }else{
             return redirect()->back()->with('berhasil','Berhasil!');
         }
 
     }

     public function sebaran(){
        $data = [];
        #$sekolah = collect(Alumni::distinct()->get(['lanjutan']))->pluck('lanjuatan');
        $alumni = Alumni::get();
        foreach ($alumni as $key => $value) 
        if(array_key_exists($value['lanjutan'],$data)){
           $data[$value['lanjutan']] += 1;
        }else{
            $data[$value['lanjutan']] = 0;
            $data[$value['lanjutan']] += 1;
        }
        return view('alumni.sebaran',compact('data'));

    } 
}
