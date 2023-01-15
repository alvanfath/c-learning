<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Jurusan;
use App\Models\LoginAdmin;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jurusan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        return view('admin.jurusan.create', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|unique:jurusan,nama',
            'singkatan' => 'required|unique:jurusan,singkatan',
            'pembimbing_id' => 'nullable'
        ]);
        $validated['singkatan'] = strtoupper($request->singkatan);
        try {
            Jurusan::create($validated);
            LoginAdmin::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'aktivitas' => 'Menambah jurusan'
            ]);
            return redirect()->route('admin.jurusan.index')->with('success', 'Berhasil menambah jurusan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal menambah jurusan');
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
        $data = Jurusan::findOrFail($id);
        $guru = Guru::where('jurusan_id', $id)->get();
        return view('admin.jurusan.edit', compact('data','guru'));
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
        $data = Jurusan::findOrFail($id);
        $validated = $request->validate([
            'nama' => 'required|unique:jurusan,nama,' .$data->id,
            'singkatan' => 'required|unique:jurusan,singkatan,' .$data->id,
            'pembimbing_id' => 'nullable'
        ]);
        $validated['singkatan'] = strtoupper($request->singkatan);
        try {
            $data->update($validated);
            LoginAdmin::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'aktivitas' => 'Mengedit jurusan'
            ]);
            return redirect()->route('admin.jurusan.index')->with('success', 'Berhasil megedit jurusan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal mengedit jurusan');
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
        $data = Jurusan::findOrFail($id);
        try {
            $guru = Guru::where('jurusan_id', $id)->count();
            $mapel = Mapel::where('jurusan_id', $id)->count();
            if ($guru > 0 || $mapel > 0) {
                return [
                    'statusCode' => 500,
                    'message' => 'Tidak bisa menghapus jurusan dikarnakan jurusan ini mempunyai guru dan mapel'
                ];
            }else{
                $data->delete();
                Mapel::where('jurusan_id', $id)->delete();
                LoginAdmin::create([
                    'admin_id' => auth()->guard('admin')->user()->id,
                    'aktivitas' => 'Menghapus jurusan'
                ]);
                return [
                    'statusCode' => 200,
                    'message' => 'Berhasil menghapus jurusan'
                ];
            }

        } catch (\Throwable $th) {
            return [
                'statusCode' => 400,
                'message' => 'Gagal menghapus jurusan'
            ];
        }
    }
}
