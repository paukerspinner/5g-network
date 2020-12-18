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
    return redirect('/network-nodes');
});

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('network-nodes/import', 'NetworkNodeController@import');
Route::post('network-nodes/import', 'NetworkNodeController@saveData');
Route::resource('/network-nodes', 'NetworkNodeController');

// Route::resource('/network-nodes.quality-evaluations', 'NetworkNodeQualityEvaluationController');

Route::get('/home', 'HomeController@index')->name('home');
