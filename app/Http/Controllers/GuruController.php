<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Jurusan;
use App\Models\Tingkat;
use App\Models\LoginAdmin;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
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
        $mapel = Mapel::all();
        return view('admin.guru.index', compact('jurusan','tingkat','mapel'));
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
        return view('admin.guru.create', compact('jurusan','tingkat'));
    }

    public function getMapel(Request $request){
        $data = Mapel::where('jurusan_id', $request->jurusan_id)->orWhere('jurusan_id', null)->get();
        $option = "<option value='' selected disabled>--Pilih mata pelajaran</option>";
        foreach ($data as $item) {
            $option.="<option value='$item->id'>$item->nama</option>";
        }
        return $option;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'email' => 'required|email|unique:guru,email|unique:users,email',
            'password' => 'required',
            'jurusan_id' => 'required',
            'mapel_id' => 'required',
            'tingkat_id' => 'required'
        ]);
        if ($validator->fails() && $request->jurusan_id != null) {
            $mapel = Mapel::where('jurusan_id', $request->jurusan_id)->orWhere('jurusan_id', null)->get();
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'mapel' => $mapel
            ]);
        }elseif ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            Guru::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'jurusan_id' => $request->jurusan_id,
                'mapel_id' => $request->mapel_id,
                'tingkat_id' => $request->tingkat_id
            ]);

            LoginAdmin::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'aktivitas' => 'Menambah guru'
            ]);

            return redirect()->route('admin.guru.index')->with('success', 'Berhasil menambah guru');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal menambah guru');
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
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Guru::with('tingkat','mapel','jurusan')->where('id',$id)->firstOrFail();
        $jurusan = Jurusan::all();
        $tingkat = Tingkat::all();
        $mapel = Mapel::where('jurusan_id', $data->jurusan_id)->orWhere('jurusan_id', null)->get();
        return view('admin.guru.edit', compact('data','jurusan','tingkat','mapel'));
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
        $data = Guru::findOrFail($id);
        $validation = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email|unique:guru,email,'.$data->id,
            'jurusan_id' => 'required',
            'mapel_id' => 'required',
            'tingkat_id' => 'required'
        ]);
        try {
            $data->update($validation);
            LoginAdmin::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'aktivitas' => 'Mengedit guru'
            ]);
            return redirect()->route('admin.guru.index')->with('success', 'Berhasil mengedit guru');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal mengedit guru');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //hapus guru
    public function destroy($id)
    {
        $data = Guru::findOrFail($id);

        try {
            $kelas = Kelas::where('walikelas_id', $id)->get();
            if ($kelas->count() > 0) {
                $this->updateWalikelas($data,$id);
            }
            LoginAdmin::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'aktivitas' => 'Menghapus guru'
            ]);
            $data->delete();
            return [
                'statusCode' => 200,
                'message' => 'Berhasil menghapus guru'
            ];
        } catch (\Throwable $th) {
            return [
                'statusCode' => 400,
                'message' => 'Gagal menghapus guru'
            ];
        }
    }

    //update walikelas jika si guru yang dihapus mempunyai wewenang sebagai walikelas
    public function updateWalikelas($data,$id){
        $kelas = Kelas::where('walikelas_id', $id)->get();
        $guru = Guru::where('tingkat_id', $data->tingkat_id)->where('id', '!=',$id)->get();
        foreach ($guru as $item) {
            $guru_tingkat[] = $item->id;
        }
        Kelas::where('walikelas_id', $id)->update([
            'walikelas_id' => Arr::random($guru_tingkat)
        ]);
    }
}
