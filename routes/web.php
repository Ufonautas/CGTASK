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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); // HOME PAGE


Route::get('/controlpanel', 'adminController@ctrlpanel'); // MAIN ADMIN PANEL [ADMIN]
Route::get('/controlpanel/createproduct', 'adminController@createProduct'); // CREATE PRODUCT [ADMIN]
Route::put('/controlpanel/store', 'adminController@store'); // SAVE PRODUCT [ADMIN]
Route::get('/controlpanel/viewproducts', 'adminController@viewproducts'); // VIEW PRODUCTS [ADMIN]
Route::get('/controlpanel/viewproducts/destroy/{id}', 'adminController@destroyProduct'); // DESTROY PRODUCT [ADMIN]

Route::get('/viewproduct/{id}', 'HomeController@viewproduct'); // VIEW INDIVIDUAL PRODUCT [USER]
Route::get('/checkout/{id}', 'paymentController@servepayment'); // !OBSOLETE! PAYMENT GATEWAY [USER]
Route::post('/checkout/process/{id}', 'paymentController@processpayment'); // PROCESS PAYMENT VIA STRIPE [USER]
Route::get('/mysubscriptions', 'HomeController@mySubs'); // VIEW OF SUBSCRIPTIONS PAGE [USER]
