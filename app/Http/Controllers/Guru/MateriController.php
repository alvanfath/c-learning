<?php

namespace App\Http\Controllers\Guru;

use Faker\Factory;
use Hashids\Hashids;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\LoginGuru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guru.materi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    //video
    public function createVideo(){
        $guru = Auth::guard('guru')->user();
        return view('guru.materi.create_video',compact('guru'));
    }

    public function video(){
        $mapel = Mapel::all();
        return view('guru.materi.video', compact('mapel'));
    }

    public function videoLoop($nama){
        $mapel = Mapel::where('nama',$nama)->firstOrFail();
        $materi = Materi::where('mapel_id', $mapel->id)->where('tipe', 'video')->get();
        return view('guru.materi.video.video_loop', compact('materi', 'nama'));
    }

    public function videoDetail($encrypt_id){
        $id = Crypt::decryptString($encrypt_id);
        $materi = Materi::with('jurusan', 'mapel', 'tingkat')->where('id', $id)->firstOrFail();
        return view('guru.materi.video.video_details', compact('materi'));
    }

    //e-book
    public function createEbook(){
        $guru = Auth::guard('guru')->user();
        return view('guru.materi.create_file',compact('guru'));
    }

    public function eBook(){
        $mapel = Mapel::all();
        return view('guru.materi.e_book', compact('mapel'));
    }

    public function ebookLoop($nama){
        $mapel = Mapel::where('nama',$nama)->firstOrFail();
        $materi = Materi::where('mapel_id', $mapel->id)->where('tipe', 'file')->get();
        return view('guru.materi.eBook.e-book_loop', compact('materi', 'nama'));
    }

    public function downloadEbook($encrypt_id){
        $id = Crypt::decryptString($encrypt_id);
        $materi = Materi::where('id', $id)->firstOrFail();
        $path = public_path('materi/file/'. $materi->file);
        return response()->download($path);
    }

    //my meteri
    public function myMateri(){
        $materi = Materi::where('id_guru', Auth::guard('guru')->user()->id)->orderBy('tipe')->get();
        return view('guru.materi.my-materi', compact('materi'));
    }
    /**
     * Store a newly created resource in
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guru = Auth::guard('guru')->user();
        $faker = Factory::create();
        if ($request->tipe == 'video') {
            $request->validate([
                'judul' => 'required',
                'file' => 'required|mimes:mp4|max:20000',
                'deskripsi' => 'nullable|max:255'
            ]);
        }else{
            $request->validate([
                'judul' => 'required',
                'file' => 'required|mimes:pdf'
            ]);
        }
        // try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');


                //move file
                if ($request->tipe == 'video') {
                    $file_name = $request->judul. '_' . time() .'.mp4';
                    $request->file->move(public_path('materi/video'), $file_name);
                }else{
                    $file_name = $request->judul. '_' . time() .'.pdf';
                    $request->file->move(public_path('materi/file'), $file_name);
                }
                if ($guru->mapel->tipe == 'Akademis') {
                    Materi::create([
                        'judul' => $request->judul,
                        'file' => $file_name,
                        'mapel_id' => $guru->mapel_id,
                        'tingkat_id' => $guru->tingkat_id,
                        'tipe' => $request->tipe,
                        'deskripsi' => $request->deskripsi,
                        'uploaded_by' => $guru->nama,
                        'id_guru' => $guru->id,
                    ]);
                }else{
                    Materi::create([
                        'judul' => $request->judul,
                        'file' => $file_name,
                        'mapel_id' => $guru->mapel_id,
                        'tingkat_id' => $guru->tingkat_id,
                        'jurusan_id' => $guru->jurusan_id,
                        'tipe' => $request->tipe,
                        'uploaded_by' => $guru->nama,
                        'id_guru' => $guru->id,
                    ]);
                }
                LoginGuru::create([
                    'guru_id' => $guru->id,
                    'aktivitas' => 'Mengupload materi'
                ]);
                return redirect()->route('guru.materi.index')->with('success', 'Berhasil mengupload materi');
            }
        // } catch (\Throwable $th) {
        //     return back()->with('error', 'Gagal mengupload materi');
        // }
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
        abort(404);
    }

    /**
     * Update the specified resource in
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
     * Remove the specified resource from
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($encrypt_id)
    {
        $id = Crypt::decryptString($encrypt_id);
        $materi = Materi::where('id', $id)->firstOrFail();
        if ($materi->tipe == 'video') {
            $old_file = public_path("materi/video/{$materi->file}");
        }else{
            $old_file = public_path("materi/file/{$materi->file}");
        }
        $materi->delete();
        if (File::exists($old_file)) {
            File::delete($old_file);
        }
        LoginGuru::create([
            'guru_id' => $materi->id_guru,
            'aktivitas' => 'Menghapus Materi'
        ]);
        return redirect()->back()->with('success', 'Berhasil menghapus materi');
    }
}
