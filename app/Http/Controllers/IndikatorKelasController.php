<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\IndikatorKelas;
use App\Models\Ustadzah;
use Carbon\Carbon;

class IndikatorKelasController extends Controller
{
    //
    public function index(){
        
        $data = IndikatorKelas::with([])->get();
        return view('rapor.indikator-kelas.index',compact('data'));
    }

    public function tambah(){
        return view('rapor.indikator-kelas.tambah');
    }

    public function simpan(Request $request ){
       
        $result = IndikatorKelas::create([
   
            'nama' => $request->nama,
            'urutan' => $request->urutan,
        ]);

        if ($result) {
            return redirect('/rapor/indikator-kelas')->with('berhasil','Ditambahkan!');
        }else{
            return redirect()->back()->with('Gagal','Gagal Ditambahkan!');
        }

    }
    public function edit($id){
        $data = IndikatorKelas::find($id);
        return view('rapor.indikator-kelas.edit',compact('data'));
    }

    public function update(Request $request ){
        
       $result = IndikatorKelas::find($request->id);
       $result->nama = $request->nama;
       $result->urutan = $request->urutan;
       $result->save();


        if ($result) {
            return redirect('/rapor/indikator-kelas')->with('berhasil','Diupdate!');
        }else{
            return redirect()->back()->with('berhasil','Gagal Di!');
        }

    }

    public function hapus($id){
       
         $result = IndikatorKelas::find($id)->delete();

         if ($result) {
             return redirect('/rapor/indikator-kelas')->with('berhasil','Dihapus!');
         }else{
             return redirect()->back()->with('berhasil','Gagal Terhapus!');
         }
 
     }
}
