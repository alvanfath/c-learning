<?php

namespace App\Http\Controllers\Siswa;

use App\Models\User;
use App\Models\LoginSiswa;
use Illuminate\Http\Request;
use App\Rules\MatchSiswaPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileSiswaController extends Controller
{
    public function index(){
        $siswa = Auth::user();
        return view('siswa.profile', compact('siswa'));
    }

    public function changePassword(Request $request,$id){
        $request->validate([
            'current_password' => ['required', new MatchSiswaPassword],
            'new_password' => ['required']
        ]);
        try {
            $data = User::where('id', $id)->first();
            $data->update([
                'password' => Hash::make($request->new_password)
            ]);
            LoginSiswa::create([
                'siswa_id' => $data->id,
                'aktivitas' => 'Mengubah password'
            ]);
            return redirect()->route('siswa.my-profile')->with('success', 'Berhasil mengubah password');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal mengubah password');
        }
    }
}
