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

//Homepage
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//For customers
Route::get('/specialists/select', 'CustomerController@chooseSpecialistPage')->name('specialistSelection');
Route::get('/specialist/{id}/register', 'CustomerController@reserveAppointmentTime')->name('appointmentRegistration');
Route::get('/appointment/{appointment_id}', 'CustomerController@displayAppointmentInfo')->name('appointmentRegistration');
Route::get('/appointment/cancel/{appointment_id}', 'CustomerController@cancelAppointment')->name('appointmentCancel');

//For specialists 
Route::get('/home', 'SpecialistController@specialistHomepage')->name('homepage');
Route::get('/appointment/start/{appointment_id}', 'SpecialistController@startAppointment')->name('startAppointment');
Route::get('/appointment/end/{appointment_id}', 'SpecialistController@endAppointment')->name('endAppointment');
Route::get('/appointment/delete/{appointment_id}', 'SpecialistController@deleteAppointment')->name('deleteAppointment');

//Display Board
Route::get('/queueboard', 'DisplayBoardController@displayBoardData')->name('displayBoard');
Route::get('/queueboard/data', 'DisplayBoardController@getBoardData')->name('displayBoard');

