<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\Jurusan;
use App\Models\LoginGuru;
use App\Models\LoginAdmin;
use App\Models\LoginSiswa;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
    public function mapel(){
        $data = Mapel::with('jurusan')->orderBy('tipe', 'asc')->orderBy('jurusan_id','asc')->get();
        $output = datatables()->of($data)
        ->addColumn('action', function($row){
            $id = $row->id;
            $button = '<button type="button" class="btn btn-info" onclick="materiData(\'' . $id . '\')" title="Lihat Materi"><i class="fa fa-eye"></i></button>
            <button type="button" class="btn btn-warning" onclick="editData(\'' . $id . '\')" title="edit"><i class="fa fa-pencil-alt"></i></button>
            <button type="button" class="btn btn-danger" onclick="deleteData(\'' . $id . '\',\'' . $row->nama . '\')" title="hapus"><i class="fa fa-trash"></i></button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
        return $output;
    }

    public function jurusan(){
        $data = Jurusan::with('pembimbing')->get();
        $output = datatables()->of($data)
        ->addColumn('action', function($row){
            $id = $row->id;
            $button = '<button type="button" class="btn btn-warning" onclick="editData(\'' . $id . '\')" title="edit"><i class="fa fa-pencil-alt"></i></button>
            <button type="button" class="btn btn-danger" onclick="deleteData(\'' . $id . '\',\'' . $row->nama . '\')" title="hapus"><i class="fa fa-trash"></i></button>';
            return $button;
        })

        ->rawColumns(['action'])
        ->make(true);
        return $output;
    }

    public function guru(Request $request){
        $data = $this->getGuru($request);
        $output = datatables()->of($data)
        ->addColumn('action', function($row){
            $id = $row->id;
            $button = '<button type="button" class="btn btn-warning" onclick="editData(\'' . $id . '\')" title="edit"><i class="fa fa-pencil-alt"></i></button>
            <button type="button" class="btn btn-danger" onclick="deleteData(\'' . $id . '\',\'' . $row->nama . '\')" title="hapus"><i class="fa fa-trash"></i></button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);

        return $output;
    }

    public function getGuru($request){
        if (!empty($request->jurusan) && !empty($request->tingkat) && !! !empty($request->mapel)) {
            $data = Guru::with('tingkat','mapel','jurusan')->where('tingkat_id', $request->tingkat)->where('jurusan_id', $request->jurusan)->where('mapel_id', $request->mapel)->get();
        }elseif (!empty($request->jurusan) && !empty($request->tingkat) && empty($request->mapel)) {
            $data = Guru::with('tingkat','mapel','jurusan')->where('tingkat_id', $request->tingkat)->where('jurusan_id', $request->jurusan)->get();
        }elseif (!empty($request->jurusan) && empty($request->tingkat) && !empty($request->mapel)) {
            $data = Guru::with('tingkat','mapel','jurusan')->where('jurusan_id', $request->jurusan)->where('mapel_id', $request->mapel)->get();
        }elseif (empty($request->jurusan) && !empty($request->tingkat) && !empty($request->mapel)) {
            $data = Guru::with('tingkat','mapel','jurusan')->where('tingkat_id', $request->tingkat)->where('mapel_id', $request->mapel)->get();
        }elseif (!empty($request->jurusan) && empty($request->tingkat) && empty($request->mapel)) {
            $data = Guru::with('tingkat','mapel','jurusan')->where('jurusan_id', $request->jurusan)->get();
        }elseif (empty($request->jurusan) && !empty($request->tingkat) && empty($request->mapel)) {
            $data = Guru::with('tingkat','mapel','jurusan')->where('tingkat_id', $request->tingkat)->get();
        }elseif (empty($request->jurusan) && empty($request->tingkat) && !empty($request->mapel)) {
            $data = Guru::with('tingkat','mapel','jurusan')->where('mapel_id', $request->mapel)->get();
        }else{
            $data = Guru::with('tingkat','mapel','jurusan')->get();
        }
        return $data;
    }

    public function kelas(Request $request){
        $data = $this->getKelas($request);
        $output = datatables()->of($data)
        ->addColumn('action', function($row){
            $id = $row->id;
            $button = '<button type="button" class="btn btn-info" onclick="seeStudent(\'' . $id . '\')" data-toggle="tooltip" data-placement="top" title="Lihat siswa dikelas ini"><i class="fa fa-user-friends"></i></button>
            <button type="button" class="btn btn-warning" onclick="editData(\'' . $id . '\')" data-toggle="tooltip" data-placement="top" title="edit"><i class="fa fa-pencil-alt"></i></button>
            <button type="button" class="btn btn-danger" onclick="deleteData(\'' . $id . '\',\'' . $row->nama_kelas . '\')" data-toggle="tooltip" data-placement="top" title="hapus"><i class="fa fa-trash"></i></button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
        return $output;
    }

    public function getKelas(Request $request){
        if (!empty($request->jurusan) && !empty($request->tingkat)) {
            $data = Kelas::with('jurusan','tingkat','walikelas')->where('jurusan_id', $request->jurusan)->where('tingkat_id', $request->tingkat)->orderBy('tingkat_id', 'ASC')->orderBy('nama_kelas', 'asc')->get();
        }elseif (!empty($request->jurusan) && empty($request->tingkat)) {
            $data = Kelas::with('jurusan','tingkat','walikelas')->where('jurusan_id', $request->jurusan)->orderBy('tingkat_id', 'ASC')->orderBy('nama_kelas', 'asc')->get();
        }elseif (empty($request->jurusan) && !empty($request->tingkat)) {
            $data = Kelas::with('jurusan','tingkat','walikelas')->where('tingkat_id', $request->tingkat)->orderBy('tingkat_id', 'ASC')->orderBy('nama_kelas', 'asc')->get();
        }else{
            $data = Kelas::with('jurusan','tingkat','walikelas')->orderBy('tingkat_id', 'ASC')->orderBy('nama_kelas', 'asc')->get();
        }

        return $data;
    }

    public function siswa(Request $request){
        $data = $this->getSiswa($request);
        $output = datatables()->of($data)
        ->addColumn('action', function($row){
            $id = $row->id;
            $button = '<button type="button" class="btn btn-info mb-1" onclick="detailData(\'' . $id . '\')" title="lihat detail"><i class="fa fa-eye"></i></button>
            <button type="button" class="btn btn-danger" onclick="deleteData(\'' . $id . '\',\'' . $row->nama_lengkap . '\')" title="hapus"><i class="fa fa-trash"></i></button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);

        return $output;
    }

    public function getSiswa($request){
        if (!empty($request->jurusan) && !empty($request->tingkat)) {
            $data = User::with('jurusan','tingkat','kelas')->where('id_jurusan', $request->jurusan)->where('id_tingkat', $request->tingkat)->orderBy('id_tingkat', 'ASC')->get();
        }elseif (!empty($request->jurusan) && empty($request->tingkat)) {
            $data = User::with('jurusan','tingkat','kelas')->where('id_jurusan', $request->jurusan)->orderBy('id_tingkat', 'ASC')->get();
        }elseif (empty($request->jurusan) && !empty($request->tingkat)) {
            $data = User::with('jurusan','tingkat','kelas')->where('id_tingkat', $request->tingkat)->orderBy('id_tingkat', 'ASC')->get();
        }else{
            $data = User::with('jurusan','tingkat','kelas')->orderBy('id_tingkat', 'ASC')->get();
        }

        return $data;
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

    public function activityAdmin(){
        $data = LoginAdmin::with('admin')->latest()->get();
        $output = datatables()->of($data)
        ->editColumn('created_at', function($row){
            return $row->created_at->diffForHumans();
        })
        ->make(true);
        return $output;
    }
    public function activityGuru(){
        $data = LoginGuru::with('guru')->latest()->get();
        $output = datatables()->of($data)
        ->editColumn('created_at', function($row){
            return $row->created_at->diffForHumans();
        })
        ->make(true);
        return $output;
    }
    public function activitySiswa(){
        $data = LoginSiswa::with('siswa')->latest()->get();
        $output = datatables()->of($data)
        ->editColumn('created_at', function($row){
            return $row->created_at->diffForHumans();
        })
        ->make(true);
        return $output;
    }

    public function materiVideo(){
        $data = Materi::with('jurusan','tingkat','mapel')->where('tipe', 'video')->get();
        $output = datatables()->of($data)
        ->editColumn('created_at', function($row){
            return $row->created_at->diffForHumans();
        })
        ->make(true);
        return $output;
    }

    public function materiEbook(){
        $data = Materi::with('jurusan','tingkat','mapel')->where('tipe', 'file')->get();
        $output = datatables()->of($data)
        ->editColumn('created_at', function($row){
            return $row->created_at->diffForHumans();
        })
        ->make(true);
        return $output;
    }

}
