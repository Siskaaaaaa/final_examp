<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NilaiKriteriaController;
use App\Http\Controllers\DataAlternativeController;
use App\Http\Controllers\AHPController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NilaiAlternativeController;



Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/', function () {return view('home');})->name('home');

Route::get('/ahp', [AHPController::class, 'index'])->name('ahp');


Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');



Route::get('/settings', function () {return view('settings');})->name('settings');

 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login','login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');
    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile');
    

    //ROUTE NILAI KRITERIA//
    Route::get('/admin/nilai-kriteria', [NilaiKriteriaController::class, 'index'])->name('admin.nilai.kriteria');
    Route::get('admin/nilai-kriteria', [NilaiKriteriaController::class, 'index'])->name('admin.nilai.kriteria');
    Route::get('/nilai-kriteria', [NilaiKriteriaController::class, 'index'])->name('nilai.kriteria.index');
    Route::post('/nilai-kriteria/store-perbandingan', [NilaiKriteriaController::class, 'storePerbandingan'])->name('nilai.kriteria.storePerbandingan');

    //ROUTE NILAI KRITERIA//
    Route::get('/admin/nilai/alternative', [AdminController::class, 'nilaiAlternative'])->name('admin.nilai.alternative');
    Route::get('/admin/nilai/alternative', [NilaiAlternativeController::class, 'nilaiAlternative'])->name('admin.nilai.alternative');
    Route::get('/nilai-alternative', [NilaiAlternativeController::class, 'nilaiAlternative'])->name('nilai.alternative');
    Route::post('/nilai-alternative/store', [NilaiAlternativeController::class, 'storePerbandingan'])->name('nilai.alternative.storePerbandingan');

        //ROUTE data KRITERIA//
        Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
        Route::get('/admin/kriteria', [KriteriaController::class, 'index'])->name('admin.kriteria');
        Route::get('/admin/kriteria/create', [KriteriaController::class, 'create'])->name('admin.kriteria.create');
        Route::get('/admin/kriteria/{id}/edit', [KriteriaController::class, 'edit'])->name('admin.kriteria.edit');
        Route::delete('/admin/kriteria/{id}/destroy', [KriteriaController::class, 'destroy'])->name('admin.kriteria.destroy');
        Route::post('/admin/data/kriteria', [KriteriaController::class, 'store'])->name('admin.data.kriteria.store');
        Route::get('/admin/data/kriteria', [KriteriaController::class, 'index'])->name('admin.data.kriteria');
        Route::put('kriteria/{kriteria}', [KriteriaController::class, 'update'])->name('admin.data.kriteria.update');


    //ROUTE DATA ALTERNATIVE//
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/alternative', [AlternativeController::class, 'index'])->name('alternative.index');
        Route::get('/data/alternative', [DataAlternativeController::class, 'index'])->name('data.alternative');
        Route::get('/data/alternative/create', [DataAlternativeController::class, 'create'])->name('data.alternative.create');
        Route::post('/data/alternative', [DataAlternativeController::class, 'store'])->name('data.alternative.store');
        Route::get('/data/alternative/{id}/edit', [DataAlternativeController::class, 'edit'])->name('data.alternative.edit');
        Route::put('/data/alternative/{id}', [DataAlternativeController::class, 'update'])->name('data.alternative.update');
        Route::delete('/data/alternative/{id}', [DataAlternativeController::class, 'destroy'])->name('data.alternative.destroy');
    });
});