<?php

namespace App\Http\Controllers;

use App\Models\Scholl;
use App\Models\LoginAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IdentitasSekolahController extends Controller
{
    public function index(){
        $data = DB::table('identitas_sekolah')->first();
        return view('admin.identitas_sekolah.index', compact('data'));
    }

    public function update(Request $request, $id){
        $validation = $request->validate([
            'nama_sekolah' => 'required',
            'negara' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kode_postal' => 'required|numeric',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'kepala_sekolah' => 'required',
        ]);
        $data = Scholl::findOrFail($id);
        LoginAdmin::create([
            'admin_id' => auth()->guard('admin')->user()->id,
            'aktivitas' => 'Mengedit identitas sekolah'
        ]);
        try {
            $data->update($validation);

            return back()->with('success', 'Berhasil mengedit identitas sekolah');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal mengedit identitas sekolah');
        }
    }
}
