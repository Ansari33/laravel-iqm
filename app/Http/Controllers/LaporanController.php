<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stok;
use App\Models\Merk;
use App\Models\Jenis;
use App\Models\Penjualan;
use Carbon\Carbon;

class LaporanController extends Controller
{
    //
    public function index(){
        $stok = Stok::with(['merk'])->get(['id','nama','merk_id']);
        return view('laporan.index',compact('stok'));
    }

    public function tambah(){
        $stok = Stok::with(['merk'])->where('stok','>',0)->get(['id','nama','merk_id']);
        return view('penjualan.tambah',compact('stok'));
    }

    public function simpan(Request $request ){
        #return $request->all();
        $result = Penjualan::create([
            'tanggal' => Carbon::createFromFormat('m/d/Y', $request->tanggal)->toDateString() ,
            'stok_id' => $request->stok,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total' => $request->total,
            'keterangan' => $request->keterangan,
        ]);

        if ($result) {

            $stok = Stok::find($request->stok);
            $stok->stok = $stok->stok - $request->jumlah;
            $stok->save();

            return redirect('/penjualan')->with('berhasil','Ditambahkan!');
        }else{
            return redirect()->back()->with('berhasil','Berhasil!');
        }

    }
    public function edit($id){
        $stok = Stok::with(['merk'])->get(['id','nama','merk_id']);
        $data = Penjualan::find($id);
        return view('penjualan.edit',compact('stok','data'));
    }

    public function update(Request $request ){
       // return $request->nama;
       $result = Penjualan::find($request->id);
       
       $stokAwal = $result->stok_id;
       $jumlahAwal = $result->jumlah;

       $stok = Stok::find($stokAwal);
       $stok->stok = $stok->stok + $jumlahAwal;
       $stok->save();
       
       $result->tanggal = Carbon::createFromFormat('m/d/Y', $request->tanggal)->toDateString();
       $result->stok_id = $request->stok;
       $result->jumlah = $request->jumlah;
       $result->harga = $request->harga;
       $result->total = $request->total;
       $result->keterangan = $request->keterangan;
       $result->save();

        // $result = Penjualan::where('id',$request->id)->update([
        //     'tanggal' => Carbon::createFromFormat('m/d/Y', $request->tanggal)->toDateString() ,
        //     'stok_id' => $request->stok,
        //     'jumlah' => $request->jumlah,
        //     'harga' => $request->harga,
        //     'total' => $request->total,
        //     'keterangan' => $request->keterangan,
        // ]);

        if ($result) {

            $stokBaru = $request->stok;
            $jumlahBaru = $request->jumlah;

            $stok = Stok::find($stokBaru);
            $stok->stok = $stok->stok - $jumlahBaru;
            $stok->save();

            return redirect('/penjualan')->with('berhasil','Diupdate!');
        }else{
            return redirect()->back()->with('berhasil','Berhasil!');
        }

    }

    public function hapus($id){
        // return $request->nama;
         $result = Penjualan::find($id);

         $stokId = $result->stok_id;
         $jumlahStok = $result->jumlah;
 
         if ($result) {
            $result->delete();
            $stok = Stok::find($stokId);
            $stok->stok = $stok->stok + $jumlahStok;
            $stok->save();
             return redirect('/penjualan')->with('berhasil','Dihapus!');
         }else{
             return redirect()->back()->with('berhasil','Berhasil!');
         }
 
     }
}
