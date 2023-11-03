<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\AbsensiSiswa;
use Carbon\Carbon;

class AbsensiSiswaController extends Controller
{
    //
    public function index(){
        
        $data = AbsensiSiswa::with(['siswa.kelas_siswa.kelas'])->get();
        return view('absensi.siswa.index',compact('data'));
    }

    public function harian(){
        
        $siswa = Siswa::with([])->get(['id','nama']);
        return view('absensi.siswa.harian',compact('siswa'));
    }

    public function updateHarian(Request $request){
       $result = false;
       $siswa = array_keys($request->absensi);// collect($request->absensi)->pluck()->toArray();
       AbsensiSiswa::where('tanggal',date('Y-m-d'))->whereIn('siswa_id',$siswa)->delete();
        foreach ($request->absensi as $key => $value) {
            $result = AbsensiSiswa::create([
                'siswa_id' => $key,
                'status' => $value,
                'tanggal' => date("Y-m-d"),
            ]);
        }
        if ($result) {
            #$redi = '/absensi.siswa'.'/'.$request->id.'/';
            return redirect('/kelas-siswa/absen/'.$request->kelas)->with('berhasil','Ditambahkan Harian !');
        }else{
            return redirect()->back()->with('Gagal','Gagal Ditambahkan!');
        }
    }

    public function tambah($id){
         $termasuk = collect(AbsensiSiswa::where('kelas_id',$id)->get(['siswa_id']))->pluck('siswa_id')->toArray();
         $siswa =Siswa::whereNotIn('id',$termasuk)->get(['id','nama']);
         $kelas =Kelas::get(['id','nama','tahun']);
        return view('absensi.siswa.tambah',compact('siswa','kelas','id'));
    }

    public function simpan(Request $request ){
       
        $result = AbsensiSiswa::create([
            'siswa_id' => $request->siswa,
            'kelas_id' => $request->kelas,
            'keterangan' => $request->keterangan,
        ]);

        if ($result) {
            #$redi = '/absensi.siswa'.'/'.$request->id.'/';
            return redirect('/kelas')->with('berhasil','Ditambahkan Siswa !');
        }else{
            return redirect()->back()->with('Gagal','Gagal Ditambahkan!');
        }

    }
    public function edit($id){
        $data = AbsensiSiswa::with(['siswa'])->find($id);
        $termasuk = collect(AbsensiSiswa::where('kelas_id',$data->kelas_id)->get(['siswa_id']))->pluck('siswa_id')->toArray();
        $siswa = Siswa::whereNotIn('id',$termasuk)->get(['id','nama']);
        $kelas = Kelas::get(['id','nama','tahun']);
        
        return view('absensi.siswa.edit',compact('siswa','kelas','data'));
    }

    public function update(Request $request ){
        
       $result = AbsensiSiswa::find($request->id);
       $result->siswa_id = $request->siswa;
       $result->kelas_id = $request->kelas;
       $result->keterangan = $request->keterangan;
       $result->save();


        if ($result) {

            return redirect('/kelas')->with('berhasil','Diupdate Siswa!');
        }else{
            return redirect()->back()->with('berhasil','Gagal Diupdate!');
        }

    }

    public function hapus($id){
       
         $result = AbsensiSiswa::find($id)->delete();

         if ($result) {
             return redirect('/kelas')->with('berhasil','Dihapus Siswa!');
         }else{
             return redirect()->back()->with('berhasil','Gagal Terhapus!');
         }
 
     }
}
