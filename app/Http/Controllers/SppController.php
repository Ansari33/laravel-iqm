<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Siswa;
use App\Models\Spp;
use Carbon\Carbon;

class SppController extends Controller
{
    //
    public function index(){
        
        $data = Spp::with(['siswa'])->get();
        return view('spp.index',compact('data'));
    }

    public function tambah(){
         $siswa =Siswa::get(['id','nama']);
        return view('spp.tambah',compact('siswa'));
    }

    public function simpan(Request $request ){
       
        $result = Spp::create([
            'tanggal' => Carbon::createFromFormat('m/d/Y', $request->tanggal)->toDateString() ,
            'siswa_id' => $request->siswa,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
        ]);

        if ($result) {
            if(isset($request->bukti)){
                $foto = $request->file('bukti');
                $foto->move('bukti-spp/','bukti-'.$result->id.'.'.$foto->getClientOriginalExtension());
                $result->bukti = 'bukti-'.$result->id.'.'.$foto->getClientOriginalExtension();
                $result->save();
            }

            return redirect('/spp')->with('berhasil','Ditambahkan!');
        }else{
            return redirect()->back()->with('Gagal','Gagal Ditambahkan!');
        }

    }
    public function edit($id){
        $siswa = Siswa::get(['id','nama']);
        $data = Spp::find($id);
        return view('spp.edit',compact('siswa','data'));
    }

    public function update(Request $request ){
        $namaBukti = $request->namaBukti;
        if(isset($request->bukti)){
            $foto = $request->file('bukti');
            $foto->move('bukti-spp/','bukti-'.$request->id.'.'.$foto->getClientOriginalExtension());
            $namaBukti = 'bukti-'.$request->id.'.'.$foto->getClientOriginalExtension();
        }
       $result = Spp::find($request->id);
       $result->tanggal = Carbon::createFromFormat('m/d/Y', $request->tanggal)->toDateString();
       $result->siswa_id = $request->siswa;
       $result->bulan = $request->bulan;
       $result->tahun = $request->tahun;
       $result->nominal = $request->nominal;
       $result->keterangan = $request->keterangan;
       $result->bukti = 'bukti-'.$result->id.'.'.$foto->getClientOriginalExtension();
       $result->save();


        if ($result) {

            return redirect('/spp')->with('berhasil','Diupdate!');
        }else{
            return redirect()->back()->with('berhasil','Gagal Di!');
        }

    }

    public function hapus($id){
       
         $result = Spp::find($id)->delete();

         if ($result) {
             return redirect('/spp')->with('berhasil','Dihapus!');
         }else{
             return redirect()->back()->with('berhasil','Gagal Terhapus!');
         }
 
     }
}
