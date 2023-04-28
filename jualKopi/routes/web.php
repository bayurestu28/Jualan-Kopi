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

Route::get('/', 'ProdukController@guestIndex')->name('guest.index');

Auth::routes();

Route::post('/register-request','CustomerController@registerCust')->name('register.request');
Route::post('/login-request', 'AuthController@login')->name('login.request');
Route::get('/logout', 'AuthController@logout')->name('logout');


Route::group(['middleware' => 'web'], function (){
	
	Route::group(['middleware' => 'auth:admin'], function (){
		Route::get('admin/dashboard', 'AdminController@index')->name('admin.dashboard');

		Route::get('admin/produk', 'ProdukController@index')->name('admin.produk');
		Route::post('admin/produk/tambah-data', 'ProdukController@store')->name('admin.produk.tambah');
		Route::get('admin/produk/{id}/hapus', 'ProdukController@destroy')->name('admin.produk.hapus');
		Route::get('admin/produk/{id}/edit', 'ProdukController@edit')->name('admin.produk.edit');
		Route::post('admin/produk/{id}/update', 'ProdukController@update')->name('admin.produk.update');

		Route::get('admin/transaksi/pesanan', 'TransaksiController@indexPesanan')->name('admin.transaksi.pesanan');
		Route::get('admin/transaksi/pesanan/{id}/detail', 'TransaksiController@detailPesanan')->name('admin.transaksi.pesanan.detail');
		Route::get('admin/transaksi/pesanan/{id}/konfirmasi', 'TransaksiController@konfirmasiPesanan')->name('admin.transaksi.pesanan.konfirmasi');
		Route::get('admin/transaksi/pesanan/{id}/pilihkurir', 'TransaksiController@pilihKurir')->name('admin.transaksi.pesanan.pilihkurir');
		Route::get('admin/transaksi/pesanan/{id}/teruskan/{idkurir}', 'TransaksiController@kurirDipilih')->name('admin.transaksi.pesanan.teruskan');

		Route::get('admin/transaksi/laporan','TransaksiController@laporanPenjualan')->name('admin.transaksi.laporan');

		Route::get('admin/kurir','KurirController@indexKurir')->name('admin.kurir');
		Route::post('admin/kurir/tambah','KurirController@store')->name('admin.kurir.tambah');
		Route::get('admin/kurir/{id}/edit','KurirController@edit')->name('admin.kurir.edit');
		Route::post('admin/kurir/{id}/update','KurirController@update')->name('admin.kurir.update');
		Route::get('admin/kurir/{id}/hapus','KurirController@destroy')->name('admin.kurir.hapus');
		
		Route::get('admin/myprofile', function (){
			return view('admin/myprofile');
		})->name('admin.myprofile');
		Route::post('admin/myprofile/{id}/update','AdminController@updateProfile')->name('admin.myprofile.update');
	});

	Route::group(['middleware' => 'auth:kurir'], function (){
		Route::get('kurir/dashboard', 'KurirController@index')->name('kurir.dashboard');

		Route::get('kurir/myprofile', function (){
			return view('kurir/myprofile');
		})->name('kurir.myprofile');
		Route::post('kurir/myprofile/{id}/update','KurirController@updateProfile')->name('kurir.myprofile.update');

		Route::get('kurir/pengiriman/dikirim', 'TransaksiController@indexPengiriman')->name('kurir.pengiriman.dikirim');
		Route::get('kurir/pengiriman/dikirim/{id}/detail', 'TransaksiController@detailPengiriman')->name('kurir.pengiriman.detail');
		Route::get('kurir/pengiriman/dikirim/{id}/konfirmasi', 'TransaksiController@konfirmasiPengiriman')->name('kurir.pengiriman.konfirmasi');

		Route::get('kurir/pengiriman/riwayat','TransaksiController@riwayatPengiriman')->name('kurir.pengiriman.riwayat');

	});

	Route::group(['middleware' => 'auth:customer'], function (){
		Route::get('customer', 'CustomerController@index')->name('customer.index');
		Route::get('customer/myprofile', function (){
			return view('customer/myprofile');
		})->name('customer.myprofile');
		Route::post('customer/myprofile/{id}/update','CustomerController@updateProfile')->name('customer.myprofile.update');

		Route::get('customer/produk/{id}/detail','ProdukController@detailProduk')->name('customer.produk.detail');

		Route::get('customer/cart','TransaksiController@cart')->name('customer.cart');
		Route::get('customer/produk/{id}/addtocart', 'TransaksiController@addtoCart')->name('customer.addtocart');
		Route::get('customer/cart/{id}/hapus','DetilTransaksiController@destroy')->name('customer.cart.hapus');
		Route::post('customer/cart/{id}/tambahjumlah','DetilTransaksiController@tambahJumlah')->name('customer.cart.tambahjumlah');

		Route::get('customer/cart/{id}/checkout','TransaksiController@checkout')->name('customer.checkout');
		Route::post('customer/cart/{id}/checkout/confirm','TransaksiController@checkoutConfirm')->name('customer.checkout.confirm');

		Route::get('customer/riwayatpemesanan','TransaksiController@riwayatPemesanan')->name('customer.riwayat');
	});
});
