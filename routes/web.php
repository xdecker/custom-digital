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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::middleware(['auth'])->prefix('in')->group(function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::get('/company', 'CompanyController@index')->name('company'); //Ver la compania, pagina del dashboard
    Route::get('/company/create','CompanyController@create');//crear nueva compania, ver formulario
    Route::post('/company','CompanyController@store'); // guardar nueva compania, registrar
    Route::get('/company/{id}/edit', 'CompanyController@edit'); //formulario de edicion
    Route::post('/company/{id}/edit', 'CompanyController@update')->name('company.update'); // update

    Route::resource('estado', 'EstadoController');

    Route::get('/anuncio', 'AnuncioController@index')->name('anuncio'); // Ver los anuncios
    Route::get('/anuncio/create', 'AnuncioController@create'); //Crear nuevo anuncio ver formulario
    Route::post('/anuncio', 'AnuncioController@store'); //Guardar nuevo anuncio, registrar
    Route::get('/anuncio/{id}/edit', 'AnuncioController@edit'); // formulario de edicion
    Route::post('/anuncio/{id}/edit', 'AnuncioController@update')->name('anuncio.update'); // update

    Route::get('/seller', 'SellerController@perfil')->name('gestor'); //Ver mi perfil gestor
    Route::get('/import', 'ClientController@create'); // Importar bases, vista formulario
    Route::post('/import', 'ClientController@import')->name('upload'); // Carga de archivo
});



