<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stok;
use App\Models\Merk;
use App\Models\Jenis;

class JenisController extends Controller
{
    //
    public function index(){
        
        $data = Jenis::all();
        return view('jenis.index',compact('data'));
    }

    public function tambah(){
       
        return view('jenis.tambah');
    }

    public function simpan(Request $request ){
        #return $request->all();
        $result = Jenis::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        if ($result) {
            return redirect('/jenis')->with('berhasil','Ditambahkan!');
        }else{
            return redirect()->back()->with('berhasil','Berhasil!');
        }

    }
    public function edit($id){
        
        $data = Jenis::find($id);
        return view('jenis.edit',compact('data'));
    }

    public function update(Request $request ){
       // return $request->nama;
        $result = Jenis::where('id',$request->id)->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        if ($result) {
            return redirect('/jenis')->with('berhasil','Diupdate!');
        }else{
            return redirect()->back()->with('berhasil','Berhasil!');
        }

    }

    public function hapus($id){
        // return $request->nama;
         $result = Jenis::where('id',$id)->delete();
 
         if ($result) {
             return redirect('/jenis')->with('berhasil','Dihapus!');
         }else{
             return redirect()->back()->with('berhasil','Berhasil!');
         }
 
     }
}
