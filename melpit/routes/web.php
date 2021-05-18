<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




//商品一覧画面
Route::get('item', 'ItemController@itemsList')->name('items.index');
Route::post('item', 'ItemController@postItemsList');
Route::get('itemDetail', 'ItemController@detail');




//検索された際のpostのルート
Route::get('items.search', 'ItemController@result');



//購入手続き画面へのルート
Route::post('userInformation', 'InformationController@userInformation')->name('userInformation');
Route::get('userInformation', function () {
    return redirect('item');
});
//購入情報確認画面
Route::post('checkInformation', 'InformationController@checkInformation');
Route::get('checkInformation', function () {
    return redirect('item');
});
//購入ボタンが押された時のルート
Route::post('buySuccess', 'InformationController@buySuccess');
Route::get('buySuccess', function () {
    return redirect('item');
});






//管理者用の商品一覧画面
Route::get('admin', 'AdminController@itemsList')->name('admin.items');


//管理者画面の登録、削除ボタンのpostのルート
Route::post('admin', 'AdminController@result');


//管理者画面の登録確認画面へのルート
Route::get('checkRegister', function () {
    return redirect('admin');
});
Route::post('checkRegister', 'AdminController@checkRegister')->name('admin.checkRegister');


//管理者画面の削除確認画面へのルート
Route::get('checkDelete', function () {
    return redirect('admin');
});
Route::post('checkDelete', 'AdminController@checkDelete')->name('admin.checkDelete');

//管理者画面の商品編集画面へのルート
Route::get('edit', function () {
    return redirect('admin');
});
Route::post('edit', 'AdminController@edit')->name('admin.edit');
//管理者画面の商品編集確認画面へのルート
Route::get('checkEdit', function () {
    return redirect('admin');
});
Route::post('checkEdit', 'AdminController@edit');


//商品が購入された時の管理者側へのルート
Route::get('informations', function () {
    return redirect('admin');
});
Route::post('informations', 'AdminController@informations');


//購入情報詳細を見る
Route::post('detail', 'AdminController@details');
Route::get('detail', function () {
    return redirect('admin');
});

//いいね機能

Route::get('nice/{post}', 'NiceController@nice')->name('nice');
Route::get('unnice/{post}', 'NiceController@unnice')->name('unnice');
