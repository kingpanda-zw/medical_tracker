<?php
use App\MedicalOccupation;
use App\Notifications\DueMedical;
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

	$user = App\User::first();
	$user->notify(new DueMedical("A medical is due."));

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){


	Route::resource('employees', 'EmployeesController');
	Route::resource('medicals', 'MedicalsController');
	Route::resource('occupations', 'OccupationsController');
	Route::resource('users', 'UsersController');
	Route::resource('roles', 'RolesController');
	Route::post('occupations/addmed/', 'OccupationsController@addmed')->name('occupations.addmed');
	Route::post('employees/addmed/', 'EmployeesController@addmed')->name('employees.addmed');
	Route::post('employees/updatemed/', 'EmployeesController@updatemed')->name('employees.updatemed');
	Route::post('occupations/removemed/', 'OccupationsController@removemed')->name('occupations.removemed');


});


