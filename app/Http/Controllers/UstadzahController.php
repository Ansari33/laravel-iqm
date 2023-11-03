<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ustadzah;
#use App\Models\Merk;
//use App\Models\Jenis;
use Carbon\Carbon;
use DB;

class UstadzahController extends Controller
{
    //
    public function index(){
        
        $data = Ustadzah::with([])->get();
        return view('ustadzah.index',compact('data'));
    }

    public function tambah(){
        return view('ustadzah.tambah');
    }

    public function simpan(Request $request ){
        
        DB::beginTRansaction();
        $result = Ustadzah::create([
            'nama' => $request->nama,
            'pendidikan_akhir' => $request->nis_nisn,
            'lulusan' => $request->lulusan,
            'jurusan' => $request->jurusan,
            #'tanggal_lahir' => Carbon::parse( $request->tanggal_lahir )->format('Y-m-d'),
            'ijazah' => $stringIj,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            //'kelamin' => $request->foto,
        ]);

        if ($result) {
            $extFoto = ['jpg','png','JPG','PNG'];
            $extSk = ['doc','docx','pdf','PDF'];
            if(isset($request->foto)){
                $foto = $request->file('foto');
                if (!in_array($foto->getClientOriginalExtension(),$extFoto)) {
                    DB::rollBack();
                    return redirect()->back()->with('gagal','Tipe Berkas Foto Tidak Diperbolehkan!');
                }
                $foto->move('sk-ustadzah/','foto-'.$result->id.'.'.$foto->getClientOriginalExtension());
                $result->foto = 'sk-'.$result->id.'.'.$foto->getClientOriginalExtension();
                #$result->save();
            }
            if(isset($request->sk)){
                $sk = $request->file('sk');
                if (!in_array($sk->getClientOriginalExtension(),$extSk)) {
                    DB::rollBack();
                    return redirect()->back()->with('gagal','Tipe Berkas SK Tidak Diperbolehkan!');
                }
                $sk->move('sk-ustadzah/','sk-'.$result->id.'.'.$sk->getClientOriginalExtension());
                $result->sk = 'sk-'.$result->id.'.'.$sk->getClientOriginalExtension();
                #$result->save();
            }
            if(isset($request->ijazah)){
                $ijazah = $request->file('ijazah');
                if (!in_array($ijazah->getClientOriginalExtension(),$extSk)) {
                    DB::rollBack();
                    return redirect()->back()->with('gagal','Tipe Berkas SK Tidak Diperbolehkan!');
                }
                $ijazah->move('ijazah-ustadzah/','ijazah-'.$result->id.'.'.$ijazah->getClientOriginalExtension());
                $result->ijazah = 'ijazah-'.$result->id.'.'.$ijazah->getClientOriginalExtension();
                #$result->save();
            }
            $request->save();
            DB::commit();
            return redirect('/ustadzah')->with('berhasil','Ditambahkan!');
        }else{
            DB::rollBack();
            return redirect()->back()->with('berhasil','Berhasil!');
        }

    }
    public function edit($id){
        $data = Ustadzah::find($id);
        return view('ustadzah.edit',compact('data'));
    }

    public function update(Request $request ){
        $stringFoto = $request->fileFoto;
        $stringSk = $request->fileSk;
        $stringIj = $request->fileIj;
        $extFoto = ['jpg','png','JPG','PNG'];
        $extSk = ['doc','docx','pdf','PDF'];
        if (isset($request->foto)) {
            $foto = $request->file('foto');
            if (!in_array($foto->getClientOriginalExtension(),$extFoto)) {
                DB::rollBack();
                return redirect()->back()->with('gagal','Tipe Berkas Foto Tidak Diperbolehkan!');
            }
            $foto->move('foto-ustadzah/','foto-'.$request->id.'.'.$foto->getClientOriginalExtension());
            $stringFoto = 'foto-'.$request->id.'.'.$foto->getClientOriginalExtension();
            
        }
        if (isset($request->sk)) {
            $sk = $request->file('sk');
            if (!in_array($sk->getClientOriginalExtension(),$extSk)) {
                DB::rollBack();
                return redirect()->back()->with('gagal','Tipe Berkas SK Tidak Diperbolehkan!');
            }
            $sk->move('sk-ustadzah/','sk-'.$request->id.'.'.$sk->getClientOriginalExtension());
            $stringSk = 'sk-'.$request->id.'.'.$sk->getClientOriginalExtension();
            
        }
        if (isset($request->ijazah)) {
            $ij = $request->file('ijazah');
            if (!in_array($ij->getClientOriginalExtension(),$extSk)) {
                DB::rollBack();
                return redirect()->back()->with('gagal','Tipe Berkas Tidak Diperbolehkan!');
            }
            $ij->move('ijazah-ustadzah/','sk-'.$request->id.'.'.$ij->getClientOriginalExtension());
            $stringIj = 'ijazah-'.$request->id.'.'.$ij->getClientOriginalExtension();
            
        }
        $result = Ustadzah::where('id',$request->id)->update([
            'nama' => $request->nama,
            'pendidikan_akhir' => $request->nis_nisn,
            'lulusan' => $request->lulusan,
            'jurusan' => $request->jurusan,
            #'tanggal_lahir' => Carbon::parse( $request->tanggal_lahir )->format('Y-m-d'),
            'ijazah' => $stringIj,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            'foto' => $stringFoto,
            'sk' => $stringSk,
        ]);

        if ($result) {
            return redirect('/ustadzah')->with('berhasil','Diupdate!');
        }else{
            return redirect()->back()->with('berhasil','Berhasil!');
        }

    }

    public function hapus($id){
      
         $result = Ustadzah::where('id',$id)->delete();
 
         if ($result) {
             return redirect('/ustadzah')->with('berhasil','Dihapus!');
         }else{
             return redirect()->back()->with('berhasil','Berhasil!');
         }
 
     }
}
