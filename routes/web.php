<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
	DashboardController,
	KuesionerController,
	KuesionerResponseController,
	LaporanController,
	UserController
};

Route::redirect('/', '/login');

Route::group([
	'middleware' => 'auth',
	'prefix' => 'admin',
	'as' => 'admin.'
], function () {
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

	Route::get('/logs', [DashboardController::class, 'activity_logs'])->name('logs');
	Route::post('/logs/delete', [DashboardController::class, 'delete_logs'])->name('logs.delete');

	// Settings menu
	Route::view('/settings', 'admin.settings')->name('settings');
	Route::post('/settings', [DashboardController::class, 'settings_store'])->name('settings');

	// Profile menu
	Route::view('/profile', 'admin.profile')->name('profile');
	Route::post('/profile', [DashboardController::class, 'profile_update'])->name('profile');
	Route::post('/profile/upload', [DashboardController::class, 'upload_avatar'])
		->name('profile.upload');

	// Member menu
	Route::get('/petugas', [UserController::class, 'index'])->name('member');
	Route::get('/petugas/create', [UserController::class, 'create'])->name('member.create');
	Route::post('/petugas/create', [UserController::class, 'store'])->name('member.create');
	Route::get('/petugas/{id}/edit', [UserController::class, 'edit'])->name('member.edit');
	Route::post('/petugas/{id}/update', [UserController::class, 'update'])->name('member.update');
	Route::post('/petugas/{id}/delete', [UserController::class, 'destroy'])->name('member.delete');

	// laporan
	Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

	// Kuesioner

	Route::middleware(['role:User'])->group(function () {
		Route::get('/kuesioner', [KuesionerController::class, 'index'])->name('kuesioner.index');
		Route::get('/download-sertifikat/{id}', [KuesionerController::class, 'downloadSertifikat'])->name('download-sertifikat.index');
	});

	Route::get('/kuesioner-responses', [KuesionerResponseController::class, 'index'])->name('kuesioner-responses.index');
	Route::post('/kuesioner-response/store', [KuesionerResponseController::class, 'store'])->name('kuesioner-response.store');
	Route::get('/kuesioner-response/edit/{id}', [KuesionerResponseController::class, 'edit'])->name('kuesioner-response.edit');
	Route::get('download/{file}', [KuesionerController::class, 'download'])->name('lampiran.download');

	Route::get('/kuesioner-responses/search', [KuesionerResponseController::class, 'search'])->name('kuesioner-responses.search');
	Route::post('/kuesioner-responses/{id}/rate', [KuesionerResponseController::class, 'rateResponse'])
		->name('kuesioner-responses.rate');

	Route::get('/upload-sertifikat', [KuesionerResponseController::class, 'uploadSertifikatIndex'])->name('upload-sertifikat.index');
	Route::post('/upload-sertifikat/{id}', [KuesionerResponseController::class, 'uploadSertifikatProcess'])->name('upload-sertifikat.store');
	Route::delete('/upload-sertifikat/{id}', [KuesionerResponseController::class, 'deleteSertifikat'])->name('upload-sertifikat.delete');

});


require __DIR__ . '/auth.php';
