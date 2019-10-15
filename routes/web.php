<?php

use App\Http\Resources\User as UserResource;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return redirect()->route('admin.home');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::get('/', function () {
                return view('home');
            })->name('home');
            Route::prefix('events')->group(function () {
                Route::get('/', 'EventsController@index')->name('events');
                Route::get('{id}', 'EventsController@show')->name('event_show')->where('id', '[0-9]+');
                Route::get('{id}/edit', 'EventsController@edit')->name('event_edit')->where('id', '[0-9]+');
                Route::post('{id}/edit', 'EventsController@update')->name('event_post')->where('id', '[0-9]+');
                Route::delete('{id}/destroy', 'EventsController@destroy')->name('event_destroy')->where('id', '[0-9]+');
                Route::delete('{id}/destroyPerm', 'EventsController@destroyPerm')->name('event_destroyPerm')->where('id', '[0-9]+');
                Route::post('{id}/restore', 'EventsController@restore')->name('event_restore')->where('id', '[0-9]+');
            });
            Route::prefix('photos')->group(function (){
               Route::get('/', 'PhotoEventsController@index')->name('photos');
            });
        });
    });
});

Auth::routes();
