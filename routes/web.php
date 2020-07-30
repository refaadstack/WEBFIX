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

    $posts= App\Post::all();
    return view('welcome')->withPosts($posts);
})->name('welcome');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:admin']], function () {
    // Post
    Route::get('posts/create', 'PostController@create')->name('posts.create');
    route::get('posts/{post}/edit', 'PostController@edit')->name('posts.edit');
    Route::post('posts', 'PostController@store')->name('posts.store');
    Route::delete('posts/{post}', 'PostController@destroy')->name('posts.destroy');
    Route::put('posts/{post}', 'PostController@update')->name('posts.update');
    // end post
    // category
    Route::get('category/create', 'CategoryController@create')->name('category.create');
    route::get('category/{category}/edit', 'CategoryController@edit')->name('category.edit');
    Route::post('category', 'CategoryController@store')->name('category.store');
    Route::delete('category/{category}', 'CategoryController@destroy')->name('category.destroy');
    Route::put('category/{category}', 'CategoryController@update')->name('category.update');
    // end category

    //sektors
    Route::get('sektors/create', 'SektorController@create')->name('sektors.create');
    route::get('sektors/{sektors}/edit', 'SektorController@edit')->name('sektors.edit');
    Route::post('sektors', 'SektorController@store')->name('sektors.store');
    Route::delete('sektors/{sektors}', 'SektorController@destroy')->name('sektors.destroy');
    Route::put('sektors/{sektors}', 'SektorController@update')->name('sektors.update');
    // endsektors

    Route::get('user', 'PengunjungController@index')->name('user.index');

    //Member
    Route::get('member/create', 'MemberController@create')->name('member.create');
    route::get('member/{member}/edit', 'MemberController@edit')->name('member.edit');
    Route::post('member', 'MemberController@store')->name('member.store');
    Route::delete('member/{member}', 'MemberController@destroy')->name('member.destroy');
    Route::put('member/{member}', 'MemberController@update')->name('member.update');
    // endMember




});
Route::get('posts/{post}', 'PostController@show')->name('posts.show');
Route::get('posts', 'PostController@index')->name('posts.index');

Route::get('category/{category}', 'CategoryController@show')->name('category.show');
Route::get('category', 'CategoryController@index')->name('category.index');

Route::get('sektors/{sektors}', 'SektorController@show')->name('sektors.show');
Route::get('sektors', 'SektorController@index')->name('sektors.index');

Route::get('member', 'MemberController@index')->name('member.index');


Route::post('comment/create/{post}', 'CommentController@buatKomentar')->name('buatKomentar.store');

Route::post('search','SearchController@search')->name('search');

