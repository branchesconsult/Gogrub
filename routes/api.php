<?php

use App\Mail\ConfirmAcoountMail;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api\V1',
    'prefix' => 'v1', 'as' => 'v1.',
    'middleware' => ['sessions']], function () {
    //SEnd pass
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    //Testoing
// Route::get('send/mail',function()
// {
//     $name='111';
// Mail::to('mianhaseeb8848@gmail.com')->send(new ConfirmAcoountMail($name));
// });


    //Cousine
    Route::resource('cuisine', 'CuisineController', ['only' => ['index']]);
    // Page
    Route::group(['prefix' => 'pages'], function () {
        Route::get('{page_slug}', 'PagesController@show');
    });
    //Route::resource('pages', 'PagesController', ['only' => ['show']]);
    //Registration
    Route::post('register', 'RegisterController@register');
    //Rider App
      Route::group(['prefix'=>'rider','namespace'=>'Rider'],function(){
             Route::post('/register','RiderAuthController@register');
               Route::post('/login', 'RiderAuthController@login');

    Route::group(['middleware' => ['jwt.auth']], function () {
         Route::get('/current/notify/order','RiderOrderController@notifyOfOrder');
         Route::get('/profile','RiderAuthController@profile');
         Route::get('/orders/history','RiderOrderController@history');
         Route::post('/order/update/{orderId}/{userId}','RiderOrderController@setOrderStatus');
         Route::get('/current/order','RiderOrderController@currentOrder');
        
    });

        });
    Route::post('login', 'AuthController@login')->name('api.user.login');
    Route::group(['middleware' => ['jwt.auth']], function () {
        Route::get('refresh-user', function () {
            $user = \App\Models\Access\User\User::where('id', \Auth::id())->first();
            return response()->json([
                'user' => $user
            ]);
        });
        //Verify mobile number
        Route::any('phone-verify', 'AuthController@verifyMobile');
        Route::post('resend-verification-code', 'AuthController@resendVerificationCode');
        //Update phone request
        Route::post('phone-update', 'AuthController@updateNonVerifiedNum');
        //Routes for auths
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        // Password Reset Routes
        //Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
        // Route::post('password/reset', 'ResetPasswordController@reset')->name('password.reset');
        //Products
        Route::group(['middleware' => 'mobile.verify'], function () {
            //Products
            Route::resource('products', 'ProductController', ['only' => ['index', 'store', 'show']]);
            Route::post('products/{id}', 'ProductController@update');
            //Orders
            Route::resource('order', 'OrderController', ['only' => ['index', 'store', 'show', 'rateOrder']]);
            Route::post('order/rate', 'OrderController@rateOrder');
            Route::post('order/get-process-time', 'OrderController@getOrderProcessTime');
            //Notification
            Route::resource('notifications', 'NotificationController', ['only' => ['index']]);
            //Chats
            Route::resource('chat', 'ChatController', ['only' => ['index', 'store']]);
            Route::get('chat/order', 'ChatController@getOrderChat');
        });


        Route::group(['prefix' => 'chef', 'namespace' => 'Chef'], function () {
            Route::post('apply', 'ChefAuthController@storeRegistraton');
            Route::group(['middleware' => ['chef']], function () {
                //Orders
                Route::resource('orders', 'ChefOrderController', ['except' => ['update']]);
                Route::post('orders/{id}', 'ChefOrderController@update');
                //Earnings
                Route::get('earnings', 'ChefReportingController@getEarnings');
                //Products
                Route::resource('products', 'ChefProductController', ['only' =>
                    ['index', 'store', 'show', 'update', 'destroy']]);
                Route::post('products/{id}', 'ChefProductController@update');
                //Image
                Route::resource('images', 'ChefImageController');
            });
        });


        // Users
        //Route::resource('users', 'UsersController', ['except' => ['create', 'edit']]);
        Route::post('user/update', 'UsersController@update');
        //Route::post('users/delete-all', 'UsersController@deleteAll');
        //@todo need to change the route name and related changes
        //Route::get('deactivated-users', 'DeactivatedUsersController@index');
        //Route::get('deleted-users', 'DeletedUsersController@index');

        // Roles
        //Route::resource('roles', 'RolesController', ['except' => ['create', 'edit']]);
        //Route::post('roles/delete-all', 'RolesController@deleteAll');

        // Permission
        //Route::resource('permissions', 'PermissionController', ['except' => ['create', 'edit']]);

        // Faqs
        //Route::resource('faqs', 'FaqsController', ['except' => ['create', 'edit']]);

        // Blog Categories
        //Route::resource('blog_categories', 'BlogCategoriesController', ['except' => ['create', 'edit']]);

        // Blog Tags
        //Route::resource('blog_tags', 'BlogTagsController', ['except' => ['create', 'edit']]);

        // Blogs
        //Route::resource('blogs', 'BlogsController', ['except' => ['create', 'edit']]);
    });
});
