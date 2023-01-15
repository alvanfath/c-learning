<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\LoginAdmin;
use Illuminate\Http\Request;
use App\Rules\MatchAdminPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileAdminController extends Controller
{
    // redirect ke halaman profile admin
    public function index(){
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    //function untuk update data admin
    public function update(Request $request, $id){
        $admin = Admin::where('id', $id)->first();
        $validation = $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email|unique:guru,email|unique:admin,email,'.$admin->id
        ]);
        try {
            $admin->update($validation);
            LoginAdmin::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'aktivitas' => 'Mengedit profil'
            ]);
            return redirect()->route('admin.profile')->with('success', 'Berhasil mengubah profil');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal mengubah profile');
        }
    }

    //function untuk update password
    public function updatePassword(Request $request, $id){
        $request->validate([
            'current_password' => ['required', new MatchAdminPassword],
            'new_password' => ['required']
        ]);
        try {
            $data = Admin::where('id', $id)->first();
            $data->update([
                'password' => Hash::make($request->new_password)
            ]);
            LoginAdmin::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'aktivitas' => 'Mengubah password'
            ]);
            return redirect()->route('admin.profile')->with('success', 'Berhasil mengubah password');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal mengubah password');
        }
    }

    public function updateGambar(Request $request,$id){
        $request->validate([
            'gambar' => 'required|mimes:png,jpg,webp,jpeg'
        ]);
        $admin = Admin::where('id', $id)->firstOrFail();
        try {
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $fileName = time() . '.' . $gambar->getClientOriginalName();

                // move  file
                $request->gambar->move(public_path('upload_images/admin'), $fileName);

                // delete old file
                $old_foto = public_path("upload_images/admin/{$admin->gambar}");
                if (File::exists($old_foto)) {
                    File::delete($old_foto);
                }
                $admin->update([
                    'gambar' => $fileName
                ]);
                LoginAdmin::create([
                    'admin_id' => $admin->id,
                    'aktivitas' => 'Mengubah foto profil'
                ]);
                return back()->with('success', 'Ganti foto berhasil');
            }
        } catch (\Throwable $th) {
            return back()->with('success', 'Ganti foto gagal');
        }
    }

    public function removeGambar($id){
        $admin = Admin::where('id', $id)->firstOrFail();
        $old_foto = public_path("upload_images/admin/{$admin->gambar}");
        try {
            $admin->update([
                'gambar' => null
            ]);
            if (File::exists($old_foto)) {
                File::delete($old_foto);
            }
            LoginAdmin::create([
                'admin_id' => $admin->id,
                'aktivitas' => 'Hapus foto Profil'
            ]);
            return back()->with('success', 'Hapus foto berhasil');
        } catch (\Throwable $th) {
            return back()->with('error', 'Hapus foto gagal');
        }
    }
}
