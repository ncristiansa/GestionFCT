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
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::get('home', 'PrincipalController@index')->name('home');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    /**
     * Ruta Empresa
     */    
    Route::get('/home/empresa', 'EmpresaController@index')->name('empresa');
    Route::post('/home/empresa', 'EmpresaController@store')->name('empresa.add');
    //Route::get('/home/empresa/{data?}', 'EmpresaController@search');
    Route::delete('/home/empresa/{id}', 'EmpresaController@destroy')->name('empresa.destroy');
    Route::get('/home/empresa/{id}', 'EmpresaController@edit')->name('empresa.edit');
    /**
     * Ruta acuerdo
     */
    Route::get('/home/empresa/{id}/{od}', 'AcuerdoController@edit')->name('acuerdo.edit');
    Route::delete('/home/empresa/{id}/{od}', 'AcuerdoController@destroy')->name('acuerdo.destroy');

    
    
    /**
     * Ruta Alumno
     */
    Route::get('/home/alumno', 'AlumnoController@index')->name('alumno');
    Route::post('/home/alumno', 'AlumnoController@store')->name('alumno.add');
    Route::put('/home/alumno/{id}', 'AlumnoController@destroy')->name('alumno.destroy');
    Route::get('home/alumno/{id}', 'AlumnoController@edit')->name('alumno.edit');

    Route::get('/home/alumno/{id}/{od}', 'AcuerdoController@edit')->name('acuerdo.edit');
    Route::delete('/home/alumno/{id}/{od}', 'AcuerdoController@destroy')->name('acuerdo.destroy');

    /**
     * Ruta Tutor
     */
    Route::get('/home/tutor', 'TutorController@index')->name('tutor');
    Route::post('/home/tutor', 'TutorController@store')->name('tutor.add');
    Route::delete('/home/tutor/{id}', 'TutorController@destroy')->name('tutor.destroy');
    Route::get('/home/tutor/{id}', 'TutorController@edit')->name('tutor.edit');
    Route::get('/home/acuerdos', 'TutorController@show')->name('acuerdos');

    Route::get('/home/tutor/{id}/{od}', 'AcuerdoController@edit')->name('acuerdo.edit');
    Route::delete('/home/tutor/{id}/{od}', 'AcuerdoController@destroy')->name('acuerdo.destroy');
    /**
    * Ruta crear Acuerdo
    */
    Route::get('/home/acuerdo', 'AcuerdoController@index')->name('acuerdo');
    Route::post('/home/acuerdo', 'AcuerdoController@store')->name('acuerdo.add');
    /**
    * Ruta crear visita
    */
    Route::get('/home/visita', 'VisitaController@index')->name('visita');
    Route::post('/home/visita', 'VisitaController@store')->name('visita.add');
    /**
    * Ruta calcula horas
    */
    Route::get('/home/calcula', 'FestivoController@index')->name('calcula');
    Route::post('/home/calcula', 'FestivoController@result')->name('calcula');

    Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return \Redirect::back();
    })->where([
        'lang' => 'en|es|cat'
    ]);
 
});



