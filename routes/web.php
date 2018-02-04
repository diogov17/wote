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

Route::get('/', 'HomeController@index');

Route::get('artista/{id}', 'ArtistasController@pagina')->where('id', '([0-9]+)');
Route::get('organizador/{id}', 'OrganizadoresController@pagina')->where('id', '([0-9]+)');
Route::get('evento/{id}', 'EventosController@pagina')->where('id', '([0-9]+)');

Route::resource('artista', 'ArtistasController');
Route::resource('organizador', 'OrganizadoresController');
Route::resource('evento', 'EventosController');
Route::resource('search', 'SearchController');
Route::resource('registo', 'RegisterController');


Route::post('/registo/getConcelhos','RegisterController@getConcelhos');
Route::post('/registo/getDistritos','RegisterController@getDistritos');


Route::post('registo/artista','RegisterController@registoArtista');
Route::post('registo/organizador','RegisterController@registoOrganizador');
Route::post('registo/fa','RegisterController@registoFa');

Route::get('/ativacaoConta/{codigo}', 'RegisterController@ativacaoConta');

Route::resource('/bilheteira', 'BilheteiraController');

Route::get('/recuperarPassword', 'RegisterController@recuperarPassword');
Route::get('/politicaPrivacidade', 'HomeController@politicaPrivacidade');

Route::resource('/areaReservada', 'AreaReservadaController');
Route::resource('/locais', 'LocaisController');



Route::get('/formContacto', 'HomeController@formContacto');

Route::post('/formContacto', 'HomeController@saveFormContacto');



Route::get('/duvidaUtilizacao', 'HomeController@duvidaUtilizacao');
Route::get('/termosCondicoes', 'HomeController@termosCondicoes');
Route::get('/politicaPrivacidade', 'HomeController@politicaPrivacidade');

Route::get('/faq','HomeController@faq');
Route::get('/tabelaPrecos','HomeController@tabelaPrecos');


/*
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');
*/

//Route::post('/novoRegisto', 'Auth\AuthController@register');


// Password Reset Routes...
/*
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');
*/

Auth::routes();

//Registos:
/*
Route::resource('registo', 'RegisterController');
Route::get('registo/artista', 'RegisterController@registoArtista');
Route::get('registo/organizador', 'RegisterController@registoOrganizador');
Route::get('registo/fa', 'RegisterController@registoFa');

*/


Route::get('/home', 'HomeController@index')->name('home');



//Registos:
/*
Route::resource('registo', 'RegisterController');
Route::get('registo/artista', 'RegisterController@registoArtista');
Route::get('registo/organizador', 'RegisterController@registoOrganizador');
Route::get('registo/fa', 'RegisterController@registoFa');

*/



