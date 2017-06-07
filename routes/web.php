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
Route::get('/create', 'MahasiswaController@create');
//Route::get('/show', 'MahasiswaController@show')->name('mahasiswa.show');

Route::resource('mahasiswa','MahasiswaController');

Route::get('mahasiswa', 'PagesController@getMahasiswa');
Route::get('mahasiswa', 'MahasiswaController@Index'); //supaya bisa keluar querynya di mahasiswa

Route::get('matakuliah','PagesController@getMatakuliah');
Route::get('absensi', 'PagesController@getAbsensi');
Route::get('nilai', 'PagesController@getNilai');

Route::post('/create', function(){
    return view('posts/createMahasiswa');
});

//Route::resource('posts','PostController');
