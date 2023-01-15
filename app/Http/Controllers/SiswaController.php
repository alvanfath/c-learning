<?php

namespace App\Http\Controllers;

use Faker\Factory;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Tingkat;
use App\Models\LoginAdmin;
use App\Models\LoginSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::orderBy('nama', 'ASC')->get();
        $tingkat = Tingkat::all();
        return view('admin.siswa.index', compact('jurusan','tingkat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::orderBy('nama', 'ASC')->get();
        $tingkat = Tingkat::all();
        return view('admin.siswa.create', compact('jurusan', 'tingkat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nis = $this->generateNis();
        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:users,nik',
            'nama_lengkap' => 'required',
            'gender' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:users,email',
            'id_tingkat' => 'required',
            'id_jurusan' => 'required',
            'id_kelas' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails() && $request->id_tingkat != null && $request->id_jurusan != null) {
            $kelas = Kelas::where('jurusan_id', $request->id_jurusan)->where('tingkat_id', $request->id_tingkat)->get();
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'kelas' => $kelas
            ]);
        }elseif ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            User::create([
                'nik' => $request->nik,
                'nis' => $nis,
                'nama_lengkap' => $request->nama_lengkap,
                'gender' => $request->gender,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'id_tingkat' => $request->id_tingkat,
                'id_jurusan' => $request->id_jurusan,
                'id_kelas' => $request->id_kelas,
                'password' => Hash::make($request->password),
            ]);
            LoginAdmin::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'aktivitas' => 'Menambah siswa'
            ]);
            return redirect()->route('admin.siswa.index')->with('success', 'Berhasil menambah siswa');
        } catch (\Throwable $th) {
            return back()->with('error', 'Sepertinya ada yang salah, silakan coba beberapa saat lagi');
        }
    }

    public function getKelasByJurusanandTingkat(Request $request){
        $kelas = Kelas::where('jurusan_id', $request->jurusan)->where('tingkat_id', $request->tingkat)->get();
        $option = "<option value='' selected disabled>--Pilih Kelas--</option>";
        foreach ($kelas as $item) {
            $option.="<option value='$item->id'>$item->nama_kelas</option>";
        }
        return $option;
    }

    protected function generateNis(){
        $nis = '1200' . mt_rand(1000,9999);
        if($this->nisExist($nis)){
            return $this->generateNis();
        }
        return $nis;
    }

    public function nisExist($nis){
        return User::where('nis', $nis)->exists();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = User::with('jurusan', 'tingkat','kelas')->where('id',$id)->first();
        return view('admin.siswa.detail', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
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
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $login_siswa = LoginSiswa::where('siswa_id', $id)->count();
            if($login_siswa > 0){
                LoginSiswa::where('siswa_id', $id)->delete();
            }
            User::findOrFail($id)->delete();
            LoginAdmin::create([
                'admin_id' => auth()->guard('admin')->user()->id,
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
