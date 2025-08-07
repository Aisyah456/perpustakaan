<?php

use App\Models\Menu;
use App\Models\News;
use App\Models\Banner;
use App\Models\Artikel;
use App\Models\Partner;
use App\Models\LibraryEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\StandarsController;
use App\Http\Controllers\TurnitinController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ReferensiController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\UsulanBukuController;
use App\Http\Controllers\CekPinjamanController;
use App\Http\Controllers\KoleksiBukuController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\BebasPustakaController;
use App\Http\Controllers\LibraryGuideController;
use App\Http\Controllers\ResearchToolController;
use App\Http\Controllers\Admin\PlagiatController;
use App\Http\Controllers\admin\PustakaController;
use App\Http\Controllers\PublicRequestController;
use App\Http\Controllers\LiterasiRequestController;
use App\Http\Controllers\ExternalDocumentController;
use App\Http\Controllers\TurnitinRequestsController;
use App\Http\Controllers\Admin\AdminRequestController;
use App\Http\Controllers\Admin\LibraryEventController;
use App\Http\Controllers\Admin\equestsTurnitinController;
use App\Http\Controllers\Admin\InternalDocumentController;
use App\Http\Controllers\Admin\RequestsTurnitinController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/Home', function () {
    $news = News::latest()->take(3)->get();
    $banners = Banner::latest()->get();
    $menus = Menu::latest()->take(4)->get();
    $events = LibraryEvent::latest()->paginate(10);
    $partners = Partner::all();
    $library_events = LibraryEvent::latest()->get();
    $artikels = Artikel::latest()->take(3)->get();

    return view('home.index', compact('banners', 'menus', 'events', 'news', 'partners', 'library_events', 'artikels'));
})->name('Home');

// Profil Anggota
// Route::get('/Profil', [StafController::class, 'index']);
// Route::get('/profil/detai/{id}', [StafController::class, 'show']);

// Profil Perpustakaan
Route::view('/perpustakaan/visi-misi', 'home.profil.vismis')->name('perpustakaan.visi-misi');
Route::view('/perpustakaan/struktur', 'home.profil.member');
Route::view('/perpustakaan/tentang', 'home.profil.about');
Route::view('/tentang-urnitin-umht', 'home.profil.index');
Route::view('/panduan-perpustakaan-umht', 'home.panduan.index');

// Halaman Umum
Route::view('/bebas_pustaka', 'home.pustaka.index');
Route::view('/kontak-perpustakaan', 'home.kontak.contact');
Route::view('/Anggota', 'home.profil.member');
Route::view('/Sirkulasi', 'home.sirkulasi.sirkulasi');
Route::view('/Contact', 'home.kontak.contact');
Route::view('/e-resources', 'home.repo.index');

// SOP & Berita
Route::get('/SOP', [StandarsController::class, 'index']);
Route::get('/news/detailnews/{id}', [NewsController::class, 'show']);

// Layanan Perpustakaan
Route::view('/layanan/layanan-cek-turnitin-perpustakaan-umht', 'home.turnitin.index');
Route::view('/la   yanan/layanan-bebas-pustaka-perpustakaan-umht', 'home.layanan.pustaka.index')->name('layanan.pustaka');
Route::view('/pelatihan-literasi-informasi-perpustakaan', 'home.layanan.literasi.index');
Route::view('/layanan/referensi', 'home.layanan.referensi.index')->name('layanan.referensi');
Route::view('/layanan/sirkulasi', 'home.layanan.sirkulasi.app')->name('layanan.sirkulasi');
Route::get('/layanan/turnitin', [TurnitinController::class, 'index'])->name('turnitin.form');
Route::post('/layanan/turnitin', [TurnitinController::class, 'store'])->name('turnitin.store');

// Form Referensi
Route::post('/referensi/kirim', [ReferensiController::class, 'kirim'])->name('referensi.kirim');
Route::post('/layanan-referensi/kirim', [ReferensiController::class, 'kirim'])->name('layanan.referensi.kirim');


// Form Turnitin & Literasi
Route::get('/turnitin', [TurnitinRequestsController::class, 'create'])->name('turnitin.form');
Route::post('/turnitin', [TurnitinRequestsController::class, 'store'])->name('turnitin.store');

// Form Literasi (dengan auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/literasi', [LiterasiRequestController::class, 'create'])->name('literasi.form');
    Route::post('/literasi', [LiterasiRequestController::class, 'store'])->name('literasi.store');
});

// Form Bebas Pustaka
Route::get('/formulir-bebas-pustaka', [BebasPustakaController::class, 'create']);
Route::post('/formulir-bebas-pustaka', [BebasPustakaController::class, 'store']);
Route::get('/bebas-pustaka', [BebasPustakaController::class, 'index']);
Route::post('/bebas-pustaka', [BebasPustakaController::class, 'store']);

// Admin Bebas Pustaka
Route::get('/admin/bebas-pustaka', [BebasPustakaController::class, 'index']);
Route::post('/admin/bebas-pustaka/{id}/update', [BebasPustakaController::class, 'updateStatus']);

// Usulan Buku
Route::view('/info-usulan-buku', 'home.layanan.usulan.index')->name('usulan-buku.info');
Route::get('/usulan-buku', [UsulanBukuController::class, 'create'])->name('usulan-buku.create');
Route::post('/usulan-buku', [UsulanBukuController::class, 'store'])->name('usulan-buku.store');

// Admin Usulan Buku
Route::get('/admin/usulan-buku', [UsulanBukuController::class, 'index'])->name('admin.usulan-buku.index');
Route::post('/admin/usulan-buku/{id}/verifikasi', [UsulanBukuController::class, 'updateStatus'])->name('admin.usulan-buku.update');

// Cek Pinjaman
Route::get('/layanan/cek-pinjaman', [CekPinjamanController::class, 'index'])->name('cek-pinjaman');
Route::post('/layanan/cek-pinjaman', [CekPinjamanController::class, 'cek'])->name('cek-pinjaman.cek');

// Panduan & Koleksi
Route::get('/panduan/layanan', [LibraryGuideController::class, 'index'])->name('library.layanan');
Route::get('/panduan/ebook', [EbookController::class, 'index'])->name('ebook.index');
Route::get('/koleksi-buku', [KoleksiBukuController::class, 'index'])->name('koleksi.buku');
Route::get('/koleksi-buku/{id}', [KoleksiBukuController::class, 'show'])->name('buku.detail');

// Artikel & Layanan Update
Route::get('/update', [\App\Http\Controllers\ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/layanan-perpustakaan-umht', [\App\Http\Controllers\LayananController::class, 'index'])->name('layanan.index');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// Admin Dashboard
Route::get('/Admin', fn() => view('admin.index'));
Route::middleware('auth')->get('/admin/pinjaman', fn() => view('admin.pinjaman.index', ['loans' => \App\Models\Loan::latest()->paginate(10)]))->name('admin.pinjaman');

// Admin Referensi
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('referensi', \App\Http\Controllers\Admin\ReferensiController::class)->except(['show']);
    Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
    Route::resource('artikel', \App\Http\Controllers\Admin\ArtikelController::class);
    Route::resource('banner', \App\Http\Controllers\Admin\BannerController::class);
    Route::resource('plagiat', \App\Http\Controllers\Admin\PlagiatController::class);
    Route::resource('pustaka', \App\Http\Controllers\Admin\PustakaController::class);
    Route::get('/turnitin', [TurnitinController::class, 'adminIndex'])->name('turnitin.index');
    Route::post('/turnitin/{id}/status', [TurnitinController::class, 'updateStatus'])->name('turnitin.status');
});

// Admin Banner Resource
Route::resource('/banners', \App\Http\Controllers\Admin\BannerController::class);
