<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\Tonton;
use App\Models\Jurusan;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function index(){
        $siswa = User::count();
        $jurusan = Jurusan::count();
        $kelas = Kelas::count();
        $mapel = Mapel::count();
        $guru = Guru::count();
        $total_materi = Materi::count();
        $video = Materi::where('tipe', 'video')->count();
        $e_book = Materi::where('tipe', 'file')->count();

        //statistik materi yang di tonton
        $tonton = Tonton::with('materi')->groupBy('materi_id')->select('materi_id', DB::raw('count(*) as total'))->orderBy('total', 'desc')->limit(5)->get();
        foreach ($tonton as $item) {
            $label_tonton[] = $item->materi->judul;
            $value_tonton[] = $item->total;
        }

        //statistik materi yang di download

        $download = Download::with('materi')->groupBy('materi_id')->select('materi_id', DB::raw('count(*) as total'))->orderBy('total', 'desc')->limit(5)->get();
        if ($download->count() > 0) {
            foreach ($download as $item) {
                $label_download[] = $item->materi->judul;
                $value_download[] = $item->total;
            }
        }

        return view('admin.dashboard', compact('siswa', 'jurusan', 'kelas','mapel','guru','total_materi','video','e_book', 'tonton','download'));
    }
}
