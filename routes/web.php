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
 
    /**
    * Ruta Login
    */
    Route::get('/', function () {
        return view('login.login');
    });
    /**
     * Ruta Home
     */
    Route::get('/home', function () {
        return view('home.home');
    });
    /**
     * Ruta Empresa
     */
    Route::get('/home/empresa', function () {
        return view('empresa.empresa');
    });
    /**
     * Ruta Alumno
     */
    Route::get('/home/alumno', function () {
        return view('alumno.alumno');
    });
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
        'lang' => 'en|es'
    ]);
 
});