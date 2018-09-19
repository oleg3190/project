<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('register.verify');

    Route::middleware(['auth'])->group(function (){

        Route::get('/', 'HomeController@index')->name('home');
    });


Route::get('/cabinet','HomeController@index')->middleware('auth')->name('cabinet');

    //Кабинет пользователя
Route::group(
    [
        'prefix'=>'admin',
        'as' =>'admin',
        'namespace'=>'Admin',
        'middleware'=>['auth'],
    ],
    function(){
        //Route::get('/cabinet','HomeController@index')->name('cabinet.home');
        Route::get('/', 'HomeController@index')->name('admin.home');

        Route::get('/users{id}', 'UsersController@index')->name('admin.users.show');
        Route::resource('users', 'UsersController');
        Route::post('/users/{id}', 'UsersController@index')->name('admin.users.show');
    });

    //телеграмм каналы
Route::group(['prefix'=> 'channels',
              'namespace'=>'Cabinet\Channels',
              'middleware'=>['auth'],
],function (){
    Route::get('/',['uses'=>'ChannelsController@execute','as'=> 'channel']);




    Route::post('/add', ['uses'=>'ChannelsAddController@execute','as'=>'channelAdd']);

    Route::match(['post','delete'],'/edit/{channel}',['uses'=>'ChannelsEditController@execute','as'=>'channelEdit']);

    Route::get('/add',['uses'=>'ChannelsAddController@chanelAdd','as'=> 'channelAdds']);

});


