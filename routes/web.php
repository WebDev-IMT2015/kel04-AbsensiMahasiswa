<?php

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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/create', 'MahasiswaController@create');

Route::get('/absensi', 'AbsensiController@index');
Route::get('/matakuliah', 'MatkulController@index');
Route::get('mahasiswa', 'MahasiswaController@Index'); //supaya bisa keluar querynya di mahasiswa

Route::get('/indexMahasiswa', 'MahasiswaController@index');
//Route::get('/show', 'MahasiswaController@show')->name('mahasiswa.show');

Route::resource('mahasiswa','MahasiswaController');
Route::resource('matakuliah','MatkulController');
Route::resource('absensi','AbsensiController');



//Route::get('absensi', 'PagesController@getAbsensi');
//Route::get('nilai', 'PagesController@getNilai');

Route::post('/createMhs', function(){    //diambil dari indexMahasiswa bagian form post axtion
    return view('posts/createMahasiswa');
});

Route::post('/createMtk', function(){    //diambil dari indexMahasiswa bagian form post axtion
    return view('posts/createMatkul');
});








//Route::resource('posts','PostController');
