<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Tingkat;
use App\Models\LoginAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        $tingkat = Tingkat::all();
        return view('admin.kelas.index',compact('jurusan','tingkat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        $tingkat = Tingkat::all();
        return view('admin.kelas.create', compact('jurusan', 'tingkat'));
    }

    public function getGuruByTingkat(Request $request){
        $data = Guru::where('tingkat_id', $request->tingkat)->get();
        $tingkat = Tingkat::findOrFail($request->tingkat);
        $option = "<option value='' selected disabled>--Pilih walikelas--</option>";
        foreach ($data as $item) {
            $option.="<option value='$item->id'>$item->nama</option>";
        }
        return [
            'option' => $option,
            'tingkat' => $tingkat->tingkat_kelas
        ];
    }

    public function getSingkatanJurusan(Request $request){
        $data = Jurusan::findOrFail($request->jurusan);
        return $data->singkatan;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['nama_kelas'] = $request->singkatan_kelas. ' ' .$request->tingkat_kelas . '-' .$request->urutan;
        $validator = Validator::make($request->all(),[
            'singkatan_kelas' => 'required',
            'tingkat_kelas' => 'required',
            'urutan' => 'required',
            'nama_kelas' => 'required|unique:kelas,nama_kelas',
            'jurusan_id' => 'required',
            'tingkat_id' => 'required',
            'walikelas_id' => 'required',
        ]);
        if ($validator->fails() && $request->tingkat_id != null) {
            $guru = Guru::where('tingkat_id', $request->tingkat_id)->get();
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'guru_old' => $guru
            ]);
        }elseif ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            Kelas::create([
                'nama_kelas' => $request->nama_kelas,
                'jurusan_id' => $request->jurusan_id,
                'tingkat_id' => $request->tingkat_id,
                'walikelas_id' => $request->walikelas_id
            ]);
            LoginAdmin::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'aktivitas' => 'Menambah kelas'
            ]);
            return redirect()->route('admin.kelas.index')->with('success', 'Berhasil menambah kelas');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal menambah kelas');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Kelas::findOrFail($id);
        $total_siswa = User::where('id_kelas', $id)->count();
        return view('admin.kelas.siswa', compact('data','id', 'total_siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kelas::findOrFail($id);
        $jurusan = Jurusan::all();
        $tingkat = Tingkat::all();
        $singkatan = Jurusan::findOrFail($data->jurusan_id);
        $singkatan_jurusan = $singkatan->singkatan;
        $tingkatan = Tingkat::findOrFail($data->tingkat_id);
        $tingkat_kelas = $tingkatan->tingkat_kelas;
        $guru = Guru::where('tingkat_id', $data->tingkat_id)->get();
        $nama_kelas = $singkatan_jurusan. ' ' .$tingkat_kelas . '-';
        $urutan = explode('-',$data->nama_kelas);
        $urutan_kelas = $urutan[1];
        return view('admin.kelas.edit', compact('data', 'jurusan', 'tingkat', 'singkatan_jurusan', 'tingkat_kelas', 'guru','urutan_kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Kelas::findOrFail($id);
        $request['nama_kelas'] = $request->singkatan_kelas. ' ' .$request->tingkat_kelas . '-' .$request->urutan;
        $validation = $request->validate([
            'singkatan_kelas' => 'required',
            'tingkat_kelas' => 'required',
            'urutan' => 'required',
            'nama_kelas' => 'required|unique:kelas,nama_kelas,'.$data->id,
            'jurusan_id' => 'required',
            'tingkat_id' => 'required',
            'walikelas_id' => 'required',
        ]);

        try {
            $data->update([
                'nama_kelas' => $request->nama_kelas,
                'jurusan_id' => $request->jurusan_id,
                'tingkat_id' => $request->tingkat_id,
                'walikelas_id' => $request->walikelas_id
            ]);
            LoginAdmin::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'aktivitas' => 'Mengedit kelas'
            ]);
            return redirect()->route('admin.kelas.index')->with('success', 'Berhasil mengedit kelas');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal mengedit kelas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kelas::findOrFail($id);
        try {
            $siswa = User::where('id_kelas', $id)->get();
            if ($siswa->count() > 0) {
                return [
                    'statusCode' => 400,
                    'message' => 'Kelas tidak bisa dihapus karna ada siswa yang terdapat didalam kelas tersebut'
                ];
            }else{
                $data->delete();
                LoginAdmin::create([
                    'admin_id' => auth()->guard('admin')->user()->id,
                    'aktivitas' => 'Menghapus kelas'
                ]);
                return [
                    'statusCode' => 200,
                    'message' => 'Berhasil menghapus kelas'
                ];
            }
        } catch (\Throwable $th) {
            return [
                'statusCode' => 400,
                'message' => 'Gagal menghapus kelas'
            ];
        }
    }
}
