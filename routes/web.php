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

Route::get('/', 'home@index');
Route::match(array('get', 'post'),'/perfil', 'retrato@index');    
Route::post('/uploadfotoperfil', 'uploadfotoperfil@index');
Route::post('/uploadfotoperfil/do_upload', 'uploadfotoperfil@do_upload');
Route::get('/uploadfotoperfil', 'uploadfotoperfil@index');
Route::get('/uploadfotoperfil/do_upload', 'uploadfotoperfil@do_upload');
Route::match(array('get','post'),'/logout','home@logout');
Route::get('/login', 'login@index');
Route::post('/login', 'login@login');
Route::match(array('get','post'),'/registar', 'registar@index');
Route::post('/uploadfotoregisto', 'uploadfotoregisto@index');
Route::post('/uploadfotoregisto/do_upload', 'uploadfotoregisto@do_upload');
Route::get('/contactos', 'contactos@index');
Route::match(array('get','post'),'/enviarcorreio', 'enviarcorreio@mail');
Route::match(array('get','post'),'/blog', 'controladorblog@index');
Route::match(array('get','post'),'/blog/updateInsertPublicacoes', 'controladorblog@updateInsertPublicacoes');
Route::match(array('get','post'),'/blog/comentario','controladorblog@InsereComentario');
Route::match(array('get','post'),'/blog/{opcao}',['uses' =>'controladorblog@index']);
Route::match(array('get','post'),'/blog/{opcao}/{id}',['uses' =>'controladorblog@index']);
Route::post('/upload_blog_foto', 'controladorblog@upload_blog_foto');
Route::get('/removerutilizador/{opcao}/{username}',['uses' =>'removerutilizador@removeutilizador']);
Route::get('/removerutilizador','removerutilizador@removeutilizador');
Route::get('/gastosmensais','gastosmensais@index');
Route::get('/meses/{mes}',['uses' =>'meses@index']);
Route::get('/meses/{mes}/{opcao}',['uses' =>'meses@index']);
Route::match(array('get','post'),'/videostream',['uses' =>'videostream@index']);
