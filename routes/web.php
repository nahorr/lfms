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
Route::get('/test', 'Controller@test')->name('test');

//Expired and Null Subscription pages
Route::get('/expired_subscription', 'Controller@expiredSubscription')->name('ExpiredSubscription');
Route::get('/no_subscription', 'Controller@noSubscription')->name('NoSubscription');

//Contact page
Route::get('/contactus', 'Controller@contactUs')->name('ContactUs');
Route::post('/postcontactus', 'Controller@postContactUs')->name('PostContactUs');

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
Route::group(['middleware' => ['auth','admin'] , 'namespace' => 'Admin'], function () { 

	//Admin Home page for the company
  	Route::get('admin/home', 'HomeController@index')->name('adminhome');

  	//Manage Company users
  	Route::get('admin/users/showusers/{company}', 'UsersController@showCompanyUsers')->name('companyusers');
  	Route::get('admin/users/delete/{user}', 'UsersController@deleteUser');

      //Add new user
      Route::get('/admin/users/newuser/{company}', 'UsersController@newUser')->name('NewCompanyUser');
      Route::post('/admin/users/addnewuser/{company}', 'UsersController@addNewUser');

      //Edit Company user
      Route::get('/admin/users/edituser/{company}/{user}', 'UsersController@editUser')->name('editCompanyUser');
      Route::post('/admin/users/update/{company}/{user}', 'UsersController@updateUser');

    	//Make Admin or User
    	//Route::post('admin/users/makeadmin/{user}', 'UsersController@makeAdmin');
    	//Route::post('admin/users/makeuser/{user}', 'UsersController@makeUser');

    	//Make Admin or make User
    	//Route::get('/admin/makeUser/{user}', 'UsersController@makeUser');
    	//Route::get('/admin/makeAdmin/{user}', 'UsersController@makeAdmin');

    //Manage Lawyers
    Route::get('/admin/lawyers/showlawyers/{company}', 'LawyersController@showCompanyLawyers')->name('companylawyers');
    Route::get('/admin/lawyers/delete/{lawyer}', 'LawyersController@deleteLawyer');
      
      //Add New Lawyers
      Route::get('/admin/lawyers/newlawyer/{company}', 'LawyersController@newLawyer')->name('NewCompanyLawyer');
      Route::post('/admin/lawyers/addnewlawyer/{company}', 'LawyersController@addNewLawyer');

      //Edit Lawyer
      Route::get('/admin/lawyers/editlawyer/{company}/{lawyer}', 'LawyersController@editLawyer')->name('EditCompanyLawyer');
      Route::post('/admin/lawyers/update/{company}/{lawyer}', 'LawyersController@updateLawyer');

  	//Manage clients
  	Route::get('admin/clients/showclients/{company}', 'ClientsController@showClients')->name('CompanyClients');
    Route::get('admin/clients/newclient/{company}', 'ClientsController@newClient')->name('newclient');
  	Route::post('admin/clients/addclient/{company}', 'ClientsController@addClient');
  	//Route::post('admin/clients/editclient/{client}', 'ClientsController@editClient');
  	Route::get('/admin/clients/delete/{client}', 'ClientsController@deleteClient');

  	/* Cases */
  	//Manage cases
  	Route::get('admin/cases/showcases/{company}', 'ClientCasesController@showCases')->name('adminclientcases');
    	//Route::get('/admin/cases/showallclientcases/{client}', 'ClientCasesController@showAllClientCases');

      //Add a new case
      Route::get('/admin/cases/addnewcase/{company}', 'ClientCasesController@addNewCase');
    	Route::post('/admin/cases/addcase/{company}', 'ClientCasesController@addCase');

      //Add a new case for a client
      Route::get('/admin/cases/addnewcase/{company}/{client}', 'ClientCasesController@addNewClientCase');
      Route::post('/admin/cases/addcase/{company}/{client}', 'ClientCasesController@addClientCase');

      //View case files
      Route::get('/admin/cases/files/showcasefiles/{case}/{company}/{client}', 
        'CaseFilesController@showCaseFiles')->name('admin.showcasefiles');

      /* Services - Manage Services */
      Route::group(['prefix' => '/admin/services', 'namespace' => 'Services', 'as' => 'admin.services.'], function () {

        //Show all company Services
        Route::get('showservices/{company}', 'ServicesController@showServices')->name('all');

        //Add a new Company Service
        Route::get('addnewservice/{company}', 'ServicesController@addNewService')->name('New Service Form');
        Route::post('addservice/{company}', 'ServicesController@addService');

        //Edit Company Service
        Route::get('editservice/{company}/{service}', 'ServicesController@editService')->name('edit service');
        Route::post('updateservice/{company}/{service}', 'ServicesController@updateService');

        //Delete Company Service
        Route::get('delete/{service}', 'ServicesController@deleteService');

        //Client Services
        Route::get('showclientservices/{company}/{service}', 'ClientServicesController@showClientServices')->name('clientservices');
        
        //Add a new Client Service
        Route::get('addclientservice/{company}/{service}', 'ClientServicesController@addClientService')->name('Client Service Form');
        Route::post('addnewclientservice/{company}/{service}', 'ClientServicesController@addNewClientService');
        //Edit, view, and delete Client Service
        Route::get('editclientservice/{company}/{service}/{clientservice}', 'ClientServicesController@editClientService')->name('edit.clientservice');
        Route::post('updateclientservice/{company}/{service}/{clientservice}', 'ClientServicesController@updateClientService')->name('update.clientservice');
        Route::get('viewclientservice/{company}/{service}/{clientservice}', 'ClientServicesController@viewClientService')->name('view.clientservice');
        Route::get('deleteclientservice/{clientservice}', 'ClientServicesController@delete')->name('delete.clientservice');
        Route::get('deleteclientservice/{clientservice}', 'ClientServicesController@delete')->name('delete.clientservice');
        

        //Client service files
        Route::get('files/showclientservicefiles/{clientservice}/{company}/{service}/{client}', 'ClientServiceFilesController@showClientServiceFiles')->name('showclientservicefiles');
        //Delete Files
        Route::get('deleteclientservicefile/{clientservice}/{filename}', 'ClientServiceFilesController@deleteFile')->name('delete.clientservicefile');
        
      });

    
  	/*Court Dates and Times*/
  	//Route::get('admin/cases/courtdates', 'ClientCasesController@courtDates');

  	/* Template Categories*/
  	Route::get('admin/templates/showcategories/{company}', 'TemplatesController@showCategories')->name('admin.templatecategories');
  	Route::get('admin/templates/newcategory/{company}', 'TemplatesController@newCategory');
    Route::post('admin/templates/addnewcategory/{company}', 'TemplatesController@addNewCategory');
  	//Route::get('admin/templates/types/delete/{type}', 'TemplatesController@deleteTemplateType');

  	/* Templates*/
  	//Manage Template by categories
  	Route::get('admin/templates/category/showtemplates/{company}/{category}', 'TemplatesController@showTemplates')->name('admin.templates');
    Route::get('admin/templates/category/newtemplate/{company}/{category}', 'TemplatesController@newTemplate');
  	Route::post('admin/templates/category/addtemplate/{company}/{category}', 'TemplatesController@addTemplate');

  	//Route::get('admin/agreements/types/deleteagreementtype/{type}', 'AgreementTypesController@deleteAgreementType');

    //Company - Subscription
    //Route::get('admin/company/subscriptions', 'Company\SubscrptionController@showSubscriptions');

});

//Private Area - Super Admin Users. For Nahorr Analtytic Management of registered law firms
Route::group(['middleware' => ['auth', 'superadmin']], function () {

  //Home page when Super Admin is loged in 
  Route::get('/super/home', 'SuperAdmin\HomeController@index')->name('superhome');

  //Manage Companies
  Route::get('/super/companies/showcompanies', 'SuperAdmin\CompaniesController@showCompanies')->name('companies');
  Route::get('/super/companies/detail/{company}', 'SuperAdmin\CompaniesController@companyDetail')->name('super.company.detail');
  
    //Add New Company
    Route::get('/super/companies/newcompany', 'SuperAdmin\CompaniesController@newCompany')->name('NewCompany');
    Route::post('/super/companies/addnewcompany', 'SuperAdmin\CompaniesController@addNewCompany');

    //Edit Company
    Route::get('/super/companies/editcompany/{company}', 'SuperAdmin\CompaniesController@editCompany')->name('editCompany');
    Route::post('/super/companies/update/{company}', 'SuperAdmin\CompaniesController@updateCompany');
    
    //Delete and UnDelete Company
    Route::get('/super/companies/delete/{company}', 'SuperAdmin\CompaniesController@deleteCompany');
    Route::get('/super/companies/undelete/{company}', 'SuperAdmin\CompaniesController@unDeleteCompany');

  //Manage Users
  Route::get('/super/users/showusers', 'SuperAdmin\UsersController@showUsers')->name('All Users');
  
    //Add new user
    Route::get('/super/users/newuser', 'SuperAdmin\UsersController@newUser')->name('New User');
    Route::post('/super/users/addnewuser', 'SuperAdmin\UsersController@addNewUser');

    //Edit Users
    Route::get('/super/users/edituser/{user}', 'SuperAdmin\UsersController@editUser')->name('super.edit.user');
    Route::post('/super/users/update/{user}', 'SuperAdmin\UsersController@updateUser');

    //Delete and undelete users
    Route::get('/super/users/delete/{user}', 'SuperAdmin\UsersController@deleteUser');
    Route::get('/super/users/undelete/{user}', 'SuperAdmin\UsersController@unDeleteUser');

  //Manage Payments and Subscriptions
  Route::get('/super/subscriptions/showsubscriptions', 'SuperAdmin\SubscriptionsController@showSubscriptions')->name('super.subscriptions');

    //Add new manual subscription
    Route::get('/super/subscriptions/newsubscription', 'SuperAdmin\SubscriptionsController@newSubscription')->name('super.newsubscription');
    Route::post('/super/subscriptions/addnewsubscription', 'SuperAdmin\SubscriptionsController@addNewSubscription');

    //Edit Subcription
    Route::get('/super/subscriptions/editsubscription/{subscription}', 'SuperAdmin\SubscriptionsController@editSubscription')->name('super.edit.subscription');
    Route::post('/super/subscriptions/update/{subscription}', 'SuperAdmin\SubscriptionsController@updateSubscription');
  
});