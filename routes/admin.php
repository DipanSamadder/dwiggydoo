<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
 Route::get('login', 'Auth\AuthController@login');
 Route::get('/', 'HomeController@admin_dashboard')->middleware(['auth', 'verified', 'admin'])->name('backend.dashboard');

Route::get('/optimize', function() {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return "Cache is cleared";
})->name('clear.cache');

//Profile Users
Route::get('profiles', 'User\UsersController@profiles')->name('profiles.index');
Route::post('profiles/update', 'User\UsersController@profiles_update')->name('profiles.update');

//Media library
Route::get('media-library-admin', 'UploadsMediaController@media_library_admin')->name('media.library.admin');
Route::post('media-uploads', 'UploadsMediaController@uploads')->name('media.uploads');
Route::post('media-files_gets', 'UploadsMediaController@files_gets_admin')->name('media.gets.admin');
Route::post('media-files_gets_page_edit', 'UploadsMediaController@files_gets_page_edit_admin')->name('media.gets_page_edit.admin');
Route::post('media-destroy-file', 'UploadsMediaController@files_destroy_admin')->name('media.destroy.admin');
Route::post('media-files_gets_modals', 'UploadsMediaController@files_gets_admin_modals')->name('media.gets.admin_modals');
Route::post('media/update', 'UploadsMediaController@update')->name('media.update');
Route::post('media/edit', 'UploadsMediaController@edit')->name('media.edit');

 //Users
 Route::group(['middleware' => ['role_or_permission:Super-Admin|admin|show user']], function () {
    Route::get('users', 'User\UsersController@index')->name('users.index');
    Route::get('user/edit/{id}', 'User\UsersController@edit')->name('users.edit');
	Route::post('user/store', 'User\UsersController@store')->name('users.store');
	Route::post('get-all-users', 'User\UsersController@get_ajax_users')->name('ajax_users');
	Route::post('user/destory', 'User\UsersController@destory')->name('users.destory');
	Route::post('user/status', 'User\UsersController@status')->name('users.status');
	Route::post('user/update', 'User\UsersController@update')->name('users.update');
	Route::post('user/update', 'User\UsersController@update')->name('users.update');
	Route::post('user/show-permissions', 'User\UsersController@show_permissions')->name('users.show_permissions');
	Route::post('user/assign-permissions', 'User\UsersController@assign_permissions')->name('users.assign_permissions');
}); 




//Backend setting
Route::get('backend-setting', 'Setting\BusinessSettingsController@backend_setting')->name('backend.setting');
Route::get('frontend-setting', 'Setting\BusinessSettingsController@frontend_setting')->name('frontend.setting');
Route::get('backend-header', 'Setting\BusinessSettingsController@backend_header')->name('backend.header');
Route::get('backend-footer', 'Setting\BusinessSettingsController@backend_footer')->name('backend.footer');
Route::post('business-setting-update', 'Setting\BusinessSettingsController@update')->name('business.setting.update');



 //Roles
Route::group(['middleware' => ['role_or_permission:Super-Admin|admin|show roles']], function () {
	Route::resource('roles', 'Setting\RolesController');
	Route::post('get-all-roles', 'Setting\RolesController@get_ajax_roles')->name('ajax_roles');
	Route::post('role/destory', 'Setting\RolesController@destory')->name('role.destory');
	Route::get('role/edit/{id}', 'Setting\RolesController@edit')->name('role.edit');
	Route::post('role/update', 'Setting\RolesController@update')->name('role.update');
	Route::post('role/show-permissions', 'Setting\RolesController@show_permissions')->name('roles.show_permissions');
	Route::post('role/assign-permissions', 'Setting\RolesController@assign_permissions')->name('roles.assign_permissions');
}); 

 //Permissions
Route::group(['middleware' => ['role_or_permission:Super-Admin|admin|show permissions']], function () {
	Route::resource('permissions', 'Setting\PermissionsController');
	Route::post('get-all-permissions', 'Setting\PermissionsController@get_ajax_permissions')->name('ajax_permissions');
	Route::post('permissions/status', 'Setting\PermissionsController@status')->name('permission.status');

	Route::post('permissions/edit', 'Setting\PermissionsController@edit')->name('permission.edit');
	Route::post('permissions/store', 'Setting\PermissionsController@store')->name('permission.store');
	Route::post('permissions/destory', 'Setting\PermissionsController@destory')->name('permission.destory');
	Route::post('permissions/update', 'Setting\PermissionsController@update')->name('permission.update');
}); 
