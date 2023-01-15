<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityLogin;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Guru\MateriController;
use App\Http\Controllers\Guru\MyClassController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\StatistikMateriController;
use App\Http\Controllers\Guru\ProfileGuruController;
use App\Http\Controllers\IdentitasSekolahController;
use App\Http\Controllers\Siswa\MapelMateriController;
use App\Http\Controllers\Siswa\MyClassmateController;
use App\Http\Controllers\Guru\DashboardGuruController;
use App\Http\Controllers\Siswa\ProfileSiswaController;
use App\Http\Controllers\Siswa\DashboardSiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});
Route::get('login', function () {
    return view('auth.login');
})->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('authenticate' ,[LoginController::class, 'authenticate'])->name('authenticate');

//admin
Route::prefix('admin')->middleware(['auth:admin'])->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

    //mapel
    Route::resource('mapel', MapelController::class);
    Route::get('getmapel', [DatatableController::class, 'mapel'])->name('getmapel');

    //jurusan
    Route::resource('jurusan', JurusanController::class);
    Route::get('getjurusan', [DatatableController::class, 'jurusan'])->name('getjurusan');

    //guru
    Route::resource('guru', GuruController::class);
    Route::get('getguru', [DatatableController::class, 'guru'])->name('getguru');
    Route::post('getmapeljurusan', [GuruController::class, 'getMapel'])->name('getmapeljurusan');

    //kelas
    Route::resource('kelas', KelasController::class);
    Route::get('getkelas', [DatatableController::class, 'kelas'])->name('getkelas');
    Route::post('getgurubytingkat', [KelasController::class, 'getGuruByTingkat'])->name('getgurubytingkat');
    Route::post('getsingkatanjurusan', [KelasController::class, 'getSingkatanJurusan'])->name('getsingkatanjurusan');
    Route::get('getsiswabykelas', [DatatableController::class, 'getSiswaByKelas'])->name('getsiswabykelas');

    //siswa
    Route::resource('siswa', SiswaController::class);
    Route::get('getsiswa', [DatatableController::class,'siswa'])->name('getsiswa');
    Route::post('getkelasbyjurusanandtingkat', [SiswaController::class, 'getKelasByJurusanandTingkat'])->name('getkelasbyjurusanandtingkat');

    //profile
    Route::get('profile', [ProfileAdminController::class, 'index'])->name('profile');
    Route::put('profile/update/{id}', [ProfileAdminController::class,'update'])->name('profile.update');
    Route::put('profile/update_password/{id}', [ProfileAdminController::class,'updatePassword'])->name('profile.update_password');
    Route::put('profile/update_gambar/{id}', [ProfileAdminController::class, 'updateGambar'])->name('profile.update_gambar');
    Route::put('profile/remove_gambar/{id}', [ProfileAdminController::class, 'removeGambar'])->name('profile.remove_gambar');

    //identitas sekolah
    Route::get('our-school', [IdentitasSekolahController::class, 'index'])->name('our-scholl');
    Route::put('update_school/{id}', [IdentitasSekolahController::class, 'update'])->name('our-scholl.update');

    //aktivitas login
    Route::get('activity', [ActivityLogin::class,'index'])->name('activity');
    Route::get('activity_admin', [DatatableController::class,'activityAdmin'])->name('activityadmin');
    Route::get('activity_guru', [DatatableController::class,'activityGuru'])->name('activityguru');
    Route::get('activity_siswa', [DatatableController::class,'activitySiswa'])->name('activitysiswa');

    //activity
    Route::get('my-activity', [ActivityLogin::class, 'myActivity'])->name('my-activity');

    //materi
    Route::get('materi', function () {
        return view('admin.materi.index');
    })->name('materi');
    Route::get('materi/video', [DatatableController::class, 'materiVideo'])->name('materi.video');
    Route::get('materi/ebook', [DatatableController::class, 'materiEbook'])->name('materi.ebook');

    //statistik materi
    Route::get('statistik/tonton', [StatistikMateriController::class, 'countTonton'])->name('countTonton');
});

//guru
Route::prefix('guru')->name('guru.')->middleware(['auth:guru'])->group(function () {
    Route::get('dashboard', [DashboardGuruController::class, 'index'])->name('dashboard');

    //profil
    Route::get('profile', [ProfileGuruController::class, 'index'])->name('profile');
    Route::put('profile/update/{id}', [ProfileGuruController::class, 'update'])->name('profile.update');
    Route::put('profile/update_gambar/{id}', [ProfileGuruController::class, 'updateGambar'])->name('profile.update_gambar');
    Route::put('profile/remove_gambar/{id}', [ProfileGuruController::class, 'removeGambar'])->name('profile.remove_gambar');
    Route::put('profile/update_password/{id}', [ProfileGuruController::class, 'updatePassword'])->name('profile.update_password');

    //activity
    Route::get('my-activity', [ProfileGuruController::class, 'myActivity'])->name('my-activity');

    //materi
    Route::resource('materi', MateriController::class);
    Route::prefix('materi-')->name('materi.')->group(function () {
        //video
        Route::get('create/video', [MateriController::class, 'createVideo'])->name('create_video');
        Route::get('video', [MateriController::class, 'video'])->name('video');
        Route::get('video/{nama}', [MateriController::class, 'videoLoop'])->name('video_loop');
        Route::get('video-details/{id}', [MateriController::class, 'videoDetail'])->name('video_details');

        //e-book
        Route::get('create/e-book', [MateriController::class,'createEbook'])->name('create_e-book');
        Route::get('e-book', [MateriController::class, 'eBook'])->name('ebook');
        Route::get('e-book/{nama}', [MateriController::class, 'ebookLoop'])->name('ebook_loop');
        Route::get('download/e-book/{id}', [MateriController::class, 'downloadEbook'])->name('download.ebook');

        //my materi
        Route::get('materi-saya', [MateriController::class, 'myMateri'])->name('my-materi');
    });

    //kelas
    Route::get('my-class/{id}', [MyClassController::class, 'index'])->name('my-class');
    Route::get('getsiswabykelas', [MyClassController::class, 'getSiswaByKelas'])->name('getsiswabykelas');
    Route::get('show-siswa/{id}', [MyClassController::class, 'show'])->name('siswa.show');
    Route::delete('destroy-siswa/{id}', [MyClassController::class, 'destroy'])->name('siswa.destroy');
});

//siswa
Route::prefix('siswa')->name('siswa.')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardSiswaController::class, 'index'])->name('dashboard');
    Route::get('kelasku', [MyClassmateController::class, 'index'])->name('classmate');

    Route::prefix('mapel')->group(function () {
        Route::get('/', [MapelMateriController::class, 'index'])->name('mapel');
        Route::get('/{nama}', [MapelMateriController::class,'mapel'])->name('mapel.choose');
        Route::get('/{nama}/video', [MapelMateriController::class, 'videoLoop'])->name('materi.video');
        Route::get('/{nama}/video/{id}', [MapelMateriController::class, 'videoDetail'])->name('materi.video.details');
        Route::get('/{nama}/e-book', [MapelMateriController::class, 'eBookLoop'])->name('materi.e-book');
        Route::get('download/e-book/{id}', [MapelMateriController::class, 'downloadEbook'])->name('download.ebook');
    });

    //profil
    Route::get('profil-saya',[ProfileSiswaController::class, 'index'])->name('my-profile');
    Route::put('change-password/{id}', [ProfileSiswaController::class, 'changePassword'])->name('change-password');
});
