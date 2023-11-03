<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RaporTahfidz;
use App\Models\IndikatorTahfidz;
use App\Models\Siswa;
use Carbon\Carbon;

class RaporTahfidzController extends Controller
{
    //
    public function index(){
        
        $data = Siswa::with([])->get(['id','nama']);
        return view('rapor.tahfidz.index',compact('data'));
    }

    public function tambah(){
        //$rapor = RaporTahfidz::where()
        $indikator = IndikatorKelas::get(['id','nama']);
        $siswa = Siswa::get(['id','nama']);
        return view('rapor.tahfidz.tambah',compact('indikator','siswa'));
    }

    public function simpan(Request $request ){
       
        $result = false;
        foreach ($request->nilai as $key => $value) {
            $result = RaporTahfidz::create([
                'siswa_id' => $request->siswa,
                'indikator_id' => $key,
                'nilai' => $value
            ]);
        }
        if ($result) {
            return redirect('/rapor/tahfidz')->with('berhasil','Ditambahkan!');
        }else{
            return redirect()->back()->with('Gagal','Gagal Ditambahkan!');
        }

    }
    public function edit($id){
        $data = collect(RaporTahfidz::where('siswa_id',$id)->get(['indikator_id','nilai']))->pluck('nilai','indikator_id')->toArray();
        $indikator = IndikatorTahfidz::get(['id','nama']);
        $siswa = Siswa::find($id);
        return view('rapor.tahfidz.edit',compact('data','indikator','siswa'));
    }

    public function update(Request $request ){
        $result = false;
        RaporTahfidz::where('siswa_id',$request->id)->delete();
        foreach ($request->nilai as $key => $value) {
            $result = RaporTahfidz::create([
                'siswa_id' => $request->id,
                'indikator_id' => $key,
                'nilai' => $value
            ]);
        }

        if ($result) {
            return redirect('/rapor/tahfidz')->with('berhasil','Diupdate!');
        }else{
            return redirect('/rapor/tahfidz')->with('berhasil','Gagal Di!');
        }

    }

    public function hapus($id){
       
         $result = RaporTahfidz::find($id)->delete();

         if ($result) {
             return redirect('/rapor/indikator-tahfidz')->with('berhasil','Dihapus!');
         }else{
             return redirect()->back()->with('berhasil','Gagal Terhapus!');
         }
 
     }
}
