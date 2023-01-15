<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\Jurusan;
use App\Models\LoginAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.mapel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('admin.mapel.create', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->tipe == 'Produktif') {
            $validation = $request->validate([
                'nama' => 'required|unique:mapel,nama',
                'tipe' => 'required',
                'jurusan_id' => 'required',
                'logo' => 'required|image|mimes:jpeg,jpg,png|max:5000',
            ]);
        }else{
            $validation = $request->validate([
                'nama' => 'required|unique:mapel,nama',
                'tipe' => 'required',
                'jurusan_id' => 'nullable',
                'logo' => 'required|image|mimes:jpeg,jpg,png|max:5000',
            ]);
        }
        try {
            if ($request->hasFile('logo')) {
                $fileName = time() . '.' . $request->logo->getClientOriginalName();
                $validation['logo'] = $fileName;

                // move  file
                $request->logo->move(public_path('upload_images/mapel'), $fileName);

            }
            Mapel::create($validation);
            LoginAdmin::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'aktivitas' => 'Menambah mapel'
            ]);
            return redirect()->route('admin.mapel.index')->with('success', 'Berhasil menambah mata pelajaran');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal menambah mata pelajaran');
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
        $data = Mapel::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('admin.mapel.edit', compact('data','jurusan'));
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
        $data = Mapel::findOrFail($id);
        if ($request->tipe == 'Produktif') {
            $validation = $request->validate([
                'nama' => 'required|unique:mapel,nama,'.$data->id,
                'tipe' => 'required',
                'jurusan_id' => 'required',
                'logo' => 'nullable|image|mimes:jpeg,jpg,png|max:5000',
            ]);
        }else{
            $validation = $request->validate([
                'nama' => 'required|unique:mapel,nama,'.$data->id,
                'tipe' => 'required',
                'jurusan_id' => 'nullable',
                'logo' => 'nullable|image|mimes:jpeg,jpg,png|max:5000',
            ]);
        }
        try {
            if ($request->hasFile('logo')) {
                $fileName = time() . '.' . $request->logo->getClientOriginalName();
                $validation['logo'] = $fileName;

                //move file
                $request->logo->move(public_path('storege/upload_images/mapel'), $fileName);

                // delete old file
                $old_foto = public_path("upload_images/mapel/{$data->logo}");
                if (File::exists($old_foto)) {
                    File::delete($old_foto);
                }
                if ($request->tipe == 'Produktif') {
                    $data->update([
                        'nama' => $request->nama,
                        'tipe' => $request->tipe,
                        'jurusan_id' => $request->jurusan_id,
                        'logo' => $fileName
                    ]);
                }else{
                    $data->update([
                        'nama' => $request->nama,
                        'tipe' => $request->tipe,
                        'jurusan_id' => null,
                        'logo' => $fileName
                    ]);
                }
            }else{
                if ($request->tipe == 'Produktif') {
                    $data->update([
                        'nama' => $request->nama,
                        'tipe' => $request->tipe,
                        'jurusan_id' => $request->jurusan_id,
                    ]);
                }else{
                    $data->update([
                        'nama' => $request->nama,
                        'tipe' => $request->tipe,
                        'jurusan_id' => null,
                    ]);
                }
            }
            LoginAdmin::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'aktivitas' => 'Mengedit mapel'
            ]);
            return redirect()->route('admin.mapel.index')->with('success', 'Berhasil mengedit mata pelajaran');
        } catch (\Throwable $th) {
            return back()->with('success', 'Gagal mengedit mata pelajaran');
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
        $data = Mapel::findOrFail($id);
        $guru = Guru::where('mapel_id', $id)->get();
        $materi = Materi::where('mapel_id', $id)->get();
        if ($guru->count() > 0 || $materi->count() > 0)  {
            return [
                'statusCode' => 400,
                'message' => 'Tidak bisa menghapus mata pelajaran dikarnakan mata pelajaran ini mempunyai materi dan guru'
            ];
        }else{
            $old_foto = public_path("upload_images/mapel/{$data->logo}");
            if (File::exists($old_foto)) {
                File::delete($old_foto);
            }
            $data->delete();
            LoginAdmin::create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'aktivitas' => 'Menghapus mapel'
            ]);
            return [
                'statusCode' => 200,
                'message' => 'Berhasil menghapus mata pelajaran'
            ];
        }

    }
}
