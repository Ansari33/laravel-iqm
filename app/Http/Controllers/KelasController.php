<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kelas;
use App\Models\Ustadzah;
use Carbon\Carbon;

class KelasController extends Controller
{
    //
    public function index(){
        
        $data = Kelas::with(['wali_1','wali_2'])->get();
        return view('kelas.index',compact('data'));
    }

    public function tambah(){
         $walis = Ustadzah::get(['id','nama']);
        return view('kelas.tambah',compact('walis'));
    }

    public function simpan(Request $request ){
       
        $result = Kelas::create([
   
            'nama' => $request->nama,
            'wali_1_id' => $request->wali_1,
            'wali_2_id' => $request->wali_2,
            'tahun' => $request->tahun,
            'keterangan' => $request->keterangan,
        ]);

        if ($result) {
            return redirect('/kelas')->with('berhasil','Ditambahkan!');
        }else{
            return redirect()->back()->with('Gagal','Gagal Ditambahkan!');
        }

    }
    public function edit($id){
        $data = Kelas::find($id);
        $walis = Ustadzah::get(['id','nama']);
        return view('kelas.edit',compact('walis','data'));
    }

    public function update(Request $request ){
        
       $result = Kelas::find($request->id);
       $result->nama = $request->nama;
       $result->tahun = $request->tahun;
       $result->wali_1_id = $request->wali_1;
       $result->wali_2_id = $request->wali_2;
       $result->keterangan = $request->keterangan;
       $result->save();


        if ($result) {
            return redirect('/kelas')->with('berhasil','Diupdate!');
        }else{
            return redirect()->back()->with('berhasil','Gagal Di!');
        }

    }

    public function hapus($id){
       
         $result = Kelas::find($id)->delete();

         if ($result) {
             return redirect('/kelas')->with('berhasil','Dihapus!');
         }else{
             return redirect()->back()->with('berhasil','Gagal Terhapus!');
         }
 
     }
}
