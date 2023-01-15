<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Mapel;
use App\Models\Materi;
use App\Models\Tonton;
use App\Models\Download;
use App\Models\LoginSiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class MapelMateriController extends Controller
{
    public function index(){
        $user = Auth::user();
        $mapel = Mapel::where('jurusan_id', $user->id_jurusan)->orWhere('jurusan_id', null)->get();
        return view('siswa.mapel.index', compact('mapel', 'user'));
    }
    public function mapel($nama){
        $mapel = Mapel::where('nama',$nama)->firstOrFail();
        return view('siswa.mapel.choose', compact('mapel'));
    }

    public function videoLoop($nama){
        $user = Auth::user();
        $mapel = Mapel::where('nama',$nama)->firstOrFail();
        $materi = Materi::where('mapel_id', $mapel->id)->where('tipe', 'video')->where('tingkat_id', $user->id_tingkat)->get();
        return view('siswa.mapel.video.video_loop', compact('materi','nama'));
    }

    public function videoDetail($nama,$encrypt_id){
        $user = Auth::user();
        $id = Crypt::decryptString($encrypt_id);
        $materi = Materi::with('jurusan', 'mapel', 'tingkat')->where('id', $id)->firstOrFail();
        LoginSiswa::create([
            'siswa_id' => $user->id,
            'aktivitas' => 'Menonton materi video'
        ]);
        Tonton::create([
            'materi_id' => $materi->id
        ]);
        return view('siswa.mapel.video.video_detail', compact('materi'));
    }

    public function eBookLoop($nama){
        $user = Auth::user();
        $mapel = Mapel::where('nama',$nama)->firstOrFail();
        $materi = Materi::where('mapel_id', $mapel->id)->where('tipe', 'file')->where('tingkat_id', $user->id_tingkat)->get();
        return view('siswa.mapel.e_book.e-book_loop', compact('materi','nama'));
    }

    public function downloadEbook($encrypt_id){
        $user = Auth::user();
        $id = Crypt::decryptString($encrypt_id);
        $materi = Materi::where('id', $id)->firstOrFail();
        $path = public_path('materi/file/'. $materi->file);
        LoginSiswa::create([
            'siswa_id' => $user->id,
            'aktivitas' => 'Mendownload materi E-book'
        ]);
        Download::create([
            'materi_id' => $materi->id
        ]);
        return response()->download($path);
    }


}
