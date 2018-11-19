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
    Route::get('/hanman/{finish}','frontend\IndexController@hanmanlist')->where(['finish' => '[0-1]']);
    Route::get('/hanman/hot','frontend\IndexController@hanmanhotlist');
    Route::get('/manhuaview/{manhua_id}/','frontend\IndexController@manhuaview')->where(['manhua_id' => '[0-9]+']);
    Route::get('/manhuachapter/{manhua_id}/{chapter_id}/','frontend\IndexController@manhuachapterview')->where(['manhua_id' => '[0-9]+'])->where(['chapter_id' => '[0-9]+']);
    Route::get('/search/{search}/','frontend\IndexController@search');
    Route::get('/vip/','frontend\IndexController@vip');

    Route::get('/login','frontend\LoginController@login');
    Route::get('/registered','frontend\LoginController@registered');
    Route::post('/user/login','frontend\LoginController@loginprocess');
    Route::post('/user/registered','frontend\LoginController@registeredprocess');
    Route::get('/user/logout','frontend\LoginController@logout');

    Route::get('/daili/{daili_id}','frontend\DailiController@dailientrance')->where(['daili_id' => '[0-9]+']);

    //wap端-----------------------------------------------------------------------------------------
    Route::get('/m/','frontend\IndexController@wapindex');
    Route::get('/m/index.html','frontend\IndexController@wapindex');
    Route::get('/m/manhua/{cid}/','frontend\IndexController@wapmanhualist')->where(['cid' => '[0-9]+']);
    Route::get('/m/manhuaview/{manhua_id}/','frontend\IndexController@wapmanhuaview')->where(['manhua_id' => '[0-9]+']);
    Route::get('/m/manhuaview/{manhua_id}/{order}','frontend\IndexController@wapmanhuaview')->where(['manhua_id' => '[0-9]+']);
    Route::get('/m/manhuachapter/{manhua_id}/{chapter_id}/','frontend\IndexController@wapmanhuachapterview')->where(['manhua_id' => '[0-9]+'])->where(['chapter_id' => '[0-9]+']);
    Route::get('/m/hanman/hot/','frontend\IndexController@waphanmanhotlist');
    Route::get('/m/hanman/{type}','frontend\IndexController@waphanmanlist')->where(['type' => '[0-9]+']);
    Route::post('/m/hanman/next','frontend\IndexController@waphanmanlistnext');
    Route::any('/m/search/','frontend\IndexController@wapsearchpage');
    Route::any('/m/search/{search}','frontend\IndexController@wapsearch');
    Route::get('/m/login','frontend\LoginController@waplogin');
    Route::get('/m/register','frontend\LoginController@wapregister');

    //这需要login才能进去的


//    Route::get('/m/manhua/{cid}/','frontend\IndexController@manhualist')->where(['cid' => '[0-9]+']);
//    Route::get('/m/manhuaview/{manhua_id}/','frontend\IndexController@manhuaview')->where(['manhua_id' => '[0-9]+']);
//    Route::get('/m/manhuachapter/{chapter_id}/','frontend\IndexController@manhuachapterview.blade.php')->where(['chapter_id' => '[0-9]+']);

});

Route::group(['middleware' => ['web','user.login']],function () {
    //pc
    Route::get('/user/pay/{chapter_id}','frontend\UserController@pay')->where(['chapter_id' => '[0-9]+']);
    Route::any('/user/paycoin/{chapter_id}','frontend\UserController@paycoin')->where(['chapter_id' => '[0-9]+']);
    Route::get('/user/center','frontend\UserController@center');
    Route::get('/user/deposit','frontend\UserController@deposit');

    //wap
    Route::get('/m/user/center','frontend\UserController@wapcenter');
    Route::get('/m/user/deposit','frontend\UserController@wapdeposit');

    //图片上传
    Route::any('/backend/upload','backend\JobController@upload');
    Route::any('/backend/uploadphoto/{id}','MyController@uploadphoto');
});






//---------------------wap前端------------------------
//Route::get('/m/','frontend\WapController@index');
//Route::get('/m/joinus','frontend\WapController@joinus');
//Route::get('/m/job','frontend\WapController@job');
//
//Route::post('/uploadresume','frontend\IndexController@upload');
//Route::any('/frontend/uploadresume','frontend\FrontendController@uploadresume');
//Route::post('/frontend/updateapply','frontend\IndexController@updateapply');





