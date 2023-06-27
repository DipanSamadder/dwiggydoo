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
Route::get('profiles', [UsersController::class, 'profiles'])->name('profiles.index');
Route::post('profiles/update', [UsersController::class, 'profiles_update'])->name('profiles.update');

//Media library
Route::get('media-library-admin', [UploadsMediaController::class, 'media_library_admin'])->name('media.library.admin');
Route::post('media-uploads', [UploadsMediaController::class, 'uploads'])->name('media.uploads');
Route::post('media-files_gets', [UploadsMediaController::class, 'files_gets_admin'])->name('media.gets.admin');
Route::post('media-files_gets_page_edit', [UploadsMediaController::class, 'files_gets_page_edit_admin'])->name('media.gets_page_edit.admin');
Route::post('media-destroy-file', [UploadsMediaController::class, 'files_destroy_admin'])->name('media.destroy.admin');
Route::post('media/update', [UploadsMediaController::class, 'update'])->name('media.update');
Route::post('media/edit', [UploadsMediaController::class, 'edit'])->name('media.edit');

    
//Users
Route::get('users', 'User\UsersController@index')->name('users.index');
Route::get('user/edit/{id}', [User\UsersController::class, 'edit'])->name('users.edit');
Route::post('user/store', [User\UsersController::class, 'store'])->name('users.store');
Route::post('get-all-users', [User\UsersController::class, 'get_ajax_users'])->name('ajax_users');
Route::post('user/destory', [User\UsersController::class, 'destory'])->name('users.destory');
Route::post('user/status', [User\UsersController::class, 'status'])->name('users.status');
Route::post('user/update', [User\UsersController::class, 'update'])->name('users.update');

//Backend setting
Route::get('backend-setting', 'Setting\BusinessSettingsController@backend_setting')->name('backend.setting');
Route::get('frontend-setting', 'Setting\BusinessSettingsController@frontend_setting')->name('frontend.setting');
Route::get('backend-header', 'Setting\BusinessSettingsController@backend_header')->name('backend.header');
Route::get('backend-footer', 'Setting\BusinessSettingsController@backend_footer')->name('backend.footer');
Route::post('business-setting-update', 'Setting\BusinessSettingsController@update')->name('business.setting.update');