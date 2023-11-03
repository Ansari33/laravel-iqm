<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\IndikatorTahfidz;
use App\Models\Ustadzah;
use Carbon\Carbon;

class IndikatorTahfidzController extends Controller
{
    //
    public function index(){
        
        $data = IndikatorTahfidz::with([])->get();
        return view('rapor.indikator-tahfidz.index',compact('data'));
    }

    public function tambah(){
        return view('rapor.indikator-tahfidz.tambah');
    }

    public function simpan(Request $request ){
       
        $result = IndikatorTahfidz::create([
   
            'nama' => $request->nama,
            'urutan' => $request->urutan,
        ]);

        if ($result) {
            return redirect('/rapor/indikator-tahfidz')->with('berhasil','Ditambahkan!');
        }else{
            return redirect()->back()->with('Gagal','Gagal Ditambahkan!');
        }

    }
    public function edit($id){
        $data = IndikatorTahfidz::find($id);
        return view('rapor.indikator-tahfidz.edit',compact('data'));
    }

    public function update(Request $request ){
        
       $result = IndikatorTahfidz::find($request->id);
       $result->nama = $request->nama;
       $result->urutan = $request->urutan;
       $result->save();


        if ($result) {
            return redirect('/rapor/indikator-tahfidz')->with('berhasil','Diupdate!');
        }else{
            return redirect()->back()->with('berhasil','Gagal Di!');
        }

    }

    public function hapus($id){
       
         $result = IndikatorTahfidz::find($id)->delete();

         if ($result) {
             return redirect('/rapor/indikator-tahfidz')->with('berhasil','Dihapus!');
         }else{
             return redirect()->back()->with('berhasil','Gagal Terhapus!');
         }
 
     }
}
