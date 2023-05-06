<?php

use App\Http\Controllers\PayPalController;

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
Route::get('/logout', [
    'uses' => '\App\Http\Controllers\Auth\LoginController@logout'
]);

  // Route::post('/verify-2fa',[
  //   'as' => 'verify-2fa',
  //   'uses' => '\App\Http\Controllers\Profile\ProfileController@verify'
  // ]);

	// Route::post('/activate-2fa',[
	// 	'uses' => '\App\Http\Controllers\Profile\ProfileController@activate',
	// 	'as' => 'activate-2fa'
	// ]);

	// Route::post('/enable-2fa',[
	// 	'uses' => '\App\Http\Controllers\Profile\ProfileController@enable',
	// 	'as' => 'enable-2fa'
	// ]);

	// Route::post('/disable-2fa',[
	// 	'uses' => '\App\Http\Controllers\Profile\ProfileController@disable',
	// 	'as' => 'disable-2fa'
	// ]);

	// Route::get('/2fa/instruction',[
	// 	'uses' => '\App\Http\Controllers\Profile\ProfileController@instruction',
	// ]);


	Route::get('/dashboard',[
		'as'=> 'dashboard',
		'uses'=> '\App\Http\Controllers\Dashboard\DashboardController@index',
	])->middleware('auth');

  Route::get('/',[
		'as'=> 'home',
		'uses'=> '\App\Http\Controllers\AppointmentController@index',
	])->middleware('auth');

  /*
  | Stripe Subscription Routes
  */
	// Route::get('/subscription',[
	// 	'as'=> '/subscription',
	// 	'uses'=> '\App\Http\Controllers\SubscriptionController@index',
	// ]);

	// Route::get('/subscription/subscribe',[
	// 	'as'=> '/subscription/subscribe',
	// 	'uses'=> '\App\Http\Controllers\SubscriptionController@notSubscribed',
	// ]);

	// Route::get('/subscription/stripe/{plan_id}',[
	// 	'as'=> '/subscription/stripe',
	// 	'uses'=> '\App\Http\Controllers\SubscriptionController@stripeCheckout',
	// ]);

	// Route::post('/subscription/stripe/subscribe',[
	// 	'as'=> '/subscription/stripe/subscribe',
	// 	'uses'=> '\App\Http\Controllers\SubscriptionController@stripeSubscribe',
	// ]);

  // Route::get('/subscription-invoice/{invoiceId}',[
  //   'uses' => '\App\Http\Controllers\SubscriptionController@stripeInvoice',
  // ]);

  // Route::get('/subscription-cancel/{subscriptionId}',[
  //   'uses' => '\App\Http\Controllers\SubscriptionController@cancelSubscription',
  // ]);
	/*
	| Stripe Subscription Routes
	*/

  /*
  | Premium Content Routes
  */
  // Route::resource('/premium-content', '\App\Http\Controllers\PremiumContent\PremiumContentController')
  // ->middleware('premium');
  /*
  | Premium Content Routes
  */

	/*
	|  Activitylog Route
	*/
	Route::resource('activity-log', '\App\Http\Controllers\Activitylog\ActivitylogController');
  /*
  |  Activitylog Route
  */


	/*
	| Profile Routes
	*/

  Route::resource('profile', '\App\Http\Controllers\Profile\ProfileController');

	Route::get('update-avatar/{id}',[
		'as' => 'update-avatar',
		'uses'=> '\App\Http\Controllers\Profile\ProfileController@showAvatar'
	]);

	Route::post('update-avatar/{id}', '\App\Http\Controllers\Profile\ProfileController@updateAvatar');

	Route::post('update-profile-login/{id}',[
		'uses'=> '\App\Http\Controllers\Profile\ProfileController@updateLogin',
		'as' => 'update-login',
	]);

/*
| Profile Routes
*/

// Socialite Authentication Route
Route::get('login/{provider}', '\App\Http\Controllers\Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', '\App\Http\Controllers\Auth\LoginController@handleProviderCallback');

#####################################ADMIN MANAGED SECTION##########################################


// Appointments Route

  Route::resource('appointment', '\App\Http\Controllers\AppointmentController');
  
  Route::post('/updateAppointmentDate/{id}', '\App\Http\Controllers\AppointmentController@updateAppointmentDate')->name('updateAppointmentDate');
  Route::post('/updateCollectedDate/{id}', '\App\Http\Controllers\AppointmentController@updateCollectedDate')->name('updateCollectedDate');
  Route::post('/updateReportedDate/{id}', '\App\Http\Controllers\AppointmentController@updateReportedDate')->name('updateReportedDate');
  Route::post('/updateTestResult/{id}', '\App\Http\Controllers\AppointmentController@updateTestResult')->name('updateTestResult');
  
  
  Route::get('/export_csv', '\App\Http\Controllers\AppointmentController@export_csv')->name('export_csv');
  Route::post('/store_walkin', '\App\Http\Controllers\AppointmentController@store_walkin')->name('store_walkin');

  Route::post('/setTestResult', [
    'as' => 'setTestResult',
    'uses' => '\App\Http\Controllers\AppointmentController@setTestResult'
  ]);

  Route::post('/saveTemporaryCollectedTime', [
    'as' => 'saveTemporaryCollectedTime',
    'uses' => '\App\Http\Controllers\AppointmentController@saveTemporaryCollectedTime'
  ]);
  

  Route::post('/resendPdf', [
    'as' => 'resendPdf',
    'uses' => '\App\Http\Controllers\AppointmentController@resendPdf'
  ]);

// Users Route
	Route::resource('user', '\App\Http\Controllers\UserController');
  Route::post('/get-customer-info', '\App\Http\Controllers\UserController@getCustomerInfo')->name('getCustomerInfo');

	Route::post('update-user-login/{id}',[
    'as' => 'user-login',
	'uses'=> '\App\Http\Controllers\UserController@userLogin']);

	Route::get('user/{id}/activity-log/',[
    'as' => 'user-activitylog',
	'uses'=> '\App\Http\Controllers\UserController@userActivityLog']);
// Users Route

// Test Types Route
  Route::group(['middleware' => ['admin']], function () {
    Route::resource('test', '\App\Http\Controllers\TestController');
  });

  Route::group(['middleware' => ['admin']], function () {
    Route::resource('pdf_template', '\App\Http\Controllers\TemplateController');
  });

 Route::post('/pdf_template/preview', '\App\Http\Controllers\TemplateController@preview')->name('pdf_template/preview');
  
  
 Route::get('/testtype/show/{id}', '\App\Http\Controllers\TestController@show')->name('testtype/show');
 Route::get('/pdf-test', '\App\Http\Controllers\AppointmentController@pdf')->name('pdf-test');
 Route::get('/pdf-export', '\App\Http\Controllers\AppointmentController@pdfExport')->name('pdf-export');

 Route::get('/email_send', '\App\Http\Controllers\AppointmentController@email_send')->name('email_send');

 Route::get('/email_view', '\App\Http\Controllers\AppointmentController@email_view')->name('email_view');
 Route::get('/remove_old_appointments', '\App\Http\Controllers\AppointmentController@remove_old_appointments')->name('remove_old_appointments');

 Route::get('/covid-inform', '\App\Http\Controllers\AppointmentController@covid_inform')->name('covid_inform');
 Route::get('/refund-policy', '\App\Http\Controllers\AppointmentController@refund_policy')->name('refund_policy');
 Route::get('/terms-conditions', '\App\Http\Controllers\AppointmentController@terms_conditions')->name('terms_conditions');
 
 Route::post('/contact_mailsend', '\App\Http\Controllers\AppointmentController@contact_mailsend')->name('contact_mailsend');
 

// Test Types Route

// Roles Route
	Route::resource('role', '\App\Http\Controllers\Role\RoleController');
	Route::post('/role-permission/{id}',[
		'as' => 'roles_permit',
		'uses' => '\App\Http\Controllers\Role\RoleController@assignPermission',
	]);
// Roles Route


// Permission Route
	Route::resource('permission', '\App\Http\Controllers\Permission\PermissionController');
  // Permission Route


// Payment Gateway Route
          // Route::get('/subscription/plan',[
          //     'as' => '/subscription/plan',
          //     'uses' => '\App\Http\Controllers\PaymentGateway\PaymentGatewayController@viewStripePlans',
          // ]);

          // Route::get('/subscription/plan/create',[
          //     'as' => '/subscription/plan/create',
          //     'uses' => '\App\Http\Controllers\PaymentGateway\PaymentGatewayController@createStripePlan',
          // ]);

          // Route::post('/subscription/plan/create',[
          //     'uses' => '\App\Http\Controllers\PaymentGateway\PaymentGatewayController@storeStripePlan',
          // ]);

          // Route::get('/stripe/plan/edit/{plan_id}',[
          //     'as' => '/stripe/plan/edit',
          //     'uses' => '\App\Http\Controllers\PaymentGateway\PaymentGatewayController@editStripePlan',
          // ]);

          // Route::post('/stripe/plan/edit/{id}/{plan_id}',[
          //     'uses' => '\App\Http\Controllers\PaymentGateway\PaymentGatewayController@updateStripePlan',
          // ]);

          // Route::post('/stripe/plan/delete/{id}',[
          //   'as' => '/stripe/plan/delete',
          //   'uses' => '\App\Http\Controllers\PaymentGateway\PaymentGatewayController@deleteStripePlan',
          // ]);

          // Route::get('/subscribed-users',[
          //   'uses' => '\App\Http\Controllers\PaymentGateway\PaymentGatewayController@manageSubscribedUser',
          // ]);

          // Route::get('/user-subscription-invoice/{invoiceId}',[
          //   'uses' => '\App\Http\Controllers\PaymentGateway\PaymentGatewayController@subscriptionInvoice',
          // ]);

          // Route::get('/user-subscription-cancel/{subscription_id}',[
          //   'uses' => '\App\Http\Controllers\PaymentGateway\PaymentGatewayController@cancelSub',
          // ]);

          // Route::get('/subscription-income',[
          //   'uses' => '\App\Http\Controllers\PaymentGateway\PaymentGatewayController@manageIncome',
          // ]);

          // Route::get('/checkout-sample',[
          //   'uses' => '\App\Http\Controllers\PaymentGateway\PaymentGatewayController@checkoutSamples',
          // ]);

          // Route::get('/checkout-sample/article',[
          //   'uses' => '\App\Http\Controllers\PaymentGateway\PaymentGatewayController@download',
          // ]);

          // Route::get('/checkout-sample/response/{session_id}',[
          //   'uses' => '\App\Http\Controllers\PaymentGateway\PaymentGatewayController@responseCheckout',
          //   'as' => '/checkout-sample/response'
          // ]);

// Payment Gateway Route
        Route::group(['middleware' => ['admin']], function () {
          Route::resource('settings','\App\Http\Controllers\Settings\SettingsController');

          Route::post('settings/app-name/update',[
            'as' => 'settings/app-name/update',
            'uses' => '\App\Http\Controllers\Settings\SettingsController@appNameUpdate',
          ]);
          Route::post('settings/app-logo/update',[
            'as' => 'settings/app-logo/update',
            'uses' => '\App\Http\Controllers\Settings\SettingsController@appLogoUpdate',
          ]);
  
          Route::post('settings/app-theme/update',[
            'as' => 'settings/app-theme/update',
            'uses' => '\App\Http\Controllers\Settings\SettingsController@appThemeUpdate',
          ]);
  
          Route::post('settings/stripe-payment/update',[
            'as' => 'settings/stripe-payment/update',
            'uses' => '\App\Http\Controllers\Settings\SettingsController@stripePaymentUpdate',
          ]);
  
          Route::post('settings/default-location/update',[
            'as' => 'settings/default-location/update',
            'uses' => '\App\Http\Controllers\Settings\SettingsController@defaultLocationUpdate',
          ]);
  
          Route::post('settings/time-slot/update',[
            'as' => 'settings/time-slot/update',
            'uses' => '\App\Http\Controllers\Settings\SettingsController@timeSlotUpdate',
          ]);
  
          Route::post('settings/auth-settings/update',[
            'as' => 'settings/auth-settings/update',
            'uses' => '\App\Http\Controllers\Settings\SettingsController@authSettingsUpdate',
          ]);
        });

        // Premium Content
        Route::resource('/article', '\App\Http\Controllers\Article\ArticleController');
        Route::post('/article-image', '\App\Http\Controllers\Article\ArticleController@articleImageUpload');
        Route::resource('/category-article', '\App\Http\Controllers\Article\ArticleCategoryController');
#####################################ADMIN MANAGED SECTION##########################################

#####################################CRUD GENERATOR ROUTES##########################################
      // Route::get('/crud-builder', [
      //   'as' => 'crud-builder',
      //   'uses' => '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder'
      // ])->middleware('auth','web','role:admin','2fa');

      // Route::get('/field-template',[
      //   'as' => 'field-template',
      //   'uses' => '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate'
      // ])->middleware('auth','web','role:admin','2fa');

      // Route::post('/generator-builder/generate', [
      //   'as' => 'generator-builder/generate',
      //   'uses' => '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate'
      // ])->middleware('auth','web','role:admin','2fa');

      // Route::post('/generator-builder/rollback', [
      //   'as' => 'generator-builder/rollback',
      //   'uses' => '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback'
      // ])->middleware('auth','web','role:admin','2fa');

      // Route::post('/model-check', [
      //   'as' => 'model-check',
      //   'uses' => '\App\Http\Controllers\CRUDController@checkModel'
      // ]);

#####################################CRUD GENERATOR ROUTES##########################################

// ================ Remove This After Finishing ================== //



// Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
// Route::get('process-transaction', [\App\Http\Controllers\AppointmentController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction/{id}', [\App\Http\Controllers\AppointmentController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [\App\Http\Controllers\AppointmentController::class, 'cancelTransaction'])->name('cancelTransaction');


/////////////////////////////////////////////////////////////


#####################################WEBHOOK ROUTE##########################################
Route::stripeWebhooks('stripe-webhook');
#####################################WEBHOOK ROUTE##########################################

Route::impersonate();
Auth::routes(['verify' => true]);
