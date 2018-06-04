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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard'],function(){

  Route::get('',[
    'uses'  => 'VotesController@getIndex',
    'as'    => 'dashboard.index'
  ]);
});

Route::group(['prefix' => 'votes'],function(){

  Route::get('create', [
    'uses'  => 'VotesController@getCreate',
    'as'    => 'votes.create'
  ]);

Route::post('create',[
    'uses'  => 'VotesController@postCreate',
    'as'    => 'votes.create'
  ]);
});

Auth::routes();


