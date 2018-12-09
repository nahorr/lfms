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

Route::get('/', 'Controller@welcome');

Auth::routes();//Auth::routes(['verify' => true]); /*Also uncoment implements MustVerifyEmail in User.php model*/

//Private Area - Regular Users
Route::group(['middleware' => 'auth'], function () {

	//Home page when loged in 
	Route::get('home', 'HomeController@index')->name('home');
	
	//User profile page
	Route::get('profile', 'ProfileController@profile');
	Route::post('update_avatar', 'ProfileController@updateAvatar');	

});

//Private Area - Admin Users
Route::group(['middleware' => ['auth','admin']], function () { 

	//Admin Home page for the company
  	Route::get('admin/home', 'Admin\HomeController@index');

  	/* Users */
  	//Manage users
  	Route::get('admin/users', 'Admin\UsersController@showUsers');
  	//Delete a user
  	Route::get('admin/deleteuser/{user}', 'Admin\UsersController@deleteUser');

  	//Make Admin or make User
  	Route::get('/admin/makeUser/{user}', 'Admin\UsersController@makeUser');
  	Route::get('/admin/makeAdmin/{user}', 'Admin\UsersController@makeAdmin');

  	/* Clients */
  	//Manage clients
  	Route::get('admin/clients/showclients', 'Admin\ClientsController@showClients');
  	Route::post('admin/clients/addclient', 'Admin\ClientsController@addClient');
  	Route::post('admin/clients/editclient/{client}', 'Admin\ClientsController@editClient');
  	Route::get('admin/clients/deleteclient/{client}', 'Admin\ClientsController@deleteClient');

  	/* Cases */
  	//Manage cases
  	Route::get('admin/cases/showcases', 'Admin\ClientCasesController@showCases');
  	Route::post('admin/cases/addcase', 'Admin\ClientCasesController@addCase');

  	/* Agreement Types */
  	//Manage Agreement Types
  	Route::get('admin/agreements/types/showagreementtypes', 'Admin\AgreementTypesController@showAgreementTypes');
  	//Route::post('admin/cases/addcase', 'Admin\ClientCasesController@addCase');
  	
});