<?php

namespace App\Http\Controllers\Siswa;

use App\Models\User;
use App\Models\Mapel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyClassmateController extends Controller
{
    public function index(){
        $user = Auth::user();
        $classmate = User::where('id_kelas', $user->id_kelas)->orderBy('nama_lengkap', 'asc')->get();
        return view('siswa.kelas.index', compact('user', 'classmate'));
    }


}
