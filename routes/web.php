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

/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::group(['middleware' => ['idiomas']], function () {
	 
	     //aqui adentro pongo todas las rutas

	Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return \Redirect::back();
    })->where([ //Limito el valor del parámetro {lang} solo a «en» o «es» para evitar que se asigne a la variable de sesión un idioma que no exista.
        'lang' => 'en|es'  //
    ]);


	Auth::routes();
	Route::get('/', 'InicioController@index')->name('inicio');


});	 

/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/