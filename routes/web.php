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

Route::get('index','PageController@getIndex')->name('index');

Route::get('loai_sanpham/{type}','PageController@getLoaisanpham')->name('loaisanpham');

Route::get('chitiet_sanpham/{sp}','PageController@getChitietsanpham')->name('chitietsanpham');

Route::get('dangky','PageController@getDangky')->name('dangky');

Route::get('lien_he','PageController@getLienhe')->name('lienhe');

Route::get('gioi_thieu','PageController@getGioithieu')->name('gioithieu');

Route::get('add-to-cart/{id}',['uses'=>'PageController@getAddtoCart'])->name('themgiohang');

Route::get('update/{id}/{qty}',['uses'=>'PageController@getUpdateQty'])->name('updateQty');
	
Route::get('Delete/{id}',['uses'=>'PageController@getDeleteItemCart'])->name('xoagiohang');

Route::get('removeProduct/{id}','PageController@removeProduct');

Route::get('dat_hang',['uses'=>'PageController@getDathang'])->name('dathang');

Route::post('order',['uses'=>'PageController@postDathang'])->name('test');


//ADMIN



//login
Route::get('adminshop','AuthController@getDangnhap')->name('dangnhap');

Route::post('dangnhap','AuthController@postDangnhap')->name('postdangnhap');

Route::get('logout' ,'AuthController@getLogout')->name('logout');

//loại sản phẩm
Route::get('list_lsp','AdminController@getList_lsp')->name('list_lsp');

Route::get('add_lsp','AdminController@getAddlsp')->name('add_lsp');	

Route::post('post_add_lsp','AdminController@postAdd_lsp')->name('post_add_lsp');

Route::get('edit_lsp/{id}','AdminController@getEdit_lsp')->name('edit_lsp');

Route::post('post_edit_lsp/{id}','AdminController@postEdit_lsp')->name('post_edit_lsp');

Route::get('delete_lsp/{id}','AdminController@getDelete_lsp')->name('delete_lsp');


// sản phẩm
Route::get('list_sp','AdminController@getList_sp')->name('list_sp');

Route::get('add_sp','AdminController@getAdd_sp')->name('add_sp');

Route::post('post_Add_sp','AdminController@postAdd_sp' )->name('post_Add_sp');

Route::get('edit_sp/{id}','AdminController@getEdit_sp')->name('edit_sp');

Route::post('post_Edit_sp/{id}','AdminController@postEdit_sp')->name('post_Edit_sp');

Route::get('delete_sp/{id}','AdminController@getDelete_sp')->name('delete_sp');

//user

Route::get('list_user','AdminController@getList_user')->name('list_user');

Route::get('add_user','AdminController@getAdd_user')->name('add_user');

Route::post('post_add_user','AdminController@postAdd_user')->name('post_add_user');

Route::get('edit_user/{id}','AdminController@getEdit_user')->name('edit_user');

Route::post('post_edit_user/{id}','AdminController@postEdit_user')->name('post_edit_user');

Route::get('delete_user/{id}','AdminController@getDelete_user')->name('delete_user');

//Đơn hàng
Route::get('donghang','AdminController@getList_donhang')->name('list_donhang');

Route::get('detail_dh/{id}','AdminController@getDetail_donhang')->name('detail_dh');

Route::get('delete_donhang/{id}','AdminController@getDelete_donhang')->name('delete_donhang');

//TÌM KIẾM

Route::get('timkiem','PageController@get_Timkiem')->name('timkiem');




Route::get('cart',function(){
	return  dd(Cart::content());
});

Route::get('total',function(){
	return 
	number_format(Cart::subtotal()*10000,0)  ;
});

Route::get('content',function(){
	$user = User::paginate(10);
	return view('admin.user.content-delete-user',compact('user'));
});