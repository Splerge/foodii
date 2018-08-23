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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*
 public function auth()
    {
        // Authentication Routes...
        $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        $this->post('login', 'Auth\LoginController@login');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'Auth\ResetPasswordController@reset');
    }

*/

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', 'Admin\AdminController@index')->name('admindashboard');


Route::get('/restaurantowner', 'RestaurantOwner\RestaurantOwnerController@index')->name('restaurantownerdashboard');


Route::get('/customer', 'Customer\CustomerController@index')->name('dashboard');	

Route::resource('/restaurantowner/restaurants', 'RestaurantOwner\RestaurantsController');
Route::resource('/customer/preferences', 'Customer\CustomerPreferencesController')->only([
    'index', 'update'
]);
