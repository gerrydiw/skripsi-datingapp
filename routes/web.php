<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/viewprofile/{id}', 'ProfileController@show')->name('profile.view');
    Route::put('profile/update/{id}', 'ProfileController@update')->name('profile.update');
    Route::put('profile/updatephoto/{id}', 'ProfileController@updatePhoto')->name('profile.updatePhoto');
    Route::put('profile/updatektp/{id}', 'ProfileController@updateKtp')->name('profile.updateKtp');
    Route::get('find', 'FindController@index')->name('find.index');
    // Route::get('chat/{id}', 'ChatController@show')->name('chat.show');
    Route::post('find/people', 'FindController@findPeople')->name('find.people');
    Route::resource('places', 'PlaceController');
});

Route::group(['as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Route::get('/home', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::post('users/verify/{id}', 'UsersController@verify')->name('users.verify');
});
