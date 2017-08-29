<?php

/*
|-----------------------------
| 框架脚手架路由配置
|-----------------------------
*/

$route_config = [];
$route_config['prefix'] = config('zzld_foundation.scaffold_route_prefix', 'backend');

if(config('zzld_foundation.admin_enable', false)){
	$route_config['middleware'] = 'auth';
}

// dd($route_config);
Route::group($route_config, function (){
    Route::get('/',     'ScaffoldController@dashboard')->name('scaffold_dashboard');
    Route::get('/profile',     'ScaffoldController@profile')->name('scaffold_profile');

    Route::get('/scaffold/{model_name}/list/{format?}',     'ScaffoldController@index')->name('scaffold_list');
    Route::get('/scaffold/{model_name}/show/{id}/{format?}', 'ScaffoldController@show')->name('scaffold_show');
    Route::get('/scaffold/{model_name}/create/{format?}', 'ScaffoldController@create')->name('scaffold_create');
    Route::post('/scaffold/{model_name}/store/{format?}', 'ScaffoldController@store')->name('scaffold_store');
    Route::get('/scaffold/{model_name}/edit/{id}/{format?}', 'ScaffoldController@edit')->name('scaffold_edit');
    Route::post('/scaffold/{model_name}/update/{format?}', 'ScaffoldController@update')->name('scaffold_update');
    Route::get('/scaffold/{model_name}/destory/{id}/{format?}', 'ScaffoldController@destory')->name('scaffold_destory');
    Route::post('/scaffold/{model_name}/destoryall/{format?}', 'ScaffoldController@destoryAll')->name('scaffold_destory_all');


	//内置操作界面
    Route::get('/scaffold/inline/{model_name}/{id}/{rela_model}/{fkey}', 'ScaffoldController@inline_create')->name('scaffold_inline_create');
    Route::get('/scaffold/{model_name}/model/{format?}',     'ScaffoldController@modelSelect')->name('scaffold_model_select');
    Route::post('/scaffold/inline/{model_name}/{id}/{rela_model}/{fkey}/store', 'ScaffoldController@inline_store')->name('scaffold_inline_store');

    //代码生成器
    Route::get('/codemaker', 'CodeMakerController@index')->name('codemaker');
    Route::get('/codemaker/{table_name}/model', 'CodeMakerController@makeModel')->name('codemaker_model');

    //集成界面
	Route::get('/dashboard', '\Zzld\Foundation\Http\Controllers\ScaffoldController@dashboard');
	Route::get('/change/password', '\Zzld\Foundation\Http\Controllers\CommonController@changePassword')->name('foundation.changepassword');
	Route::post('/change/password', '\Zzld\Foundation\Http\Controllers\CommonController@changePasswordDo')->name('foundation.changepassword.do');

});
