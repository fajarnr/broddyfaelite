<?php

use Illuminate\Support\Facades\Route;

// ====== FRONTEND ======
use App\Livewire\Home;
use App\Livewire\Info;
use App\Livewire\Film;
use App\Livewire\Show;
use App\Livewire\Merch;
use App\Livewire\Musik;
use App\Livewire\Collab;
use App\Livewire\CollabDetail;

// ====== AUTH (User) ======
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;

// ====== ADMIN ======
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Auth\Index as AdminAuthIndex;
use App\Livewire\Admin\Film\{FilmList, FilmForm, FilmEdit};
use App\Livewire\Admin\Info\{InfoList, InfoForm, InfoEdit};
use App\Livewire\Admin\Logo\{LogoList, LogoForm, LogoEdit};
use App\Livewire\Admin\Show\{ShowList, ShowForm, ShowEdit};
use App\Livewire\Admin\Merch\{MerchList, MerchForm, MerchEdit};
use App\Livewire\Admin\Musik\{MusikList, MusikForm, MusikEdit};
use App\Livewire\Admin\Collab\{CollabList, CollabForm, CollabEdit};
use App\Livewire\Admin\Utama\{UtamaList, UtamaForm, UtamaEdit};

// ==============================================
// ============== PUBLIC ROUTES =================
// ==============================================
Route::get('/', Home::class)->name('home');
Route::get('/info', Info::class)->name('info');
Route::get('/collab', Collab::class)->name('collab');
Route::get('/collab/{id}', CollabDetail::class)->name('collab.detail');
Route::get('/musik', Musik::class)->name('musik');
Route::get('/film', Film::class)->name('film');
Route::get('/merch', Merch::class)->name('merch');
Route::get('/show', Show::class)->name('show');

// ==============================================
// ============== AUTH (LOGIN/REGISTER) ==========
// ==============================================
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

// ==============================================
// ============== ADMIN (DASHBOARD) ==============
// ==============================================
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');

    // Manajemen Akun Admin
    Route::get('/auth', AdminAuthIndex::class)->name('admin.auth.index');

    // ========== Info ==========
    Route::get('/info', InfoList::class)->name('admin.info.index');
    Route::get('/info/create', InfoForm::class)->name('admin.info.create');
    Route::get('/info/{info}/edit', InfoEdit::class)->name('admin.info.edit');

    // ========== Film ==========
    Route::get('/film', FilmList::class)->name('admin.film.index');
    Route::get('/film/create', FilmForm::class)->name('admin.film.create');
    Route::get('/film/{film}/edit', FilmEdit::class)->name('admin.film.edit');

    // ========== Musik ==========
    Route::get('/musik', MusikList::class)->name('admin.musik.index');
    Route::get('/musik/create', MusikForm::class)->name('admin.musik.create');
    Route::get('/musik/{musik}/edit', MusikEdit::class)->name('admin.musik.edit');

    // ========== Merch ==========
    Route::get('/merch', MerchList::class)->name('admin.merch.index');
    Route::get('/merch/create', MerchForm::class)->name('admin.merch.create');
    Route::get('/merch/{merch}/edit', MerchEdit::class)->name('admin.merch.edit');

    // ========== Collab ==========
    Route::get('/collab', CollabList::class)->name('admin.collab.index');
    Route::get('/collab/create', CollabForm::class)->name('admin.collab.create');
    Route::get('/collab/{collab}/edit', CollabEdit::class)->name('admin.collab.edit');

    // ========== Show ==========
    Route::get('/show', ShowList::class)->name('admin.show.index');
    Route::get('/show/create', ShowForm::class)->name('admin.show.create');
    Route::get('/show/{show}/edit', ShowEdit::class)->name('admin.show.edit');

    // ========== Logo ==========
    Route::get('/logo', LogoList::class)->name('admin.logo.index');
    Route::get('/logo/create', LogoForm::class)->name('admin.logo.create');
    Route::get('/logo/{logo}/edit', LogoEdit::class)->name('admin.logo.edit');

    // ========== Halaman Utama ==========
    Route::get('/utama', UtamaList::class)->name('admin.utama.index');
    Route::get('/utama/create', UtamaForm::class)->name('admin.utama.create');
    Route::get('/utama/{utama}/edit', UtamaEdit::class)->name('admin.utama.edit');
});
