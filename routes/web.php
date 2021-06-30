<?php



Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'videos'], function(){
    Route::get('/', 'HomeController@index')->name('all-videos');
    Route::view('/upload-video', 'upload-video')->name('upload-video-show');
    Route::post('/upload-video', 'HomeController@upload')->name('upload-video');
});
