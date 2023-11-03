<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Siswa;
use App\Models\Alumni;
use Carbon\Carbon;
use Str;
use DB;

class SiswaController extends Controller
{
    //
    public function index(){
        
        $alumni = collect(Alumni::get(['id']))->pluck('id')->toArray();
        $data = Siswa::with([])->orderBy('id','desc')->get();
        return view('siswa.index',compact('data','alumni'));
    }

    public function list(){
        
        return $data = Siswa::with([])->get();
        return view('siswa.index',compact('data'));
    }

    public function tambah(){
        return view('siswa.tambah');
    }

    public function simpan(Request $request ){
       
        #return $request->all();
        DB::beginTransaction();
        
        $result = Siswa::create([
            'uid' => Str::random(16),
            'nama' => $request->nama,
            'nis_nisn' => $request->nis_nisn,
            'kelamin' => $request->kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => Carbon::parse( $request->tanggal_lahir )->format('Y-m-d'),
            'wali' => $request->wali,
            'kontak_wali' => $request->kontak_wali,
            'alamat' => $request->alamat,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        if ($result) {
            if(isset($request->foto)){
                $extAcc = ['jpg','png'];
                $foto = $request->file('foto');
                if (!in_array($foto->getClientOriginalExtension(),$extAcc)) {
                    DB::rollBack();
                    return redirect()->back()->with('gagal','Tipe Berkas Foto Tidak Diperbolehkan!');
                }
                $foto->move('foto-siswa/','foto-'.$result->id.'.'.$foto->getClientOriginalExtension());
                $result->foto = 'foto-'.$result->id.'.'.$foto->getClientOriginalExtension();
                $result->save();
            }
            DB::commit();
            return redirect('/siswa')->with('berhasil','Ditambahkan!');
        }else{
            DB::rollBack();
            return redirect()->back()->with('berhasil','Berhasil!');
        }

    }
    public function edit($id){
        $data = Siswa::where('uid',$id)->first();;
        return view('siswa.edit',compact('data'));
    }

    public function update(Request $request ){
        $stringFoto = $request->fileFoto;
        if (isset($request->foto)) {
            $extAcc = ['jpg','png'];
            $foto = $request->file('foto');
            if (!in_array($foto->getClientOriginalExtension(),$extAcc)) {
                DB::rollBack();
                return redirect()->back()->with('gagal','Tipe Berkas Foto Tidak Diperbolehkan!');
            }
            $foto->move('foto-siswa/','foto-'.$request->id.'.'.$foto->getClientOriginalExtension());
            $stringFoto = 'foto-'.$request->id.'.'.$foto->getClientOriginalExtension();
            
        }
        $result = Siswa::where('id',$request->id)->update([
            'nama' => $request->nama,
            'nis_nisn' => $request->nis_nisn,
            'kelamin' => $request->kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => Carbon::parse( $request->tanggal_lahir )->format('Y-m-d'),
            'wali' => $request->wali,
            'kontak_wali' => $request->kontak_wali,
            'alamat' => $request->alamat,
            'tahun_masuk' => $request->tahun_masuk,
            'foto' => $stringFoto,
        ]);

        if ($result) { 
            return redirect('/siswa')->with('berhasil','Diupdate!');
        }else{
            return redirect()->back()->with('gagal','Gagal Mengupdate!');
        }

    }

    public function hapus($id){
      
         $result = Siswa::where('uid',$id)->delete();
 
         if ($result) {
             return redirect('/siswa')->with('berhasil','Dihapus!');
         }else{
             return redirect()->back()->with('berhasil','Berhasil!');
         }
 
     }
}
