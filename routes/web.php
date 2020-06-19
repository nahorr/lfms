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

Route::get('/', 'Controller@welcome')->name('welcome');

//Company Registration
Route::get('/register_company', 'Controller@registerCompany')->name('registercompany');
Route::post('/register_company', 'Controller@postRegisterCompany')->name('postregistercompany');

Auth::routes();//Auth::routes(['verify' => true]); /*Also uncoment implements MustVerifyEmail in User.php model*/

//Private Area - Regular Users
Route::group(['middleware' => 'auth'], function () {

	//Home page when loged in 
	Route::get('/user/home', 'User\HomeController@index')->name('home');
	
	//User profile page
	Route::get('/user/profile', 'User\ProfileController@profile')->name('profile');
	Route::post('/user/update_avatar', 'User\ProfileController@updateAvatar');
  Route::post('/user/update_password', 'User\ProfileController@updatePassword');

  //Users - showuser users
  Route::get('user/users/showusers', 'User\UsersController@showUsers')->name('Company Users');


});

//Private Area - Admin Users
Route::group(['middleware' => ['auth','admin']], function () { 

	//Admin Home page for the company
  	Route::get('admin/home', 'Admin\HomeController@index');
  	/* Paystack */
  	Route::post('/admin/paystack', 'Admin\HomeController@payStack');

  	/* Users */
  	//Manage users
  	Route::get('admin/users/showusers', 'Admin\UsersController@showUsers')->name('company users');
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
  	Route::post('admin/templates/types', 'Admin\TemplatesController@addTemplateType');
  	Route::get('admin/templates/types/delete/{type}', 'Admin\TemplatesController@deleteTemplateType');

  	/* Templates*/
  	//Manage Template by types
  	Route::get('admin/templates/types/showtemplates/{type}', 'Admin\TemplatesController@showTemplates');
  	Route::post('admin/templates/types/addtemplate/{type}', 'Admin\TemplatesController@addTemplate');

  	Route::get('admin/agreements/types/deleteagreementtype/{type}', 'Admin\AgreementTypesController@deleteAgreementType');

    //Company - Subscription
    Route::get('admin/company/subscriptions', 'Admin\Company\SubscrptionController@showSubscriptions');

});

//Private Area - Super Admin Users. For Nahorr Analtytic Management of registered law firms
Route::group(['middleware' => ['auth', 'superadmin']], function () {

  //Home page when Super Admin is loged in 
  Route::get('/super/home', 'SuperAdmin\HomeController@index')->name('superhome');

  //Manage Users
  Route::get('/super/users/showusers', 'SuperAdmin\UsersController@showUsers')->name('All Users');
  Route::get('/super/users/delete/{user}', 'SuperAdmin\UsersController@deleteUser');

    //Add new user
    Route::get('/super/users/newuser', 'SuperAdmin\UsersController@newUser')->name('New User');
    Route::post('/super/users/addnewuser', 'SuperAdmin\UsersController@addNewUser');
  
  //Manage Companies
  Route::get('/super/companies/showcompanies', 'SuperAdmin\CompaniesController@showCompanies')->name('companies');
  Route::get('/super/companies/delete/{company}', 'SuperAdmin\CompaniesController@deleteCompany');

  //Add New Company
    Route::get('/super/companies/newcompany', 'SuperAdmin\CompaniesController@newCompany')->name('NewCompany');
    Route::post('/super/companies/addnewcompany', 'SuperAdmin\CompaniesController@addNewCompany');

});