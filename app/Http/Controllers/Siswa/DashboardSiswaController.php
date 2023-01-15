<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardSiswaController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('siswa.dashboard', compact('user'));
    }
}
