<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Auth login routes
Auth::routes();

//home routes
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function(){
    return view('auth.register');
});
Route::group(['middleware' => 'web'], function (){
    Route::get('createField', function () {
        return view('createField');
    });
});

Route::get('/fieldPhases/{fieldName}', 'FieldPhasesController@index');
Route::get('/createFieldDate/{fieldName}', 'FieldPhasesController@create');
Route::get('/showField/{fieldName}/{fieldDate}', 'FieldPhasesController@show');


//Agriculturist
Route::get('/addFarmer', function () {
    return view('addFarmer');
});
Route::get('/agriculturistFields/{id}', 'AgricalturistViewController@userFields');
Route::get('/agiculturistFieldPhases/{id}/{fieldName}', 'AgricalturistViewController@userFieldsPhases');
Route::get('/agiculturistShowField/{id}/{fieldName}/{fieldDate}', 'AgricalturistViewController@showField');


