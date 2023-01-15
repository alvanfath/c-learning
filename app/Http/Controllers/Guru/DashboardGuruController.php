<?php

namespace App\Http\Controllers\Guru;

use App\Models\User;
use App\Models\Materi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardGuruController extends Controller
{
    public function index(){
        $guru = Auth::guard('guru')->user();
        $murid = User::where('id_tingkat', $guru->tingkat_id)->where('id_jurusan', $guru->jurusan_id)->count();
        $murid_akademis = User::where('id_tingkat', $guru->tingkat_id)->count();
        $materi = Materi::where('mapel_id', $guru->mapel_id)->where('tingkat_id', $guru->tingkat_id)->count();
        return view('guru.dashboard', compact('guru', 'murid', 'materi', 'murid_akademis'));
    }

    
}
