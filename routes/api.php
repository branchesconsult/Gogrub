<?php


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

Route::group(['namespace' => 'Api\V1', 'prefix' => 'v1', 'as' => 'v1.'], function () {
    // Page
    Route::group(['prefix' => 'pages'], function () {
        Route::get('{page_slug}', 'PagesController@show');
    });
    //Route::resource('pages', 'PagesController', ['only' => ['show']]);
    //Registration
    Route::post('register', 'RegisterController@register');
    Route::post('login', 'AuthController@login');
    Route::group(['middleware' => ['jwt.auth']], function () {
        //Verify mobile number
        Route::post('phone-verify', 'AuthController@verifyMobile');
        Route::post('resend-verification-code', 'AuthController@resendVerificationCode');
        //Update phone request
        Route::post('phone-update', 'AuthController@updateNonVerifiedNum');
        Route::group(['prefix' => 'auth'], function () {
            Route::post('logout', 'AuthController@logout');
            Route::post('refresh', 'AuthController@refresh');
            // Password Reset Routes
            Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
            // Route::post('password/reset', 'ResetPasswordController@reset')->name('password.reset');
        });
        //Products
        Route::group(['middleware' => 'mobile.verify'], function () {
            Route::resource('cuisine', 'CuisineController', ['only' => ['index']]);
            //Products
            Route::resource('products', 'ProductController', ['only' => ['index', 'store', 'show']]);
            Route::post('products/{id}', 'ProductController@update');
            //Orders
            Route::resource('order', 'OrderController', ['only' => ['index', 'store', 'show', 'rateOrder']]);
            Route::post('order/rate', 'OrderController@rateOrder');
            Route::resource('notifications', 'NotificationController', ['only' => ['index']]);
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
