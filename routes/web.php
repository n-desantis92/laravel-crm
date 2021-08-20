<?php

use App\Http\Controllers\Api\EmployeeApiController;
use Illuminate\Support\Facades\Auth;
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
    return view('guest.index'); 
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//AGENCY
Route::get('/', 'AgencyController@index')->name('admin.home');
Route::get('/admin/create', 'AgencyController@create')->name('admin.create');
Route::post('/admin/create', 'AgencyController@store')->name('admin.store');
Route::get('/agency/{agency}/edit', 'AgencyController@edit')->name('agency.edit');
Route::delete('/agency/{agency}', 'AgencyController@destroy')->name('agency.destroy');
Route::put('/agency/{agency}/up', 'AgencyController@update')->name('agency.update');
Route::get('/agency/{agency}/show', 'AgencyController@show')->name('agency.show');

//EMPLOYEE
Route::get('/employee/index', 'EmployeeController@index')->name('index.employee');
Route::get('/employee/create', 'EmployeeController@create')->name('employee.create');
Route::post('/employee/create', 'EmployeeController@store')->name('employee.store');
Route::get('/employee/{employee}/edit', 'EmployeeController@edit')->name('employee.edit');
Route::put('/employee/{employee}/put', 'EmployeeController@update')->name('employee.update');
Route::delete('/employee/{employee}', 'EmployeeController@destroy')->name('employee.destroy');
