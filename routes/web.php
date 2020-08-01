<?php

use Illuminate\Support\Facades\Route;

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



/*-------------------------------------------------Authentication-----------------------------------------------------------------------*/

Route::get('admin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin', 'Auth\LoginController@login');
Route::any('admin/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/home', 'HomeController@index')->name('home');

/*------------------------------------------------------Admin---------------------------------------------------------------------------*/

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    //index
    /* Route::get('/index', function(){ return view('admin/pages/index');})->name('admin.index'); */

    //dashboard
    Route::get('/dashboard', function(){ return view('admin/pages/dashboard');})->name('admin.dashboard');

    //carousel
    Route::get('/pages/carousel', 'Admin\AdminPagesController@index')->name('admin.pages.index');

    //blog
    Route::get('/blog', 'Admin\AdminBlogController@index')->name('admin.blog.index');
    Route::get('/blogs', 'Admin\AdminBlogController@show')->name('admin.blog.show');
    Route::get('/blog/create', 'Admin\AdminBlogController@create')->name('admin.blog.create');
    Route::any('/blog/store', 'Admin\AdminBlogController@store')->name('admin.blog.store');
    Route::get('/blog/edit/{id}', 'Admin\AdminBlogController@edit')->name('admin.blog.edit');
    Route::any('/blog/update/{id}', 'Admin\AdminBlogController@update')->name('admin.blog.update');
    Route::any('/blog/delete/{id}', 'Admin\AdminBlogController@destroy')->name('admin.blog.delete');
    Route::post('/blog/change-publish-status/{id}/{status}', 'Admin\AdminBlogController@changePublishStatus')->where('status', '/^[01]$/')->name('admin.blog.status.publish');
    Route::post('/blog/change-trending-status/{id}/{status}', 'Admin\AdminBlogController@changeTrendingStatus')->where('status', '/^[01]$/')->name('admin.blog.status.trending');
    Route::post('/blog/change-main-status/{id}/{status}', 'Admin\AdminBlogController@changeMainStatus')->where('status', '/^[01]$/')->name('admin.blog.status.main');
    Route::get('/blog/find-blogs/{searchString}', 'Admin\AdminBlogController@findBlogs')->name('admin.blog.find.byTitle');

    //reviews
    Route::get('/reviews', 'Admin\AdminReviewsController@index')->name('admin.review.index');
    Route::get('/reviews/create', 'Admin\AdminReviewsController@create')->name('admin.review.create');
    Route::any('/reviews/store', 'Admin\AdminReviewsController@store')->name('admin.review.store');
    Route::get('/reviews/edit/{id}', 'Admin\AdminReviewsController@edit')->name('admin.review.edit');
    Route::any('/reviews/update/{id}', 'Admin\AdminReviewsController@update')->name('admin.review.update');
    Route::any('/reviews/delete/{id}', 'Admin\AdminReviewsController@destroy')->name('admin.review.destroy');
    Route::any('/reviews/change-carousel-status/{status}/{id}', 'Admin\AdminReviewsController@changeReviewCarouselStatus')->name('admin.review.carousel');
});

/*------------------------------------------------------Guest---------------------------------------------------------------------------*/

//guest home page
Route::get('/', 'IndexController@index')->name('index');

//about us
Route::get('/about-us', function () { return view('aboutUs'); });

//services
Route::prefix('/services')->group(function () {
    Route::get('', 'ServicesController@index')->name('services');
    Route::get('software-development-outsourcing-and-it-consulting', 'ConsultingController@index')->name('software-development-outsourcing-and-it-consulting');
    Route::get('custom-software-development', 'CustomDevelopementController@index')->name('custom-software-development');
    Route::get('mobile-app-development', 'MobileDevelopmentController@index')->name('mobile-app-development');
    Route::get('web-development-and-design', 'WebDevelopmentController@index')->name('web-development-and-design');
});

//solutions
Route::prefix('/solutions')->group(function () {
    Route::get('', 'SolutionsController@index')->name('solutions');
    Route::get('integration-software', 'ApiIntegrationController@index')->name('integration-software');
    Route::get('business-intelligence-solution-development', 'BiController@index')->name('business-intelligence-solution-development');
    Route::get('big-data-and-analytics-software-solution', 'BigDataController@index')->name('big-data-and-analytics-software-solution');
    Route::get('crm-solution-development', 'CrmController@index')->name('crm-solution-development');
    Route::get('ecommerce-solutions-development', 'ECommerceController@index')->name('ecommerce-solutions-development');
    Route::get('real-time-dashboards', 'RealTimeSolutionsController@index')->name('real-time-dashboards');
});

//company
Route::get('/company-why-us', 'CompanyController@index')->name('company.index');

//portfolio
Route::get('/portfolio', 'PortfolioController@index')->name('portfolio.index');

//privacy policy
Route::get('/privacy-policy', 'PrivacyPolicyController@index')->name('privacy-policy.index');

//processes
Route::get('/software-development-process', 'ProcessesController@index')->name('processes.index');

//industries
Route::get('/industries', 'IndustriesController@index')->name('industries.index');


//blog
Route::prefix('/blog')->group(function () {
    Route::get('/', 'BlogController@index')->name('blog.index');
    Route::get('/load', 'BlogController@load')->name('blog.load');
    Route::get('/{slug}', 'BlogController@show')->where('slug', '[A-Za-z0-9-]+')->name('blog.show');  //xangaruma load-in
});

//contactUs
Route::prefix('/contuctus')->group(function () {
    Route::get('', 'ContactUsController@index')->name('contactus.index');
    Route::any('/send', 'ContactUsController@store')->name('contactus.store');
    Route::any('/subscriber', 'ContactUsController@subscriber')->name('contactus.sunscriber');
});
