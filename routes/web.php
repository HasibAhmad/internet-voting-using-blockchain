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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
//	Route::get('table-list', function () {
//		return view('pages.table_list');
//	})->name('table');

//	Route::get('typography', function () {
//		return view('pages.typography');
//	})->name('typography');

	Route::get('blockchain', function () {
		return view('pages.blockchain');
	})->name('blockchain');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('test', 'UserController@testBlockChain');
    Route::get('testBlockChain', 'UserController@testBlockChain');

});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('voter', 'VoterController');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('candidate', 'CandidateController');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('blockchain', 'BlockchainController');
    Route::get('getAddress', 'BlockchainController@getAddress');
});
