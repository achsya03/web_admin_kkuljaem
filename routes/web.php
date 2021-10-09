<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('auth');
});

Route::view('auth', 'auth.login')->name('auth');
Route::view('dashboard', 'qna.index')->name('dashboard');
Route::group(['prefix' => 'qna'], function () {
    Route::view('/', 'qna.index')->name('qna');
    Route::view('/detail', 'qna.detail')->name('qna-detail');
});
Route::group(['prefix' => 'forum'], function () {
    Route::view('/', 'forum.index')->name('forum');
    Route::group(['prefix' => 'topik'], function () {
        Route::view('/', 'forum.topik.index')->name('forum-topik');
        Route::view('/create', 'forum.topik.create')->name('forum-topik-create');
        Route::view('/detail', 'forum.topik.detail')->name('forum-topik-detail');
        Route::view('/edit', 'forum.topik.edit')->name('forum-topik-edit');
    });
});
Route::group(['prefix' => 'application-setting'], function () {
    Route::group(['prefix' => 'reference-id'], function () {
        Route::view('/', 'application-setting.reference-id.index')->name('application-setting-reference-id');
        Route::view('/list', 'application-setting.reference-id.list')->name('application-setting-reference-id-list');
    });
    Route::view('/general', 'application-setting.general')->name('application-setting-general');
    Route::view('/about', 'application-setting.about')->name('application-setting-about');
});
Route::group(['prefix' => 'homepage-setting'], function () {
    Route::group(['prefix' => 'marketing-banner'], function () {
        Route::view('/', 'homepage-setting.marketing-banner.index')->name('homepage-setting-marketing-banner');
        Route::view('/create', 'homepage-setting.marketing-banner.create')->name('homepage-setting-marketing-banner-create');
        Route::view('/edit', 'homepage-setting.marketing-banner.edit')->name('homepage-setting-marketing-banner-edit');
    });
    Route::group(['prefix' => 'word-today'], function () {
        Route::view('/', 'homepage-setting.word-today.index')->name('homepage-setting-word-today');
        Route::view('/create', 'homepage-setting.word-today.create')->name('homepage-setting-word-today-create');
        Route::view('/detail', 'homepage-setting.word-today.detail')->name('homepage-setting-word-today-detail');
        Route::view('/edit', 'homepage-setting.word-today.edit')->name('homepage-setting-word-today-edit');
    });
    Route::group(['prefix' => 'video-today'], function () {
        Route::view('/', 'homepage-setting.video-today.index')->name('homepage-setting-video-today');
        Route::view('/create', 'homepage-setting.video-today.create')->name('homepage-setting-video-today-create');
        Route::view('/detail', 'homepage-setting.video-today.detail')->name('homepage-setting-video-today-detail');
        Route::view('/edit', 'homepage-setting.video-today.edit')->name('homepage-setting-video-today-edit');
    });
});
Route::group(['prefix' => 'profile'], function () {
    Route::view('/myprofile', 'profile.my')->name('profile-my');
    Route::view('/profile-edit', 'profile.edit')->name('profile-edit');
});

//dashboard
Route::view('/dashboard', 'dashboard')->name('dashboard');
//akun_pengguna
Route::view('/akun_pengguna/siswa', 'akun_pengguna.siswa.index')->name('siswa');
Route::view('/akun_pengguna/siswa/tambah', 'akun_pengguna.siswa.create')->name('tambahsiswa');
Route::view('/akun_pengguna/siswa/edit', 'akun_pengguna.siswa.edit')->name('editsiswa');
Route::view('/akun_pengguna/siswa/detail', 'akun_pengguna.siswa.detail')->name('detailsiswa');
Route::view('/akun_pengguna/mentor', 'akun_pengguna.mentor.index')->name('mentor');
Route::view('/akun_pengguna/mentor/tambah', 'akun_pengguna.mentor.create')->name('tambahmentor');
Route::view('/akun_pengguna/mentor/edit', 'akun_pengguna.mentor.edit')->name('editmentor');
Route::view('/akun_pengguna/mentor/detail', 'akun_pengguna.mentor.detail')->name('detailmentor');

//menu_kelas
Route::view('/menu_kelas', 'menu_kelas.index')->name('menu_kelas');

Route::view('/menu_kelas/kelas', 'menu_kelas.kelas.index')->name('kelas');
Route::view('/menu_kelas/kelas/tambah', 'menu_kelas.kelas.create')->name('tambahkelas');
Route::view('/menu_kelas/kelas/edit', 'menu_kelas.kelas.edit')->name('editkelas');

Route::view('/menu_kelas/kelas/detail', 'menu_kelas.kelas.detail')->name('detailkelas');
Route::view('/menu_kelas/kelas/progres', 'menu_kelas.kelas.progres')->name('progressiswa');

Route::view('/menu_kelas/kelas/video', 'menu_kelas.kelas.video.index')->name('videosiswa');
Route::view('/menu_kelas/kelas/video/soal/tambah', 'menu_kelas.kelas.video.soal.create')->name('tambahsoalvideo');
Route::view('/menu_kelas/kelas/video/soal/edit', 'menu_kelas.kelas.video.soal.edit')->name('editsoalvideo');

Route::view('/menu_kelas/kelas/quiz', 'menu_kelas.kelas.quiz.index')->name('quizsiswa');
Route::view('/menu_kelas/kelas/quiz/soal/tambah', 'menu_kelas.kelas.quiz.soal.create')->name('tambahsoalquiz');
Route::view('/menu_kelas/kelas/quiz/soal/edit', 'menu_kelas.kelas.quiz.soal.edit')->name('editsoalquiz');

// laporan_pengguna
Route::view('/laporan_pengguna/laporan_konten', 'laporan_pengguna.laporan_konten.index')->name('laporankonten');
Route::view('/laporan_pengguna/kata_kasar', 'laporan_pengguna.kata_kasar.index')->name('katakasar');

// keuangan
Route::view('/keuangan/pembayaran', 'keuangan.pembayaran.index')->name('pembayaran');
Route::view('/keuangan/pembayaran/penarikansaldo', 'keuangan.pembayaran.penarikansaldo')->name('penarikansaldo');
Route::view('/keuangan/pembayaran/detail_transaksi', 'keuangan.pembayaran.detail_transaksi')->name('detailtransaksi');
Route::view('/keuangan/penawaran', 'keuangan.penawaran.index')->name('penawaran');
