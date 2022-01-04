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
    return view('pengguna.cobalogin');
});
//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});
// for users mendapatkan akses melihat profile
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
});


// for users mendapatkan akses melihat tabel data karyawan
// for users untuk mendapatkan akses membuat atau menambah data Kryawan
Route::group(['middleware' => ['auth','role:admin']], function() { 
    Route::get('/dashboard/karyawan', 'App\Http\Controllers\KarController@index')->name('dashboard.karyawan');
    Route::get('/karyawan/detail/{id}', 'App\Http\Controllers\KarController@detail')->name('karyawan.detail.{id}');
    Route::get('/dashboard/tambah', 'App\Http\Controllers\KarController@tambah')->name('dashboard.tambah');
    Route::post('/dashboard/createkar', 'App\Http\Controllers\KarController@tambahdata')->name('dashboard.createkar');
    Route::get('/karyawan/edit/{id}', 'App\Http\Controllers\KarController@edit')->name('karyawan.edit.{id}');
    Route::post('/karyawan/update/{id}', 'App\Http\Controllers\KarController@updatekar')->name('karyawan.update.{id}');
    Route::delete('/karyawan/delete/{id}', 'App\Http\Controllers\KarController@destroy');
});




// for users untuk mendapatkan akses melihat data jabatan
// for users untuk mendapatkan akses membuat atau menambah, update dan delet data jabatan
Route::group(['middleware' => ['auth','role:admin']], function() { 
    Route::get('/dashboard/jabatan', 'App\Http\Controllers\JabatanController@index')->name('dashboard.jabatan');
    Route::get('/dashboard/tambahjab', 'App\Http\Controllers\JabatanController@tambah')->name('dashboard.tambahjab');
    Route::post('/dashboard/createjab', 'App\Http\Controllers\JabatanController@tambahdata')->name('dashboard.createjab');
    Route::get('/jabatan/edit/{id}', 'App\Http\Controllers\JabatanController@edit')->name('jabatan.edit.{id}');
    Route::post('/jabatan/update/{id}', 'App\Http\Controllers\JabatanController@updatejab')->name('jabatan.update.{id}');
    Route::delete('/jabatan/delete/{id}', 'App\Http\Controllers\JabatanController@destroy');
});



// for users mendapatkan akses melihat data jobdesk
// for users untuk mendapatkan akses membuat atau menambah data jobdesk
Route::group(['middleware' => ['auth','role:admin']], function() { 
    Route::get('/dashboard/jobdesk', 'App\Http\Controllers\JobdeskController@index')->name('dashboard.jobdesk');
    Route::get('/dashboard/tambahjob', 'App\Http\Controllers\JobdeskController@tambah')->name('dashboard.tambahjob');
    Route::post('/dashboard/createjob', 'App\Http\Controllers\JobdeskController@tambahdata')->name('dashboard.createjob');
    Route::get('/jobdesk/edit/{id}', 'App\Http\Controllers\JobdeskController@edit')->name('jobdesk.edit.{id}');
    Route::post('/jobdesk/update/{id}', 'App\Http\Controllers\JobdeskController@updatejob')->name('jobdesk.update.{id}');
    Route::delete('/jobdesk/delete/{id}', 'App\Http\Controllers\JobdeskController@destroy');
    Route::resource('user','KarController');
    Route::resource('jabatan','KarController');
    Route::resource('jobdesk','KarController');
});


// for users untuk mendapatkan akses hasil laporan Daily Report
Route::group(['middleware' => ['auth','role:spmi|pimpinan']], function() { 
    Route::get('/dashboard/report', 'App\Http\Controllers\ReportController@index')->name('dashboard.report'); 
});

// for users untuk mendapatkan akses export hasil laporan Daily Report
Route::group(['middleware' => ['auth','role:spmi']], function() { 
    Route::get('/laporan/detail/{id}', 'App\Http\Controllers\ReportController@detail')->name('laporan.detail.{id}');
    Route::get('/report/export', 'App\Http\Controllers\ReportController@export')->name('report.export');
    Route::get('/laporan/generate/{id}', 'App\Http\Controllers\ReportController@edit')->name('laporan.generate');
    Route::post('/laporan/generate/{id}', 'App\Http\Controllers\ReportController@generate')->name('laporan.generate');
    Route::delete('/laporan/delete/{id}', 'App\Http\Controllers\ReportController@destroy');
});

// for users untuk mendapatkan akses membuat atau menambah data Daily Report
Route::group(['middleware' => ['auth', 'role:karyawan']], function() { 
    Route::get('/dashboard/buatreport', 'App\Http\Controllers\ReportController@tambah')->name('dashboard.buatreport');
    Route::get('/coba', 'App\Http\Controllers\ReportController@coba')->name('coba');
    Route::post('/dashboard/createreport', 'App\Http\Controllers\ReportController@tambahdata')->name('dashboard.createreport');
});



/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/
require __DIR__.'/auth.php';
