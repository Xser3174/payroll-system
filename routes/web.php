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
	// return view('welcome');

	$links = \App\Link::all();

	return view('welcome', ['links' => $links]);
	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/department', 'DepartmentController@index')->name('department');
Route::post('/department', 'DepartmentController@create')->name('department');

Route::get('/position','PositionController@index')->name('position');
Route::post('/position','PositionController@create')->name('position');

Route::get('/employee','EmployeeController@index')->name('employee');
Route::post('/employee','EmployeeController@create')->name('employee');

Route::get('/profile','ProfileController@index')->name('profile');
Route::post('/profile','ProfileController@create')->name('profile');
Route::get('/profile/{id}','ProfileController@show')->name('profileShow');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// File Export****
//Route::get('file-import-export', 'EmployeeController@fileImportExport');
Route::post('file/import', 'EmployeeController@fileImport')->name('fileimport');
Route::get('file/export', 'EmployeeController@fileExport')->name('fileexport');

Route::post('file-import', 'PositionController@fileImport')->name('importposition');
Route::get('file-export', 'PositionController@fileExport')->name('exportposition');
Route::get('file-export/csv', 'PositionController@crvFile')->name('exportposition/csv');

Route::get('/employee/pdf','EmployeeController@createPDF');