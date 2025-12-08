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

//============================== Frontend routes ===========================

Route::get('/', 'web\MasterController@home')->name('index');
Route::get('about', 'web\MasterController@about')->name('about');

Route::get('contact/', 'web\MasterController@contact')->name('contact');
Route::post('contact/', 'web\MasterController@contact_store')->name('contact.store');

Route::post('newsletter', 'web\MasterController@newsletter_store');

Route::get('services/', 'web\MasterController@services')->name('services');
Route::get('services/{short_url}', 'web\MasterController@service')->name('serviceDetail');

Route::post('loadMoreFooterService', 'web\MasterController@loadMoreFooterService');
Route::post('service/enquiry', 'web\MasterController@serviceEnquiry');
Route::get('product-category/{short_url}', 'web\MasterController@productCategory');
Route::get('product-brand/{short_url}', 'web\MasterController@productBrand')->name('productBrand');

Route::get('products', 'web\MasterController@products')->name('products');
Route::get('shop/{category}/{short_url}', 'web\MasterController@product')->name('productDetail');//product detail

Route::post('loadMoreProducts', 'web\MasterController@loadMoreProducts');


Route::post('product/enquiry', 'web\MasterController@productEnquiry');
Route::post('product-search', 'web\MasterController@productSearch');
Route::post('filter-product', 'web\MasterController@productFilter');
Route::get('blogs', 'web\MasterController@blogs')->name('blogs');

Route::post('loadMoreBlogs', 'web\MasterController@loadMoreBlogs');
//Route::get('blog/{short_url}', function ($short_url) {
//    return redirect()->route('blogDetail', [$short_url]);
//});

///*** route redirect for seo purposes form old site ***/
//Route::get('/how-to-increase-your-air-after-cooler-efficiency-2', function () {
//    return redirect('/how-to-increase-your-air-after-cooler-efficiency');
//});
Route::get('/{short_url}', 'web\MasterController@blog_detail')
    ->where('short_url', '^(?!admin).*$')
    ->name('blogDetail');

//============================== app routes ===========================

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'app\auth\LoginController@showLoginForm')->middleware('guest');
    Route::post('/', 'app\auth\LoginController@login');
    Route::post('forgot-password', 'app\auth\LoginController@forgot_password');
    Route::get('reset-password/{token}', 'app\auth\LoginController@reset_password');
    Route::post('reset-password', 'app\auth\LoginController@reset_password_store');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('dashboard', 'app\HomeController@dashboard');
    Route::post('sort_order/', 'app\HomeController@sort_order');
    Route::post('home/status_change', 'app\HomeController@status_change');
    Route::post('home/toggle_state', 'app\HomeController@toggle_state');

    /************************** Admin starts *****************************/

    Route::get('admin', 'app\AdminController@list');
    Route::get('admin/create', 'app\AdminController@create');
    Route::post('admin/create', 'app\AdminController@store');
    Route::get('admin/edit/{id}', 'app\AdminController@edit');
    Route::get('admin/view/{id}', 'app\AdminController@view');
    Route::post('admin/edit/{id}', 'app\AdminController@update');
    Route::post('admin/delete_admin/', 'app\AdminController@delete_admin');
    Route::get('admin/reset_password/{id}', 'app\AdminController@reset_password');
    Route::post('admin/reset_password/{id}', 'app\AdminController@reset_password_store');

    /************************** Admin ends ********************************/

    /***************************** Site Information ***********************/

    Route::get('site/content/', 'app\SiteController@site_content');
    Route::post('site/content/', 'app\SiteController@site_content_store');
    Route::post('site/delete/', 'app\SiteController@site_content_image_delete');

    Route::get('site/contact/', 'app\SiteController@contact_content_list');
    Route::get('site/contact/create', 'app\SiteController@contact_content_create');
    Route::post('site/contact/create', 'app\SiteController@contact_content_store');
    Route::get('site/contact/edit/{id}', 'app\SiteController@contact_content_edit');
    Route::post('site/contact/edit/{id}', 'app\SiteController@contact_content_update');
    Route::get('site/contact/view/{id}', 'app\SiteController@contact_content_view');
    Route::post('site/contact/delete/', 'app\SiteController@delete_contact_content');

    Route::get('site/contact_content/', 'app\SiteController@contact_content');
    Route::post('site/contact_content/', 'app\SiteController@contact_content_store');

    Route::post('home/delete_multi_newsletter/', 'app\HomeController@delete_multi_newsletter');
    Route::get('newsletter/', 'app\HomeController@newsletter');
    Route::post('home/delete_newsletter/', 'app\HomeController@delete_newsletter');

    /*************************** Site Information *************************/

    /************************ Contact Enquiry start *********************************/

    Route::get('contact_enquiry/', 'app\HomeController@contact_enquiry_list');
    Route::get('contact_enquiry/view/{id}', 'app\HomeController@contact_enquiry_view');
    Route::post('contact_enquiry/reply/', 'app\HomeController@reply_to_contact_enquiry');
    Route::post('contact_enquiry/delete/', 'app\HomeController@delete_contact_enquiry');
    Route::post('contact_enquiry/delete_multiple/', 'app\HomeController@delete_multiple_contact_enquiry');

    /************************ Contact Enquiry ends *********************************/

    /************************** Home starts *******************************/

    Route::get('home/slider/', 'app\HomeController@slider_list');
    Route::get('home/slider/create', 'app\HomeController@slider_create');
    Route::post('home/slider/create', 'app\HomeController@slider_store');
    Route::get('home/slider/edit/{id}', 'app\HomeController@slider_edit');
    Route::get('home/slider/view/{id}', 'app\HomeController@slider_view');
    Route::post('home/slider/edit/{id}', 'app\HomeController@slider_update');
    Route::post('home/delete_slider/', 'app\HomeController@delete_slider');

    Route::get('home/about/', 'app\HomeController@home_about');
    Route::post('home/about/', 'app\HomeController@home_about_store');
    Route::post('home-about/delete/', 'app\HomeController@home_about_image_delete');

    Route::get('home/highlight/', 'app\HomeController@home_highlight');
    Route::post('home/highlight/', 'app\HomeController@home_highlight_store');

    /************************ Home ends ************************************/

    /************************ About starts ************************************/

    Route::get('about/about_us', 'app\AboutController@about');
    Route::post('about/about_us', 'app\AboutController@about_store');
    Route::post('about/about_us/delete/', 'app\AboutController@about_image_delete');

    Route::get('about/why_choose_us/list', 'app\AboutController@why_choose_us_list');
    Route::get('about/why_choose_us/create', 'app\AboutController@why_choose_us_create');
    Route::post('about/why_choose_us/create', 'app\AboutController@why_choose_us_store');
    Route::get('about/why_choose_us/edit/{id}', 'app\AboutController@why_choose_us_edit');
    Route::post('about/why_choose_us/edit/{id}', 'app\AboutController@why_choose_us_update');
    Route::get('about/why_choose_us/view/{id}', 'app\AboutController@why_choose_us_view');
    Route::post('about/delete_why_choose_us/', 'app\AboutController@delete_why_choose_us');

    Route::get('about/our_brand/our_brand', 'app\AboutController@our_brand');
    Route::post('about/our_brand/our_brand', 'app\AboutController@our_brand_store');
    Route::post('about/our_brand/our_brand/delete/', 'app\AboutController@our_brand_image_delete');

    Route::get('about/our_brand/brand_highlight/list', 'app\AboutController@brand_highlight_list');
    Route::get('about/our_brand/brand_highlight/create', 'app\AboutController@brand_highlight_create');
    Route::post('about/our_brand/brand_highlight/create', 'app\AboutController@brand_highlight_store');
    Route::get('about/our_brand/brand_highlight/edit/{id}', 'app\AboutController@brand_highlight_edit');
    Route::post('about/our_brand/brand_highlight/edit/{id}', 'app\AboutController@brand_highlight_update');
    Route::get('about/our_brand/brand_highlight/view/{id}', 'app\AboutController@brand_highlight_view');
    Route::post('about/our_brand/delete_brand_highlight/', 'app\AboutController@delete_brand_highlight');

    /************************ About ends ************************************/

    /************************ Blog starts ************************************/

    Route::get('blog/', 'app\BlogController@blog_list');
    Route::get('blog/create', 'app\BlogController@blog_create');
    Route::post('blog/create', 'app\BlogController@blog_store');
    Route::get('blog/edit/{id}', 'app\BlogController@blog_edit');
    Route::post('blog/edit/{id}', 'app\BlogController@blog_update');
    Route::get('blog/view/{id}', 'app\BlogController@blog_view');
    Route::post('blog/delete_blog/', 'app\BlogController@delete_blog');
    Route::post('blog/delete/', 'app\BlogController@blog_image_delete');

    /************************ Blog ends ************************************/

    /************************ Client starts ************************************/

    Route::get('client/', 'app\ClientController@client_list');
    Route::get('client/create/', 'app\ClientController@client_create');
    Route::post('client/create/', 'app\ClientController@client_store');
    Route::get('client/edit/{id}', 'app\ClientController@client_edit');
    Route::post('client/edit/{id}', 'app\ClientController@client_update');
    Route::get('client/view/{id}', 'app\ClientController@client_view');
    Route::post('client/delete/', 'app\ClientController@delete_client');

    /************************ Client ends *************************************/

    /************************ Service starts ************************************/
    Route::group(['prefix' => 'service'], function () {
        Route::get('/', 'app\ServiceController@service');
        Route::get('create/', 'app\ServiceController@service_create');
        Route::post('create/', 'app\ServiceController@service_store');
        Route::get('edit/{id}', 'app\ServiceController@service_edit');
        Route::post('edit/{id}', 'app\ServiceController@service_update');
        Route::get('view/{id}', 'app\ServiceController@service_view');
        Route::post('delete/', 'app\ServiceController@delete_service');
        Route::post('delete-file/', 'app\ServiceController@delete_service_file');
        /************************ Service ends *************************************/

        /************************ Service gallery starts ************************************/
        Route::group(['prefix' => 'gallery'], function () {
            Route::get('{service_id}', 'app\ServiceController@gallery');
            Route::get('create/{service_id}', 'app\ServiceController@gallery_create');
            Route::post('create/{service_id}', 'app\ServiceController@gallery_store');
            Route::get('edit/{id}', 'app\ServiceController@gallery_edit');
            Route::post('edit/{id}', 'app\ServiceController@gallery_update');
            Route::get('view/{id}', 'app\ServiceController@gallery_view');
            Route::post('delete/', 'app\ServiceController@delete_gallery');
        });
        /************************ Service gallery ends *************************************/

        /************************ Service Enquiry start *********************************/
        Route::group(['prefix' => 'enquiry'], function () {
            Route::get('/', 'app\ServiceController@service_enquiry_list');
            Route::get('view/{id}', 'app\ServiceController@service_enquiry_view');
            Route::post('reply/', 'app\ServiceController@reply_to_service_enquiry');
            Route::post('delete/', 'app\ServiceController@delete_service_enquiry');
            Route::post('delete_multiple/', 'app\ServiceController@delete_multiple_service_enquiry');
        });
        /************************ Service Enquiry ends *********************************/
    });

    /************************ Product starts ************************************/
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'app\ProductController@product');
        Route::get('create/', 'app\ProductController@product_create');
        Route::post('create/', 'app\ProductController@product_store');
        Route::get('edit/{id}', 'app\ProductController@product_edit');
        Route::post('edit/{id}', 'app\ProductController@product_update');
        Route::get('view/{id}', 'app\ProductController@product_view');
        Route::post('delete/', 'app\ProductController@product_delete');
        Route::post('delete-file/', 'app\ProductController@delete_product_file');

        /************************ Product ends *************************************/

        /************************ Product Category starts ************************************/

        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'app\ProductController@category');
            Route::get('create/', 'app\ProductController@category_create');
            Route::post('create/', 'app\ProductController@category_store');
            Route::get('edit/{id}', 'app\ProductController@category_edit');
            Route::post('edit/{id}', 'app\ProductController@category_update');
            Route::get('view/{id}', 'app\ProductController@category_view');
            Route::post('delete/', 'app\ProductController@delete_category');
        });

        /************************ Product Category ends *************************************/

        /************************ Product Brand starts ************************************/
        Route::group(['prefix' => 'brand'], function () {
            Route::get('/', 'app\ProductController@brand');
            Route::get('create/', 'app\ProductController@brand_create');
            Route::post('create/', 'app\ProductController@brand_store');
            Route::get('edit/{id}', 'app\ProductController@brand_edit');
            Route::post('edit/{id}', 'app\ProductController@brand_update');
            Route::get('view/{id}', 'app\ProductController@brand_view');
            Route::post('delete/', 'app\ProductController@delete_brand');
        });
        /************************ Product Brand ends *************************************/

        /************************ Product Enquiry start *********************************/
        Route::group(['prefix' => 'enquiry'], function () {
            Route::get('/', 'app\ProductController@product_enquiry_list');
            Route::get('view/{id}', 'app\ProductController@product_enquiry_view');
            Route::post('reply/', 'app\ProductController@reply_to_product_enquiry');
            Route::post('delete/', 'app\ProductController@delete_product_enquiry');
            Route::post('delete_multiple/', 'app\ProductController@delete_multiple_product_enquiry');
        });
        /************************ Product Enquiry ends *********************************/

        /************************ Product feature starts ************************************/
        Route::group(['prefix' => 'feature'], function () {
            Route::get('/{product_id}', 'app\ProductController@feature');
            Route::get('create/{product_id}', 'app\ProductController@feature_create');
            Route::post('create/{product_id}', 'app\ProductController@feature_store');
            Route::get('edit/{id}', 'app\ProductController@feature_edit');
            Route::post('edit/{id}', 'app\ProductController@feature_update');
            Route::get('view/{id}', 'app\ProductController@feature_view');
            Route::post('delete/', 'app\ProductController@delete_feature');
        });
        /************************ Product feature ends *************************************/

        /************************ Product image starts ************************************/

        Route::group(['prefix' => 'image'], function () {
            Route::get('/{product_id}', 'app\ProductController@image');
            Route::get('create/{product_id}', 'app\ProductController@image_create');
            Route::post('create/{product_id}', 'app\ProductController@image_store');
            Route::get('edit/{id}', 'app\ProductController@image_edit');
            Route::post('edit/{id}', 'app\ProductController@image_update');
            Route::get('view/{id}', 'app\ProductController@image_view');
            Route::post('delete/', 'app\ProductController@delete_image');
        });
        /************************ Product image ends *************************************/

        /************************ Product gallery starts ************************************/
        Route::group(['prefix' => 'gallery'], function () {
            Route::get('/{product_id}', 'app\ProductController@gallery');
            Route::get('create/{product_id}', 'app\ProductController@gallery_create');
            Route::post('create/{product_id}', 'app\ProductController@gallery_store');
            Route::get('edit/{id}', 'app\ProductController@gallery_edit');
            Route::post('edit/{id}', 'app\ProductController@gallery_update');
            Route::get('view/{id}', 'app\ProductController@gallery_view');
            Route::post('delete/', 'app\ProductController@delete_gallery');
        });
        /************************ Product gallery ends *************************************/

    });
    /***************************** Meta Tags Starts ***********************************/

    Route::get('meta_data/{type}/', 'app\HomeController@meta_data');
    Route::post('meta_data/{type}/', 'app\HomeController@meta_data_store');

    Route::get('other_meta_data/', 'app\HomeController@other_meta_data');
    Route::post('other_meta_data/', 'app\HomeController@other_meta_data_store');

    /*************************** Meta Tags Ends **************************************/

    Route::get('logout', 'app\auth\LoginController@logout');
});
