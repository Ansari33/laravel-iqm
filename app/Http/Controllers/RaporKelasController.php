<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RaporKelas;
use App\Models\IndikatorKelas;
use App\Models\Siswa;
use Carbon\Carbon;

class RaporKelasController extends Controller
{
    //
    public function index(){
        
        $data = SIswa::with([])->get(['id','nama']);
        return view('rapor.kelas.index',compact('data'));
    }

    public function tambah(){
        //$rapor = RaporKelas::where()
        $indikator = IndikatorKelas::get(['id','nama']);
        $siswa = Siswa::get(['id','nama']);
        return view('rapor.kelas.tambah',compact('indikator','siswa'));
    }

    public function simpan(Request $request ){
       
        $result = false;
        foreach ($request->nilai as $key => $value) {
            $result = RaporKelas::create([
                'siswa_id' => $request->siswa,
                'indikator_id' => $key,
                'nilai' => $value
            ]);
        }
        if ($result) {
            return redirect('/rapor/kelas')->with('berhasil','Ditambahkan!');
        }else{
            return redirect()->back()->with('Gagal','Gagal Ditambahkan!');
        }

    }
    public function edit($id){
        $data = collect(RaporKelas::where('siswa_id',$id)->get(['indikator_id','nilai']))->pluck('nilai','indikator_id')->toArray();
        $indikator = IndikatorKelas::get(['id','nama']);
        $siswa = Siswa::find($id);
        return view('rapor.kelas.edit',compact('data','indikator','siswa'));
    }

    public function update(Request $request ){
        $result = false;
        RaporKelas::where('siswa_id',$request->id)->delete();
        foreach ($request->nilai as $key => $value) {
            $result = RaporKelas::create([
                'siswa_id' => $request->id,
                'indikator_id' => $key,
                'nilai' => $value
            ]);
        }

        if ($result) {
            return redirect('/rapor/kelas')->with('berhasil','Diupdate!');
        }else{
            return redirect('/rapor/kelas')->with('berhasil','Gagal Di!');
        }

    }

    public function hapus($id){
       
         $result = RaporKelas::find($id)->delete();

         if ($result) {
             return redirect('/rapor/indikator-kelas')->with('berhasil','Dihapus!');
         }else{
             return redirect()->back()->with('berhasil','Gagal Terhapus!');
         }
 
     }
}
