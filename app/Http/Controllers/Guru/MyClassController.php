<?php

namespace App\Http\Controllers\Guru;

use App\Models\User;
use App\Models\Kelas;
use App\Models\LoginGuru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class MyClassController extends Controller
{
    public function index($encrypt_id){
        $id = Crypt::decryptString($encrypt_id);
        $data = Kelas::findOrFail($id);
        $total_siswa = User::where('id_kelas', $id)->count();
        return view('guru.kelas.my-class', compact('data','id', 'total_siswa'));
    }

    public function getSiswaByKelas(Request $request){
        $data = User::with('jurusan', 'tingkat', 'kelas')->where('id_kelas', $request->kelas);
        $output = datatables()->of($data)
        ->addColumn('action', function($row){
            $id = $row->id;
            $button = '<button type="button" class="btn btn-info mb-1" onclick="detailData(\'' . $id . '\')" data-toggle="tooltip" data-placement="top" title="edit"><i class="fa fa-eye"></i></button>
            <button type="button" class="btn btn-danger" onclick="deleteData(\'' . $id . '\',\'' . $row->nama_lengkap . '\')" data-toggle="tooltip" data-placement="top" title="hapus"><i class="fa fa-trash"></i></button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
        return $output;
    }

    public function show($id){
        $siswa = User::with('jurusan', 'tingkat','kelas')->where('id',$id)->first();
        return view('guru.kelas.siswa.detail', compact('siswa'));
    }

    public function destroy($id){
        try {
            User::findOrFail($id)->delete();
            LoginGuru::create([
                'guru_id' => auth()->guard('guru')->user()->id,
                'aktivitas' => 'Menghapus siswa'
            ]);
            return [
                'statusCode' => 200,
                'message' => 'Berhasil menghapus siswa'
            ];
        } catch (\Throwable $th) {
            return [
                'statusCode' => 400,
                'message' => 'Gagal menghapus siswa'
            ];
        }
    }
}
