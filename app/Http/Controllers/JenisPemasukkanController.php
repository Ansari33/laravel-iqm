<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stok;
use App\Models\Merk;
use App\Models\Jenis;

class MerkController extends Controller
{
    //
    public function index(){
        
        $data = Merk::all();
        return view('merk.index',compact('data'));
    }

    public function tambah(){
       
        return view('merk.tambah');
    }

    public function simpan(Request $request ){
        #return $request->all();
        $result = Merk::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        if ($result) {
            return redirect('/merk')->with('berhasil','Ditambahkan!');
        }else{
            return redirect()->back()->with('berhasil','Berhasil!');
        }

    }
    public function edit($id){
        
        $data = Merk::find($id);
        return view('merk.edit',compact('data'));
    }

    public function update(Request $request ){
       // return $request->nama;
        $result = Merk::where('id',$request->id)->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        if ($result) {
            return redirect('/merk')->with('berhasil','Diupdate!');
        }else{
            return redirect()->back()->with('berhasil','Berhasil!');
        }

    }

    public function hapus($id){
        // return $request->nama;
         $result = Merk::where('id',$id)->delete();
 
         if ($result) {
             return redirect('/merk')->with('berhasil','Dihapus!');
         }else{
             return redirect()->back()->with('berhasil','Berhasil!');
         }
 
     }
}
