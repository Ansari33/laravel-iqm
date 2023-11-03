<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Siswa;
use App\Models\Ustadzah;
use App\Models\HafalanSiswa;
use Carbon\Carbon;

class HafalanSiswaController extends Controller
{
    //
    public function index(){
        
        $data = HafalanSiswa::with(['siswa','penguji'])->get();
        return view('hafalan-siswa.index',compact('data'));
    }

    public function tambah(){
         $siswa =Siswa::get(['id','nama']);
         $penguji =Ustadzah::get(['id','nama']);
         $surah = $this->surah();
        return view('hafalan-siswa.tambah',compact('siswa','penguji','surah'));
    }

    public function simpan(Request $request ){
       
        $result = HafalanSiswa::create([
            'tanggal' => Carbon::createFromFormat('m/d/Y', $request->tanggal)->toDateString() ,
            'siswa_id' => $request->siswa,
            'penguji_id' => $request->penguji,
            'surah' => $request->surah,
            'ayat' => $request->ayat,
            #'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        if ($result) {
            return redirect('/hafalan-siswa')->with('berhasil','Ditambahkan!');
        }else{
            return redirect()->back()->with('Gagal','Gagal Ditambahkan!');
        }

    }
    public function edit($id){
        $siswa =Siswa::get(['id','nama']);
         $penguji =Ustadzah::get(['id','nama']);
         $data = HafalanSiswa::find($id);
         $surah = $this->surah();
        return view('hafalan-siswa.edit',compact('siswa','penguji','data','surah'));
    }

    public function update(Request $request ){
        
       $result = HafalanSiswa::find($request->id);
       $result->siswa_id = $request->siswa;
       $result->penguji_id = $request->penguji;
       $result->tanggal = Carbon::createFromFormat('m/d/Y', $request->tanggal)->toDateString();
       $result->surah = $request->surah;
       $result->ayat = $request->ayat;
       $result->status = $request->status;
       $result->keterangan = $request->keterangan;
       $result->save();


        if ($result) {

            return redirect('/hafalan-siswa')->with('berhasil','Diupdate!');
        }else{
            return redirect()->back()->with('berhasil','Gagal Diupdate!');
        }

    }

    public function hapus($id){
       
         $result = HafalanSiswa::find($id)->delete();

         if ($result) {
             return redirect('/hafalan-siswa')->with('berhasil','Dihapus!');
         }else{
             return redirect()->back()->with('berhasil','Gagal Terhapus!');
         }
 
     }
    public function surah(){
        return $surah = [
            "Surah Al-Fatihah",
            "Surah Al-Baqarah",
            "Surah Ali 'Imran",
            "Surah An-Nisa'",
            "Surah Al-Ma'idah",
            "Surah Al-An'am",
            "Surah Al-A’raf",
            "Surah Al-Anfal",
            "Surah At-Taubah",
            "Surah Yunus",
            "Surah Hud",
            "Surah Yusuf",
            "Surah Ar-Ra’d",
            "Surah Ibrahim",
            "Surah Al-Hijr",
            "Surah An-Nahl",
            "Surah Al-Isra'",
            "Surah Al-Kahf",
            "Surah Maryam",
            "Surah Ta Ha",
            "Surah Al-Anbiya",
            "Surah Al-Hajj",
            "Surah Al-Mu’minun",
            "Surah An-Nur",
            "Surah Al-Furqan",
            "Surah Asy-Syu'ara'",
            "Surah An-Naml",
            "Surah Al-Qasas",
            "Surah Al-'Ankabut",
            "Surah Ar-Rum",
            "Surah Luqman",
            "Surah As-Sajdah",
            "Surah Al-Ahzab",
            "Surah Saba’",
            "Surah Fatir",
            "Surah Ya Sin",
            "Surah As-Saffat",
            "Surah Sad",
            "Surah Az-Zumar",
            "Surah Ghafir",
            "Surah Fussilat",
            "Surah Asy-Syura",
            "Surah Az-Zukhruf",
            "Surah Ad-Dukhan",
            "Surah Al-Jasiyah",
            "Surah Al-Ahqaf",
            "Surah Muhammad",
            "Surah Al-Fath",
            "Surah Al-Hujurat",
            "Surah Qaf",
            "Surah Az-Zariyat",
            "Surah At-Tur",
            "Surah An-Najm",
            "Surah Al-Qamar",
            "Surah Ar-Rahman",
            "Surah Al-Waqi’ah",
            "Surah Al-Hadid",
            "Surah Al-Mujadilah",
            "Surah Al-Hasyr",
            "Surah Al-Mumtahanah",
            "Surah As-Saff",
            "Surah Al-Jumu’ah",
            "Surah Al-Munafiqun",
            "Surah At-Tagabun",
            "Surah At-Talaq",
            "Surah At-Tahrim",
            "Surah Al-Mulk",
            "Surah Al-Qalam",
            "Surah Al-Haqqah",
            "Surah Al-Ma’arij",
            "Surah Nuh",
            "Surah Al-Jinn",
            "Surah Al-Muzzammil",
            "Surah Al-Muddassir",
            "Surah Al-Qiyamah",
            "Surah Al-Insan",
            "Surah Al-Mursalat",
            "Surah An-Naba’",
            "Surah An-Nazi’at",
            "Surah 'Abasa",
            "Surah At-Takwir",
            "Surah Al-Infitar",
            "Surah Al-Mutaffifin",
            "Surah Al-Insyiqaq",
            "Surah Al-Buruj",
            "Surah At-Tariq",
            "Surah Al-A’la",
            "Surah Al-Gasyiyah",
            "Surah Al-Fajr",
            "Surah Al-Balad",
            "Surah Asy-Syams",
            "Surah Al-Lail",
            "Surah Ad-Duha",
            "Surah Al-Insyirah",
            "Surah At-Tin",
            "Surah Al-'Alaq",
            "Surah Al-Qadr",
            "Surah Al-Bayyinah",
            "Surah Az-Zalzalah",
            "Surah Al-'Adiyat",
            "Surah Al-Qari'ah",
            "Surah At-Takasur",
            "Surah Al-'Asr",
            "Surah Al-Humazah",
            "Surah Al-Fil",
            "Surah Quraisy",
            "Surah Al-Ma’un",
            "Surah Al-Kausar",
            "Surah Al-Kafirun",
            "Surah An-Nasr",
            "Surah Al-Lahab",
            "Surah Al-Ikhlas",
            "Surah Al-Falaq",
            "Surah An-Nas",
    ];
    } 
}
