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

Route::get('/','FrontendController@index')->name('home');
Route::get('/about','FrontendController@about')->name('about');
Route::get('/tim','FrontendController@tim')->name('galerija');

Route::get('/kontakt','FrontendController@kontakt');

Route::post('/kontakt', 'FrontendController@store')->name('kontakti');;

Route::get('/posts/{id}','FrontendController@getPost');





Route::get('/profil/create/{id}','FrontendController@profil')->name('profil');
Route::post('/profil/update/{id}','FrontendController@updateProfil');

Route::post('/komentar/storeKom','FrontendController@storeComment')->name('unosKom');
//registracija
Route::get('/registracija','LoginController@registracija')->name('registracija');
Route::post('/registracija/store','LoginController@registracijaStore');

//Logovanje
Route::get('/login', 'LoginController@index')->name('loginView');
Route::post('/login/create', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');


//ADMIN

Route::get('/homeAdmin','BackendController@index')->name('adminHome');

//ADMIN Korisnici
Route::get('/korisnik/tabela','KorisnikController@tabelaKorisnik');
Route::get('/korisnik/create/{id?}','KorisnikController@korisnik');
Route::post('/korisnik/store','KorisnikController@storeKorisnik');
Route::post('/korisnik/update/{id}','KorisnikController@updateKorisnik');
Route::get('/korisnik/delete/{id}','KorisnikController@deleteKorisnik');




//ADMIN Postovi
Route::get('/post/tabela','PostController@tabelaPost');
Route::get('/post/create/{id?}','PostController@post');
Route::post('/post/store','PostController@storePost');
Route::post('/post/update/{id}','PostController@updatePost');
Route::get('/post/delete/{id}','PostController@deletePost');

//ADMIN Komentari
Route::get('/komentar/tabela','KomentarController@tabelaKomentar');
Route::get('/komentar/create/{id?}','KomentarController@komentar');
Route::post('/komentar/store','KomentarController@storeKomentar');
Route::post('/komentar/update/{id}','KomentarController@updateKomentar');
Route::get('/komentar/delete/{id}','KomentarController@deleteKomentar');

Route::group(['prefix'=> '/ajax'], function(){
    Route::get('/post/search', 'PostController@search');
    Route::post('/post/search', 'PostController@search');
});

Route::get('/download','FrontendController@download');