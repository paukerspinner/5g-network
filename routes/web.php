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

Route::get('network_nodes/import', 'NetworkNodeController@import');
Route::post('network_nodes/import', 'NetworkNodeController@saveData');
Route::resource('/network-nodes', 'NetworkNodeController');

// Route::resource('/network-nodes.quality-evaluations', 'NetworkNodeQualityEvaluationController');

Auth::routes();
