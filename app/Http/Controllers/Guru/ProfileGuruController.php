<?php

namespace App\Http\Controllers\Guru;

use App\Models\Guru;
use App\Models\LoginGuru;
use Illuminate\Http\Request;
use App\Rules\MatchGuruPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileGuruController extends Controller
{
    public function index(){
        $guru = Auth::guard('guru')->user();
        return view('guru.profile', compact('guru'));
    }

    public function update(Request $request, $id){
        $guru = Guru::where('id', $id)->firstOrFail();
        $validation = $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email|unique:admin,email|unique:guru,email,'.$guru->id
        ]);
        try {
            $guru->update($validation);
            LoginGuru::create([
                'guru_id' => $guru->id,
                'aktivitas' => 'Update Profil'
            ]);
            return back()->with('success', 'Berhasil mengedit profil');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal mengedit profil');
        }
    }

    public function myActivity(){
        $guru = LoginGuru::where('guru_id', Auth::guard('guru')->user()->id)->get();
        return view('guru.my_activity', compact('guru'));
    }

    public function updateGambar(Request $request,$id){
        $request->validate([
            'gambar' => 'required|mimes:png,jpg,webp,jpeg'
        ]);
        $guru = Guru::where('id', $id)->firstOrFail();
        try {
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $fileName = time() . '.' . $gambar->getClientOriginalName();

                // move  file
                $request->gambar->move(public_path('upload_images/guru'), $fileName);

                // delete old file
                $old_foto = public_path("upload_images/guru/{$guru->gambar}");
                if (File::exists($old_foto)) {
                    File::delete($old_foto);
                }
                $guru->update([
                    'gambar' => $fileName
                ]);
                LoginGuru::create([
                    'guru_id' => $guru->id,
                    'aktivitas' => 'Mengubah foto profil'
                ]);
                return back()->with('success', 'Ganti foto berhasil');
            }
        } catch (\Throwable $th) {
            return back()->with('success', 'Ganti foto gagal');
        }
    }

    public function removeGambar($id){
        $guru = Guru::where('id', $id)->firstOrFail();
        $old_foto = public_path("upload_images/guru/{$guru->gambar}");
        try {
            $guru->update([
                'gambar' => null
            ]);
            if (File::exists($old_foto)) {
                File::delete($old_foto);
            }
            LoginGuru::create([
                'guru_id' => $guru->id,
                'aktivitas' => 'Hapus foto Profil'
            ]);
            return back()->with('success', 'Hapus foto berhasil');
        } catch (\Throwable $th) {
            return back()->with('error', 'Hapus foto gagal');
        }
    }

    public function updatePassword(Request $request, $id){
        $request->validate([
            'current_password' => ['required', new MatchGuruPassword],
            'new_password' => ['required']
        ]);
        try {
            $data = Guru::where('id', $id)->first();
            $data->update([
                'password' => Hash::make($request->new_password)
            ]);
            LoginGuru::create([
                'guru_id' => $data->id,
                'aktivitas' => 'Mengubah password'
            ]);
            return redirect()->route('guru.profile')->with('success', 'Berhasil mengubah password');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal mengubah password');
        }
    }
}
