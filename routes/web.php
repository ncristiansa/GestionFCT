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

/**
 * Ruta LANG
 */

Route::group(['middleware' => ['web']], function () {
    Route::get('/pruebas', "PruebaController@index");
    /**
    * Ruta Login
    */
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::get('home', 'PrincipalController@index')->name('home');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    /**
     * Ruta Empresa
     */
    //Route::resource('empresa', 'EmpresaController');
    
    Route::get('/home/empresa', 'EmpresaController@index')->name('empresa');
    
    Route::get('/home/empresa/{empresa}', 'EmpresaController@show')->name('perfil');
    Route::get('/home/empresa/{id}', 'EmpresaController@delete')->name('empresa.delete');
    
    /**
     * Ruta Alumno
     */
    Route::get('/home/alumno', 'AlumnoController@index')->name('alumno');
    /**
     * Ruta Acuerdo
     */
    Route::get('/home/acuerdo', function () {
        return view('acuerdo.acuerdo');
    });
 
    Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return \Redirect::back();
    })->where([
        'lang' => 'en|es|cat'
    ]);
 
});



