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

//主頁
Route::get('main',['as'=>'main.index','uses'=>'TodoListController@main']);

//已完成
Route::get('done',['as'=>'main.done','uses'=>'TodoListController@done']);

//處理中
Route::get('processing',['as'=>'main.processing','uses'=>'TodoListController@processing']);

//待處理
Route::get('process',['as'=>'main.process','uses'=>'TodoListController@process']);

//已刪除
Route::get('delete',['as'=>'main.delete','uses'=>'TodoListController@delete']);

//新增事項
Route::get('add',['as'=>'main.add','uses'=>'TodoListController@add']);
