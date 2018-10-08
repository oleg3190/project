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
    Route::get('/',['uses'=>'ChannelsController@show','as'=> 'channel']);
    Route::post('/add', ['uses'=>'ChannelsController@chanelAdd','as'=>'channelAdd']);
    Route::match(['post','get','delete'],'/edit/{channel}',['uses'=>'ChannelsController@edit','as'=>'channelEdit']);
    Route::get('/add',['uses'=>'ChannelsController@chanelAddform','as'=> 'channelAdds']);

});


Route::group(['prefix'=> 'victorians',
    'namespace'=>'Cabinet\Victorians',
    'middleware'=>['auth'],
],function(){

    Route::match(['post','get','delete'],'/victoriansAdd',
        ['uses'=>'VictoriansController@create','as'=>'victoriansAdd']);

    Route::match(['delete','post'],'/destroy/{victorians}',
        ['uses'=>'VictoriansController@destroy','as'=>'victoriansDestroy']);

    Route::match(['post','get'],'/',
        ['uses'=>'VictoriansController@show','as'=>'victorians']);




    Route::match(['post','get'],'/{victorians}/questions/Add/',
        ['uses'=>'QuestionsController@create','as'=>'questionsAdd']);




    Route::match(['delete'],'/questions/destroy/{question}',
        ['uses'=>'QuestionsController@destroy','as'=>'questionsDestroy']);

    Route::match(['post','get'],'/{victorians}/questions',
        ['uses'=>'QuestionsController@show','as'=>'questions']);


});
