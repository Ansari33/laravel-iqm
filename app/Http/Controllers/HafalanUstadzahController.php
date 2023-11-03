<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Siswa;
use App\Models\Ustadzah;
use App\Models\HafalanUstadzah;
use Carbon\Carbon;

class HafalanUstadzahController extends Controller
{
    //
    public function index(){
        
        $data = HafalanUstadzah::with(['ustadzah','penguji'])->get();
        return view('hafalan-ustadzah.index',compact('data'));
    }

    public function tambah(){
        # $siswa =Ustad::get(['id','nama']);
         $penguji =Ustadzah::get(['id','nama']);
        return view('hafalan-ustadzah.tambah',compact('penguji'));
    }

    public function simpan(Request $request ){
       
        $result = HafalanUstadzah::create([
            'tanggal' => Carbon::createFromFormat('m/d/Y', $request->tanggal)->toDateString() ,
            'ustadzah_id' => $request->ustadzah,
            'penguji_id' => $request->penguji,
            'surah' => $request->surah,
            'ayat' => $request->ayat,
            #'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        if ($result) {
            return redirect('/hafalan-ustadzah')->with('berhasil','Ditambahkan!');
        }else{
            return redirect()->back()->with('Gagal','Gagal Ditambahkan!');
        }

    }
    public function edit($id){
        #$siswa =Siswa::get(['id','nama']);
         $penguji =Ustadzah::get(['id','nama']);
         $data = HafalanUstadzah::find($id);
        return view('hafalan-ustadzah.edit',compact('siswa','penguji','data'));
    }

    public function update(Request $request ){
        
       $result = HafalanUstadzah::find($request->id);
       $result->ustadzah_id = $request->ustadzah;
       $result->penguji_id = $request->penguji;
       $result->tanggal = Carbon::createFromFormat('m/d/Y', $request->tanggal)->toDateString();
       $result->surah = $request->surah;
       $result->ayat = $request->ayat;
       $result->status = $request->status;
       $result->keterangan = $request->keterangan;
       $result->save();


        if ($result) {

            return redirect('/hafalan-ustadzah')->with('berhasil','Diupdate!');
        }else{
            return redirect()->back()->with('berhasil','Gagal Diupdate!');
        }

    }

    public function hapus($id){
       
         $result = HafalanUstadzah::find($id)->delete();

         if ($result) {
             return redirect('/hafalan-ustadzah')->with('berhasil','Dihapus!');
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
