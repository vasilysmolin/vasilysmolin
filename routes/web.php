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


use Illuminate\Support\Facades\Route;

$domain = 'vasilysmolin.ru';


Route::group([
    'domain' => '{sub}.' . $domain,
    'middleware' => ['web']
], function () {

    Route::get('/', function () {
        return view('welcomeCity');
    });

});


Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/users',[
    'as'=> 'users',
    'uses' => 'User\UserController@getUser'
]);

Route::get('/createDeploy/{deployName}/{deployEnv}', 'Misc\DeployController@deploy');


