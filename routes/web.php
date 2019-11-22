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

// Auth::routes(['register' => false]);
Route::get('/logout', 'HomeController@logout')->name('logout');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/daftar-proposal', 'HomeController@daftar_proposal')->name('daftar-proposal');
Route::post('/post/daftar-proposal', 'HomeController@daftar_proposal_post')->name('daftar-proposal-post');
Route::get('/home/sempro', 'HomeController@sempro')->name('sempro');

Route::get('/home/tahap', 'HomeController@tahap')->name('tahap');
Route::get('/home/detail/jadwalsempro/{id}','HomeController@detail_jadwalsempro')->name('detail_jadwalsempro');


//Dosen
Route::get('/home/datasempro', 'DosenController@datasempro')->name('datasempro');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/datadaftarsempro/{id}','DosenController@datadaftarsempro')->name('datadaftarsempro');
Route::post('/verifbimbingansempro','DosenController@datadaftarsempro_up')->name('datadaftarsempro_up');


//kaprodi
Route::get('/datasempro','KaprodiController@datasempro')->name('datasempro');
Route::get('/penjadwalansempro','KaprodiController@penjadwalansempro')->name('penjadwalansempro');
Route::post('/post/penjadwalansempro','KaprodiController@jadwalkansempro_post')->name('penjadwalansempro_post');
Route::get('/isiruang','KaprodiController@isiruang')->name('isiruang');
Route::post('/post/isiruang','KaprodiController@isiruang_post')->name('isiruang_post');
Route::get('/waktu/{id}','KaprodiController@waktu')->name('waktu');
Route::post('post/waktu','KaprodiController@waktu_post')->name('waktu_post');