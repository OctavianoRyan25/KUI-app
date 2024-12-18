<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthAdmin;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\JenisMitraController;
use App\Http\Controllers\Admin\KermaController;
use App\Http\Controllers\Admin\LetterController;
use App\Http\Controllers\Admin\MitraController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\PesertaController;
use App\Http\Controllers\Admin\ResearchCollaborationController;
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
Route::get('/notulensi/{id}', [Controller::class, 'showNote'])->name('admin.notulensi');
Route::get('/upload-letter', [LetterController::class, 'create'])->name('admin.uploadLetter.create');
Route::post('/upload-letter', [LetterController::class, 'store'])->name('admin.uploadLetter.store');
Route::get('/research-collaboration-reporting', [Controller::class, 'showResearchCollaboration'])->name('admin.researchCollaboration');
Route::post('/research-collaboration-reporting', [ResearchCollaborationController::class, 'store'])->name('admin.researchCollaboration.store');

Route::get('/search-peserta', [Controller::class, 'searchPeserta'])->name('admin.searchPeserta');

Route::group(['prefix' => 'admin', 'middleware' => 'guest'], function () {
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
    Route::post('/note/{event_id}/upload-photo', [NoteController::class, 'uploadPhoto'])->name('admin.uploadPhoto');
    Route::post('/note/{event_id}/upload-file', [NoteController::class, 'uploadFile'])->name('admin.uploadFile');

    Route::get('/peserta', [PesertaController::class, 'index'])->name('admin.peserta');
    Route::post('/peserta', [PesertaController::class, 'create'])->name('admin.peserta.store');
    Route::post('/peserta/import', [PesertaController::class, 'import'])->name('admin.peserta.import');
    Route::delete('/peserta/{id}', [PesertaController::class, 'destroy'])->name('admin.peserta.delete');

    Route::get('/kerma', [KermaController::class, 'getByTridharma'])->name('admin.getKerma');

    Route::get('/letter', [LetterController::class, 'index'])->name('admin.letter.index');
    Route::post('/letter', [LetterController::class, 'store'])->name('admin.letter.store');
    Route::get('/letter/merge/{id}', [LetterController::class, 'mergePDF'])->name('admin.letter.merge');
    Route::delete('/letter/{id}', [LetterController::class, 'destroy'])->name('admin.letter.delete');

    Route::get('/research-collaboration', [ResearchCollaborationController::class, 'index'])->name('admin.researchCollaboration');
    Route::get('/research-collaboration/{id}', [ResearchCollaborationController::class, 'show'])->name('admin.researchCollaboration.show');
    Route::delete('/research-collaboration/{id}', [ResearchCollaborationController::class, 'destroy'])->name('admin.researchCollaboration.delete');

    Route::get('/kerja-sama', function () {
        return view('admin.kerja-sama');
    })->name('admin.kerjaSama.index');
    Route::prefix('/kerja-sama')->group(function () {
        Route::get('/mitra', [MitraController::class, 'index'])->name('admin.mitra.index');
        Route::get('/mitra/create', [MitraController::class, 'create'])->name('admin.mitra.create');
        Route::post('/mitra', [MitraController::class, 'store'])->name('admin.mitra.store');
        Route::get('/mitra/{id}', [MitraController::class, 'show'])->name('admin.mitra.show');
        Route::get('/mitra/{id}/edit', [MitraController::class, 'edit'])->name('admin.mitra.edit');
        Route::put('/mitra/{id}', [MitraController::class, 'update'])->name('admin.mitra.update');
        Route::delete('/mitra/{id}', [MitraController::class, 'destroy'])->name('admin.mitra.destroy');

        Route::post('/mitra/jenis-mitra/create', [JenisMitraController::class, 'store'])->name('admin.mitra.jenisMitra.store');
        Route::delete('/mitra/jenis-mitra/{id}', [JenisMitraController::class, 'destroy'])->name('admin.mitra.jenisMitra.destroy');
    });

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
