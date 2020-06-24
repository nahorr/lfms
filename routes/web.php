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

//Private Area - View Common to all Authenticated uers
Route::group(['middleware' => 'auth'], function () {
  
  //User profile page
  Route::get('/user/profile', 'User\ProfileController@profile')->name('profile');
  Route::post('/user/update_avatar', 'User\ProfileController@updateAvatar');
  Route::post('/user/update_password', 'User\ProfileController@updatePassword');

});

//Private Area - Lawyers
Route::group(['middleware' => ['auth', 'lawyer']], function () {

	//Home page when loged in 
	Route::get('/lawyer/home', 'Lawyer\HomeController@index')->name('lawyerhome');
	

});

//Private Area - Admin Users
Route::group(['middleware' => ['auth','admin']], function () { 

	//Admin Home page for the company
  	Route::get('admin/home', 'Admin\HomeController@index')->name('adminhome');

  	//Manage Company users
  	Route::get('admin/users/showusers/{company}', 'Admin\UsersController@showCompanyUsers')->name('companyusers');
  	Route::get('admin/users/delete/{user}', 'Admin\UsersController@deleteUser');

      //Add new user
      Route::get('/admin/users/newuser/{company}', 'Admin\UsersController@newUser')->name('NewCompanyUser');
      Route::post('/admin/users/addnewuser/{company}', 'Admin\UsersController@addNewUser');

    	//Make Admin or User
    	//Route::post('admin/users/makeadmin/{user}', 'Admin\UsersController@makeAdmin');
    	//Route::post('admin/users/makeuser/{user}', 'Admin\UsersController@makeUser');

    	//Make Admin or make User
    	//Route::get('/admin/makeUser/{user}', 'Admin\UsersController@makeUser');
    	//Route::get('/admin/makeAdmin/{user}', 'Admin\UsersController@makeAdmin');

    //Manage Lawyers
    Route::get('/admin/lawyers/showlawyers/{company}', 'Admin\LawyersController@showCompanyLawyers')->name('companylawyers');
    Route::get('/admin/lawyers/delete/{lawyer}', 'Admin\LawyersController@deleteLawyer');
      //Add New Lawyers
      Route::get('/admin/lawyers/newlawyer/{company}', 'Admin\LawyersController@newLawyer')->name('NewCompanyLawyer');
      Route::post('/admin/lawyers/addnewlawyer/{company}', 'Admin\LawyersController@addNewLawyer');

  	//Manage clients
  	Route::get('admin/clients/showclients/{company}', 'Admin\ClientsController@showClients')->name('CompanyClients');
    Route::get('admin/clients/newclient/{company}', 'Admin\ClientsController@newClient')->name('newclient');
  	Route::post('admin/clients/addclient/{company}', 'Admin\ClientsController@addClient');
  	//Route::post('admin/clients/editclient/{client}', 'Admin\ClientsController@editClient');
  	Route::get('/admin/clients/delete/{client}', 'Admin\ClientsController@deleteClient');

  	/* Cases */
  	//Manage cases
  	Route::get('admin/cases/showcases/{company}', 'Admin\ClientCasesController@showCases')->name('adminclientcases');
  	//Route::get('/admin/cases/showallclientcases/{client}', 'Admin\ClientCasesController@showAllClientCases');
    //Add a new case
    Route::get('/admin/cases/addnewcase/{company}', 'Admin\ClientCasesController@addNewCase');
  	Route::post('/admin/cases/addcase/{company}', 'Admin\ClientCasesController@addCase');
    //Add a new case for a client
    Route::get('/admin/cases/addnewcase/{company}/{client}', 'Admin\ClientCasesController@addNewClientCase');
    Route::post('/admin/cases/addcase/{company}/{client}', 'Admin\ClientCasesController@addClientCase');
    //View case files
    Route::get('/admin/cases/files/showcasefiles/{case}/{company}/{client}', 
      'Admin\CaseFilesController@showCaseFiles')->name('admin.showcasefiles');

  	/*Court Dates and Times*/
  	//Route::get('admin/cases/courtdates', 'Admin\ClientCasesController@courtDates');

  	/* Template Categories*/
  	Route::get('admin/templates/showcategories/{company}', 'Admin\TemplatesController@showCategories')->name('admin.templatecategories');
  	Route::get('admin/templates/newcategory/{company}', 'Admin\TemplatesController@newCategory');
    Route::post('admin/templates/addnewcategory/{company}', 'Admin\TemplatesController@addNewCategory');
  	//Route::get('admin/templates/types/delete/{type}', 'Admin\TemplatesController@deleteTemplateType');

  	/* Templates*/
  	//Manage Template by categories
  	Route::get('admin/templates/category/showtemplates/{company}/{category}', 'Admin\TemplatesController@showTemplates')->name('admin.templates');
    Route::get('admin/templates/category/newtemplate/{company}/{category}', 'Admin\TemplatesController@newTemplate');
  	Route::post('admin/templates/category/addtemplate/{company}/{category}', 'Admin\TemplatesController@addTemplate');

  	//Route::get('admin/agreements/types/deleteagreementtype/{type}', 'Admin\AgreementTypesController@deleteAgreementType');

    //Company - Subscription
    //Route::get('admin/company/subscriptions', 'Admin\Company\SubscrptionController@showSubscriptions');

});

//Private Area - Super Admin Users. For Nahorr Analtytic Management of registered law firms
Route::group(['middleware' => ['auth', 'superadmin']], function () {

  //Manage Companies
  Route::get('/super/companies/showcompanies', 'SuperAdmin\CompaniesController@showCompanies')->name('companies');
  Route::get('/super/companies/delete/{company}', 'SuperAdmin\CompaniesController@deleteCompany');

  //Add New Company
    Route::get('/super/companies/newcompany', 'SuperAdmin\CompaniesController@newCompany')->name('NewCompany');
    Route::post('/super/companies/addnewcompany', 'SuperAdmin\CompaniesController@addNewCompany');


  //Home page when Super Admin is loged in 
  Route::get('/super/home', 'SuperAdmin\HomeController@index')->name('superhome');

  //Manage Users
  Route::get('/super/users/showusers', 'SuperAdmin\UsersController@showUsers')->name('All Users');
  Route::get('/super/users/delete/{user}', 'SuperAdmin\UsersController@deleteUser');

    //Add new user
    Route::get('/super/users/newuser', 'SuperAdmin\UsersController@newUser')->name('New User');
    Route::post('/super/users/addnewuser', 'SuperAdmin\UsersController@addNewUser');
  
  
});