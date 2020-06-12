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

Route::get('/', 'MymodelController@index');
Route::get('/mydata/create', 'MymodelController@create');//link untuk ke form create
Route::post('/mydata', 'MymodelController@store');//action untuk menyimpan data
Route::get('/mydata/{id}/edit', 'MymodelController@edit');//url untuk ke form edit data dengan find by id
Route::patch('/mydata/{id}', 'MymodelController@update');//action untuk simpan data baru dengan berdasarkan id
Route::delete('/mydata/{id}', 'MymodelController@destroy');//action untuk menghapus data dengan berdasarkan id
/* function () {
    return view('myproj');
} */