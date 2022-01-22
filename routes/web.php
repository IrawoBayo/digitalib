<?php

use App\User;
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

Route::get('/suspended/{id}', function ($id) {
    $user = User::findOrFail($id);
    return view('show-timer',compact('user'));
});

Auth::routes();

Route::post('/post-login', 'Auth\LoginController@postLogin');
// Route::get('/suspend', 'Auth\LoginController@suspend');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('all-users', 'Admin\UserController@index')->name('all-users');
        Route::get('active-users', 'Admin\UserController@active')->name('active-users');
        Route::get('suspended-users', 'Admin\UserController@suspended')->name('suspended-users');
    
        Route::get('book-category', 'Admin\BookController@category')->name('category');
        Route::post('book-category', 'Admin\BookController@postCategory')->name('category');
        Route::get('all-books', 'Admin\BookController@books')->name('books');
        Route::post('upload-book', 'Admin\BookController@postBook')->name('uploadbook');
        Route::get('view-book/{id}', 'Admin\BookController@viewBook');
        Route::get('edit-book/{id}', 'Admin\BookController@editBook');
        Route::post('update-book/{id}', 'Admin\BookController@updateBook');
        Route::match(['get', 'post'],'delete-book/{id}', 'Admin\BookController@deleteBook');
    
        Route::get('borrow-requests', 'Admin\BorrowController@bookRequest')->name('requests');
        Route::match(['get', 'post'],'accept-request/{id}', 'Admin\BorrowController@acceptReq');
        Route::get('borrower-lists', 'Admin\BorrowController@borrowList')->name('borrowlists');

        Route::get('plag-checker', 'Admin\PlagSearchController@index')->name('plag');
        Route::post('plag-checker', 'Admin\PlagSearchController@check')->name('plag');
    });
});

Route::group(['middleware' => ['auth','role:user']], function () {
    Route::get('my-books', 'User\BookController@myBook')->name('mybook');
    Route::get('my-book/{isbn}', 'User\BookController@book');
    Route::get('my-book/{isbn}/download', 'User\BookController@downloadBook');
    Route::get('borrow-book', 'User\BookController@showReq')->name('showreq');
    Route::post('borrow-book', 'User\BookController@postReq')->name('postreq');
    Route::match(['get', 'post'],'return-book/{id}', 'User\BookController@returnBook');
});

