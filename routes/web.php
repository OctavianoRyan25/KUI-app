<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthAdmin;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\LetterController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\PesertaController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [AdminController::class, 'index'])->name('admin.home');
Route::get('/attendance/{uuid}', [Controller::class, 'showAttendance'])->name('admin.attendance');
Route::post('/attendance/{uuid}/save-signature', [Controller::class, 'saveSignature'])->name('admin.saveSignature');
Route::get('/upload-letter', [LetterController::class, 'create'])->name('admin.uploadLetter.create');
Route::post('/upload-letter', [LetterController::class, 'store'])->name('admin.uploadLetter.store');

Route::get('/search-peserta', [Controller::class, 'searchPeserta'])->name('admin.searchPeserta');

Route::group(['prefix' => 'admin', 'middleware' => 'guest'], function (){
    Route::get('/login', [AuthAdmin::class, 'showLoginForm'])->name('admin.loginForm');
    Route::post('/login', [AuthAdmin::class, 'login'])->name('admin.login');
});

// Grouping admin routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/event', [EventController::class, 'index'])->name('admin.event');
    Route::get('/event/create', [EventController::class, 'showCreateForm'])->name('admin.event.showForm');
    Route::post('/event', [EventController::class, 'store'])->name('admin.event.store');
    Route::get('/event/{id}', [EventController::class, 'show'])->name('admin.event.show');
    Route::get('/event/{id}/update', [EventController::class, 'showUpdateForm'])->name('admin.event.edit');
    Route::put('/event/{id}/update', [EventController::class, 'update'])->name('admin.event.update');
    Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('admin.event.delete');
    Route::get('event/QR-Code/{uuid}', [EventController::class, 'generateQr'])->name('admin.event.qrCode');

    Route::post('/peserta-rapat', [EventController::class, 'tambahPesertaRapat'])->name('admin.pesertaRapat.store');
    Route::delete('/peserta-rapat/{id}', [EventController::class, 'deletePesetaRapat'])->name('admin.pesertaRapat.delete');

    Route::get('/note/{id}', [NoteController::class, 'show'])->name('admin.note');
    Route::put('/note/{id}', [NoteController::class, 'update'])->name('admin.note.update');

    Route::get('/peserta', [PesertaController::class, 'index'])->name('admin.peserta');
    Route::post('/peserta', [PesertaController::class, 'create'])->name('admin.peserta.store');
    Route::delete('/peserta/{id}', [PesertaController::class, 'destroy'])->name('admin.peserta.delete');

    Route::get('/letter', [LetterController::class, 'index'])->name('admin.letter.index');
    Route::get('/letter/merge/{id}', [LetterController::class, 'mergePDF'])->name('admin.letter.merge');

    Route::post('/logout', [AuthAdmin::class, 'logout'])->name('admin.logout');

    Route::get('phpmyinfo', function () {
        phpinfo(); 
    })->name('phpmyinfo');
});

//Create symlink
Route::get('/link', function () {
    Artisan::call('storage:link');
    return 'Symlink has been created';
});

Route::get('/editor', function () {
    return view('editor');
});
