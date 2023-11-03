<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\KelasSiswa;
use App\Models\AbsensiSiswa;
use Carbon\Carbon;

class KelasSiswaController extends Controller
{
    //
    public function index($id){
        
        $data = KelasSiswa::with(['siswa','kelas'])->where('kelas_id',$id)->get();
        return view('kelas-siswa.index',compact('data','id'));
    }

    public function tambah($id){
         $termasuk = collect(KelasSiswa::where('kelas_id',$id)->get(['siswa_id']))->pluck('siswa_id')->toArray();
         $siswa =Siswa::whereNotIn('id',$termasuk)->get(['id','nama']);
         $kelas =Kelas::get(['id','nama','tahun']);
        return view('kelas-siswa.tambah',compact('siswa','kelas','id'));
    }

    public function simpan(Request $request ){
       
        $result = KelasSiswa::create([
            'siswa_id' => $request->siswa,
            'kelas_id' => $request->kelas,
            'keterangan' => $request->keterangan,
        ]);

        if ($result) {
            #$redi = '/kelas-siswa'.'/'.$request->id.'/';
            return redirect('/kelas')->with('berhasil','Ditambahkan Siswa !');
        }else{
            return redirect()->back()->with('Gagal','Gagal Ditambahkan!');
        }

    }
    public function edit($id){
        $data = KelasSiswa::with(['siswa'])->find($id);
        $termasuk = collect(KelasSiswa::where('kelas_id',$data->kelas_id)->get(['siswa_id']))->pluck('siswa_id')->toArray();
        $siswa = Siswa::whereNotIn('id',$termasuk)->get(['id','nama']);
        $kelas = Kelas::get(['id','nama','tahun']);
        
        return view('kelas-siswa.edit',compact('siswa','kelas','data'));
    }

    public function update(Request $request ){
        
       $result = KelasSiswa::find($request->id);
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
       
         $result = KelasSiswa::find($id)->delete();
         

         if ($result) {
             return redirect('/kelas')->with('berhasil','Dihapus Siswa!');
         }else{
             return redirect()->back()->with('berhasil','Gagal Terhapus!');
         }
 
     }

     public function absen($id){
        $siswa = collect(KelasSiswa::where('kelas_id',$id)->get(['siswa_id']))->pluck('siswa_id')->toArray();
        $dataBulanIni = AbsensiSiswa::whereIn('siswa_id',$siswa)->whereMonth('tanggal',date('m'))->get();
        $grafik = [];
        $grafik = [
            'bulan' => [
                'hadir' => [],
                'tidak' => [],
                'izin' => [],
                'sakit' => [],
            ],
            'seluruh' => [
                'hadir' => [],
                'tidak' => [],
                'izin' => [],
                'sakit' => [],
            ],
            ];
        foreach ($dataBulanIni as $key => $value) {
           # return substr($value['tanggal'],5,2);
           if (substr($value['tanggal'],5,2) == date("m")) {
            switch ($value['status']) {
                case 0:
                    $grafik['bulan']['tidak'][] = $value['tanggal'];   
                    break;
                
                case 1:
                    $grafik['bulan']['hadir'][] = $value['tanggal'];
                    break;
                
                case 2:
                    $grafik['bulan']['izin'][] = $value['tanggal'];
                    break;
                
                case 3:
                    $grafik['bulan']['sakit'][] = $value['tanggal'];
                    break;
                            
                default:
                    # code...
                    break;
            }
           }
            switch ($value['status']) {
                case 0:
                    $grafik['seluruh']['tidak'][] = $value['tanggal'];   
                    break;
                
                case 1:
                    $grafik['seluruh']['hadir'][] = $value['tanggal'];
                    break;
                
                case 2:
                    $grafik['seluruh']['izin'][] = $value['tanggal'];
                    break;
                
                case 3:
                    $grafik['seluruh']['sakit'][] = $value['tanggal'];
                    break;
                            
                default:
                    # code...
                    break;
            }
        }
        #return $grafik;
        $kelas = Kelas::find($id);
        $data = AbsensiSiswa::with(['siswa'])->whereIn('siswa_id',$siswa)->get();
        return view('kelas-siswa.absen',compact('data','kelas','grafik'));
        

    } 
    public function absenHarian($id){
        $kelas = Kelas::find($id);
        $siswaK = collect(KelasSiswa::where('kelas_id',$id)->get(['siswa_id']))->pluck('siswa_id')->toArray();
        $siswa = Siswa::with([])->whereIn('id',$siswaK)->get();
        return view('kelas-siswa.absen-harian',compact('siswa','kelas'));
        

    } 
}
