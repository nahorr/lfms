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
	/* Paystack */
  	Route::post('/paystack', 'HomeController@payStackPost');
	
	//User profile page
	Route::get('profile', 'ProfileController@profile');
	Route::post('update_avatar', 'ProfileController@updateAvatar');	

});

//Private Area - Admin Users
Route::group(['middleware' => ['auth','admin']], function () { 

	//Admin Home page for the company
  	Route::get('admin/home', 'Admin\HomeController@index');
  	/* Paystack */
  	Route::post('/admin/paystack', 'Admin\HomeController@payStack');

  	/* Users */
  	//Manage users
  	Route::get('admin/users/showusers', 'Admin\UsersController@showUsers');
  	//Delete a user
  	Route::get('admin/deleteuser/{user}', 'Admin\UsersController@deleteUser');
  	//Make Admin or User
  	Route::post('admin/users/makeadmin/{user}', 'Admin\UsersController@makeAdmin');
  	Route::post('admin/users/makeuser/{user}', 'Admin\UsersController@makeUser');

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
  	Route::get('admin/cases/showallclientcases/{client}', 'Admin\ClientCasesController@showAllClientCases');
  	Route::post('admin/cases/addcase', 'Admin\ClientCasesController@addCase');

  	/*Court Dates and Times*/
  	Route::get('admin/cases/courtdates', 'Admin\ClientCasesController@courtDates');

  	/* Template Types*/
  	Route::get('admin/templates/showtemplatetypes', 'Admin\TemplatesController@showTemplateTypes');

  	/* Template Types */
  	//Manage Template Types
  	Route::get('admin/agreements/types/showagreementtypes', 'Admin\AgreementTypesController@showAgreementTypes');
  	Route::post('admin/agreements/types/addagreementtype', 'Admin\AgreementTypesController@addAgreementType');
  	Route::get('admin/agreements/types/deleteagreementtype/{type}', 'Admin\AgreementTypesController@deleteAgreementType');

});