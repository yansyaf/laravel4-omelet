<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('layout');
});

// Confide routes
Route::get( 'user/create',                 'UserController@create');
Route::post('user',                        'UserController@store');
Route::get( 'user/login',                  'UserController@login');
Route::post('user/login',                  'UserController@do_login');
Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/forgot_password',        'UserController@forgot_password');
Route::post('user/forgot_password',        'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get( 'user/logout',                 'UserController@logout');

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
    # Admin Dashboard
    Route::get('/', function()
    {
    	$title = Lang::get('admin/users/title.user_management');
    	return View::make('admin/index');
    });

    # User Management
    Route::get('users/{user}/show', 'AdminUsersController@getShow');
    Route::get('users/{user}/edit', 'AdminUsersController@getEdit');
    Route::post('users/{user}/edit', 'AdminUsersController@postEdit');
    Route::get('users/{user}/delete', 'AdminUsersController@getDelete');
    Route::post('users/{user}/delete', 'AdminUsersController@postDelete');
    Route::controller('users', 'AdminUsersController');
});

Route::get('/start', function()
{
	/* create role */
	$userRole = new Role;
	$userRole->name = 'User';
	$userRole->save();

	$adminRole = new Role;
	$adminRole->name = 'Admin';
	$adminRole->save();

	/* create permission */
	$manageUsersPermission = new Permission;
	$manageUsersPermission->name = 'manage_users';
	$manageUsersPermission->display_name = 'Manage Users';
	$manageUsersPermission->save();
  
  	/* attach permission to role */
    $adminRole->attachPermission($manageUsersPermission);

	/* attach role to user */
	$user = User::where('username','=','admin')->first();
	$user->attachRole($adminRole);
 
    return 'Woohoo, now you ready to go!';
});