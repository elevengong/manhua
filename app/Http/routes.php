<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//---------------------后台------------------------
Route::group(['middleware' => ['web']],function () {
    //pc端-----------------------------------------------------------------------------------------
    Route::get('/','frontend\IndexController@index');
    Route::get('/index.html','frontend\IndexController@index');
    Route::get('/manhua/{cid}/','frontend\IndexController@manhualist')->where(['cid' => '[0-9]+']);
    Route::get('/manhuaview/{manhua_id}/','frontend\IndexController@manhuaview')->where(['manhua_id' => '[0-9]+']);
    Route::get('/manhuachapter/{chapter_id}/','frontend\IndexController@manhuachapterview.blade.php')->where(['chapter_id' => '[0-9]+']);

    Route::get('/login','frontend\LoginController@login');
    Route::get('/registered','frontend\LoginController@registered');

    //这需要login才能进去的
    Route::get('/user/center','frontend\UserController@center');

    Route::post('/user/login','frontend\LoginController@loginprocess');
    Route::post('/user/registered','frontend\LoginController@registeredprocess');
    Route::get('/user/logout','frontend\LoginController@logout');

    Route::get('/daili/{daili_id}','frontend\DailiController@dailientrance')->where(['daili_id' => '[0-9]+']);

    //wap端-----------------------------------------------------------------------------------------
    Route::get('/m/','frontend\IndexController@wapindex');
    Route::get('/m/index.html','frontend\IndexController@wapindex');
    Route::get('/m/manhua/{cid}/','frontend\IndexController@wapmanhualist')->where(['cid' => '[0-9]+']);
    Route::get('/m/manhuaview/{manhua_id}/','frontend\IndexController@wapmanhuaview')->where(['manhua_id' => '[0-9]+']);
    Route::get('/m/manhuachapter/{chapter_id}/','frontend\IndexController@wapmanhuachapterview')->where(['chapter_id' => '[0-9]+']);

    Route::get('/m/manhuavipchapter/{chapter_id}/','frontend\IndexController@wapmanhuavipchapterview')->where(['chapter_id' => '[0-9]+']);


    Route::get('/m/user/login','frontend\LoginController@waplogin');
    Route::get('/m/user/register','frontend\LoginController@wapregister');

    //这需要login才能进去的
    Route::get('/m/user/center','frontend\UserController@wapcenter');
    Route::get('/m/user/pay','frontend\UserController@wappay');

//    Route::get('/m/manhua/{cid}/','frontend\IndexController@manhualist')->where(['cid' => '[0-9]+']);
//    Route::get('/m/manhuaview/{manhua_id}/','frontend\IndexController@manhuaview')->where(['manhua_id' => '[0-9]+']);
//    Route::get('/m/manhuachapter/{chapter_id}/','frontend\IndexController@manhuachapterview.blade.php')->where(['chapter_id' => '[0-9]+']);

});

Route::group(['middleware' => ['web','user.login']],function () {



    //图片上传
    Route::any('/backend/upload','backend\JobController@upload');
    Route::any('/backend/uploadphoto/{id}','MyController@uploadphoto');
});


//---------------------pc前端------------------------

//Route::any('/getadphoto/{uid}','frontend\IndexController@getAdPhoto')->where(['uid' => '[0-9]+']);
//Route::any('/test','frontend\IndexController@test');
//Route::group(['middleware' => ['cors']],function () {
//
//
//
//});





//---------------------wap前端------------------------
//Route::get('/m/','frontend\WapController@index');
//Route::get('/m/joinus','frontend\WapController@joinus');
//Route::get('/m/job','frontend\WapController@job');
//
//Route::post('/uploadresume','frontend\IndexController@upload');
//Route::any('/frontend/uploadresume','frontend\FrontendController@uploadresume');
//Route::post('/frontend/updateapply','frontend\IndexController@updateapply');





