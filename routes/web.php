<?php

use App\Livewire\Film;
use App\Livewire\Home;
use App\Livewire\Info;
use App\Livewire\Show;
use App\Livewire\Merch;
use App\Livewire\Musik;
use App\Livewire\Collab;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Film\FilmEdit;
use App\Livewire\Admin\Film\FilmForm;
use App\Livewire\Admin\Film\FilmList;
use App\Livewire\Admin\Info\InfoEdit;
use App\Livewire\Admin\Info\InfoForm;
use App\Livewire\Admin\Info\InfoList;
use App\Livewire\Admin\Logo\LogoEdit;
use App\Livewire\Admin\Logo\LogoForm;
use App\Livewire\Admin\Logo\LogoList;
use App\Livewire\Admin\Show\ShowEdit;
use App\Livewire\Admin\Show\ShowForm;
use App\Livewire\Admin\Show\ShowList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Merch\MerchEdit;
use App\Livewire\Admin\Merch\MerchForm;
use App\Livewire\Admin\Merch\MerchList;
use App\Livewire\Admin\Musik\MusikEdit;
use App\Livewire\Admin\Musik\MusikForm;
use App\Livewire\Admin\Musik\MusikList;

use App\Livewire\Admin\Utama\UtamaEdit;
use App\Livewire\Admin\Utama\UtamaForm;
use App\Livewire\Admin\Utama\UtamaList;
use App\Livewire\Admin\Collab\CollabEdit;
use App\Livewire\Admin\Collab\CollabForm;
use App\Livewire\Admin\Collab\CollabList;
use App\Livewire\Admin\Auth\Index as AdminAuthIndex;
use App\Livewire\CollabDetail;

// Route::get('/login', Login::class)->name('login')->middleware('guest');
// Route::get('/register', Register::class)->name('register')->middleware('guest');
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');

    // Manajemen Akun (Admin Auth)
    Route::get('/auth', AdminAuthIndex::class)->name('admin.auth.index');
});

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->name('dashboard')->middleware('auth');
// Route::get('/admin/dashboard', Dashboard::class)
//     ->name('dashboard')
//     ->middleware('auth');

Route::get('/', Home::class)->name('home');
Route::get('/info', Info::class)->name('info');
Route::get('/collab', Collab::class)->name('collab');
Route::get('/collab/{id}', CollabDetail::class)->name('collab.detail');
Route::get('/musik', Musik::class)->name('musik');
Route::get('/film', Film::class)->name('film');
Route::get('/merch', Merch::class)->name('merch');
Route::get('/show', Show::class)->name('show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');

    // Data Info
    Route::get('/admin/info', InfoList::class)->name('admin.info.index');
    Route::get('/admin/info/create', InfoForm::class)->name('admin.info.create');
    Route::get('/admin/info/{info}', InfoEdit::class)->name('admin.info.show');
    Route::get('/admin/info/{info}/edit', InfoEdit::class)->name('admin.info.edit');

    // Data Film
    Route::get('/admin/film', FilmList::class)->name('admin.film.index');
    Route::get('/admin/film/create', FilmForm::class)->name('admin.film.create');
    Route::get('/admin/film/{film}/edit', FilmEdit::class)->name('admin.film.edit');

    // Data Musik
    Route::get('/admin/musik', MusikList::class)->name('admin.musik.index');
    Route::get('/admin/musik/create', MusikForm::class)->name('admin.musik.create');
    Route::get('/admin/musik/{musik}/edit', MusikEdit::class)->name('admin.musik.edit');

    // Data Merch
    Route::get('/admin/merch', MerchList::class)->name('admin.merch.index');
    Route::get('/admin/merch/create', MerchForm::class)->name('admin.merch.create');
    Route::get('/admin/merch/{merch}/edit', MerchEdit::class)->name('admin.merch.edit');

    // Data Collab
    Route::get('/admin/collab', CollabList::class)->name('admin.collab.index');
    Route::get('/admin/collab/create', CollabForm::class)->name('admin.collab.create');
    Route::get('/admin/collab/{collab}/edit', CollabEdit::class)->name('admin.collab.edit');

    // Data Show
    Route::get('/admin/show', ShowList::class)->name('admin.show.index');
    Route::get('/admin/show/create', ShowForm::class)->name('admin.show.create');
    Route::get('/admin/show/{show}/edit', ShowEdit::class)->name('admin.show.edit');

    // Data Logo
    Route::get('/admin/logo', LogoList::class)->name('admin.logo.index');
    Route::get('/admin/logo/create', LogoForm::class)->name('admin.logo.create');
    Route::get('/admin/logo/{logo}/edit', LogoEdit::class)->name('admin.logo.edit');

    // Data Halaman Utama
    Route::get('/admin/utama', UtamaList::class)->name('admin.utama.index');
    Route::get('/admin/utama/create', UtamaForm::class)->name('admin.utama.create');
    Route::get('/admin/utama/{utama}/edit', UtamaEdit::class)->name('admin.utama.edit');
});
