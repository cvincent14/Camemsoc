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
Route::get('/', 'DiagramController@index');

Route::get('/diagram1', 'DiagramController@recoveryDiagram1');

Route::get('/diagram2', 'DiagramController@recoveryDiagram2');


Route::get('/diagram3', 'DiagramController@formulaireDiagram3');
Route::post('/diagram3', 'DiagramController@recoveryDiagram3');
Route::post('/testest', 'DiagramController@sendSocieteTotalHt');

Route::get('/diagram4', 'DiagramController@recoveryDiagram4');