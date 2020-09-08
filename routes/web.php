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


/*---------------------------------------------------------------------------------------*/
//Route  pour contacter l'aadministrateur
Route::get('/contact', 'ContactFormController@create')->name('site.products.contacts.create');
Route::get('/cgv', 'ContactFormController@cgv')->name('site.products.contacts.cgv');
Route::get('/cgu', 'ContactFormController@cgu')->name('site.products.contacts.cgu');
Route::post('/contact', 'ContactFormController@store')->name('site.products.contacts.store');;

//-----------------------------------Route frontend-----------------------------//
Route::get('/', 'Site\ArticleController@index')->name('site.products.index');
Route::get('/welcome','Site\ArticleController@index')->name('site.products.index');
Route::get('/show/{article}-{slug}', 'Site\ArticleController@show')->name('site.products.articles.show');
//-----------------------------End route------------------------------------------//
Route::get('/articles', 'Site\ArticleController@Article')->name('site.products.articles.article');

//Route envoi message
Route::post('message', 'UserController@message')->name('message'); 

//-----------------------------------------Route categories----------------------------------//
Route::get('/articles/categories/desserts', 'Site\ArticleController@Dessert')->name('site.products.categories.dessert');
Route::get('/articles/categories/entrees', 'Site\ArticleController@Entree')->name('site.products.categories.entree');
Route::get('/articles/categories/aperitifs', 'Site\ArticleController@Aperitif')->name('site.products.categories.aperitif');
Route::get('/articles/categories/boissons', 'Site\ArticleController@Boisson')->name('site.products.categories.boisson');
Route::get('/articles/categories/plats', 'Site\ArticleController@Plat')->name('site.products.categories.plat');
//-----------------------------------------petidéjeuner------------------------------------------------------------//
Route::get('/articles/categories/petitdejeuner', 'Site\ArticleController@Petitdejeuner')->name('site.products.categories.petitdejeuner');
Route::get('/articles/categories/dejeuner', 'Site\ArticleController@Dejeuner')->name('site.products.categories.dejeuner');
Route::get('/articles/categories/diner', 'Site\ArticleController@Diner')->name('site.products.categories.diner');
//-----------------------------------------Fin de route categories----------------------------------//
Route::group(['middleware' => ['auth']], function () {
    //-------------------------------------comments--------------------------------------------------//
    Route::post('/articles/comments', 'Site\CommentsController@store')->name('articles.comments.store');
  
   //-----------------------------------------userprofil----------------------------------------------->
    Route::get('/site/profils', 'Site\UserProfilController@index')->name('site.profils.index');
    Route::get('/site/profils/create', 'Site\UserProfilController@create')->name('site.profils.create');
    Route::post('/site/profils', 'Site\UserProfilController@store')->name('site.profils.store');
    Route::get('/site/profils/{article}/edit', 'Site\UserProfilController@edit')->name('site.profils.edit');
    Route::get('/site/profils/show/{article}', 'Site\UserProfilController@show')->name('site.profils.show');
    Route::patch('/site/profils/update/{article}', 'Site\UserProfilController@update')->name('site.profils.update');
    Route::delete('/site/profils/destroy/{article}', 'Site\UserProfilController@destroy')->name('site.profils.destroy');

    //Route::get('/products/comments/{product}', 'Site\CommentsController@show');
});



Auth::routes();
require 'admin.php';

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
