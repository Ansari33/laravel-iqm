<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Rpph;
use Carbon\Carbon;
use DB;

class RpphController extends Controller
{
    //
    public function index(){
        
        $data = Rpph::with([])->get();
        return view('rpph.index',compact('data'));
    }

    public function tambah(){
        $stok = [];
        return view('rpph.tambah',compact('stok'));
    }

    public function simpan(Request $request ){
        DB::beginTransaction();
        $result = Rpph::create([
            'nama' => $request->nama,
            'tema' => $request->tema,
            'sub_tema' => $request->subtema,
        ]);

        if ($result) {
            if(isset($request->rpph)){
                $extAcc = ['doc','docx','DOC','DOCX','pdf','PDF'];
                $foto = $request->file('rpph');
                if (!in_array($foto->getClientOriginalExtension(),$extAcc)) {
                    DB::rollBack();
                    return redirect()->back()->with('gagal','Tipe Berkas Tidak Diperbolehkan!');
                }
                $foto->move('file-rpph/','rpph-'.$result->id.'.'.$foto->getClientOriginalExtension());
                $result->file = 'rpph-'.$result->id.'.'.$foto->getClientOriginalExtension();
                $result->save();
            }
            DB::commit();
            return redirect('/rpph')->with('berhasil','Ditambahkan!');
        }else{
            return redirect()->back()->with('berhasil','Berhasil!');
        }

    }
    public function edit($id){
        $stok = [];
        $data = Rpph::find($id);
        return view('rpph.edit',compact('stok','data'));
    }

    public function update(Request $request ){
        $namaRpph = $request->nama_rpph;
        if(isset($request->rpph)){
            $foto = $request->file('rpph');
            $foto->move('file-rpph/','rpph-'.$request->id.'.'.$foto->getClientOriginalExtension());
            $namaBukti = 'rpph-'.$request->id.'.'.$foto->getClientOriginalExtension();
        }
       $result = Rpph::find($request->id);
       $result->nama = $request->nama;
       $result->tema = $request->tema;
       $result->sub_tema = $request->subtema;
       $result->file = $namaRpph;
       $result->save();
        if ($result) {
            return redirect('/rpph')->with('berhasil','Diupdate!');
        }else{
            return redirect()->back()->with('berhasil','Berhasil!');
        }

    }

    public function hapus($id){
         $result = Rpph::find($id)->delete();

         if ($result) {
             return redirect('/rpph')->with('berhasil','Dihapus!');
         }else{
             return redirect()->back()->with('berhasil','Berhasil!');
         }
 
     }
}
