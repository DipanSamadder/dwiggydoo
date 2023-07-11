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
 Route::group(['middleware' => ['role_or_permission:Super-Admin|admin|show-user']], function () {
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
Route::post('/env_key_update', 'Setting\BusinessSettingsController@env_key_update')->name('env_key_update.update');


 //Roles
Route::group(['middleware' => ['role_or_permission:Super-Admin|admin|show-roles']], function () {
	Route::resource('roles', 'Setting\RolesController');
	Route::post('get-all-roles', 'Setting\RolesController@get_ajax_roles')->name('ajax_roles');
	Route::post('role/destory', 'Setting\RolesController@destory')->name('role.destory');
	Route::get('role/edit/{id}', 'Setting\RolesController@edit')->name('role.edit');
	Route::post('role/update', 'Setting\RolesController@update')->name('role.update');
	Route::post('role/show-permissions', 'Setting\RolesController@show_permissions')->name('roles.show_permissions');
	Route::post('role/assign-permissions', 'Setting\RolesController@assign_permissions')->name('roles.assign_permissions');
}); 

 //Permissions
Route::group(['middleware' => ['role_or_permission:Super-Admin|admin|show-permissions']], function () {
	Route::resource('permissions', 'Setting\PermissionsController');
	Route::post('get-all-permissions', 'Setting\PermissionsController@get_ajax_permissions')->name('ajax_permissions');
	Route::post('permissions/status', 'Setting\PermissionsController@status')->name('permission.status');

	Route::post('permissions/edit', 'Setting\PermissionsController@edit')->name('permission.edit');
	Route::post('permissions/store', 'Setting\PermissionsController@store')->name('permission.store');
	Route::post('permissions/destory', 'Setting\PermissionsController@destory')->name('permission.destory');
	Route::post('permissions/update', 'Setting\PermissionsController@update')->name('permission.update');
}); 


 //Dogs
 Route::group(['middleware' => ['role_or_permission:Super-Admin|admin|show-dogs']], function () {
	Route::resource('dogs', 'Dogs\DogsController');
	Route::post('get-all-dogs', 'Dogs\DogsController@get_ajax_dogs')->name('ajax_dogs');
	Route::post('dogs/destory', 'Dogs\DogsController@destory')->name('dogs.destory');
	Route::get('dogs/edit/{id}', 'Dogs\DogsController@edit')->name('dogs.edit');
	Route::post('dogs/update', 'Dogs\DogsController@update')->name('dogs.update');
	Route::post('dogs/status', 'Dogs\DogsController@status')->name('dogs.status');
}); 


 //Breed
 Route::group(['middleware' => ['role_or_permission:Super-Admin|admin|show-breeds']], function () {
	Route::resource('breeds', 'Dogs\BreedsController');
	Route::post('get-all-breeds', 'Dogs\BreedsController@get_ajax_breeds')->name('ajax_breeds');
	Route::post('breed/status', 'Dogs\BreedsController@status')->name('breeds.status');

	Route::post('breed/edit', 'Dogs\BreedsController@edit')->name('breeds.edit');
	Route::post('breed/store', 'Dogs\BreedsController@store')->name('breeds.store');
	Route::post('breed/destory', 'Dogs\BreedsController@destory')->name('breeds.destory');
	Route::post('breed/update', 'Dogs\BreedsController@update')->name('breeds.update');
}); 


 //GoodGenes
 Route::group(['middleware' => ['role_or_permission:Super-Admin|admin|show-genes']], function () {
	Route::resource('genes', 'Dogs\GenesController');
	Route::post('get-all-genes', 'Dogs\GenesController@get_ajax_genes')->name('ajax_genes');
	Route::post('genes/status', 'Dogs\GenesController@status')->name('genes.status');

	Route::post('genes/edit', 'Dogs\GenesController@edit')->name('genes.edit');
	Route::post('genes/store', 'Dogs\GenesController@store')->name('genes.store');
	Route::post('genes/destory', 'Dogs\GenesController@destory')->name('genes.destory');
	Route::post('genes/update', 'Dogs\GenesController@update')->name('genes.update');
}); 

 //Questions
 Route::group(['middleware' => ['role_or_permission:Super-Admin|admin|show-questions']], function () {
	Route::resource('questions','Questions\QuestionController');
	Route::post('get-all-questions', 'Questions\QuestionController@get_ajax_questions')->name('ajax_questions');
	Route::post('questions/status', 'Questions\QuestionController@status')->name('questions.status');
	Route::post('questions/update', 'Questions\QuestionController@update')->name('questions.update');
	Route::post('questions/edit', 'Questions\QuestionController@edit')->name('questions.edit');
	Route::post('questions/destory', 'Questions\QuestionController@destory')->name('questions.destory');
	Route::post('questions/store', 'Questions\QuestionController@stores')->name('questions.store');
	Route::post('questions-type', 'Questions\QuestionController@questions_type')->name('questions.type');

	Route::get('task-approve', 'Questions\QuestionController@task_approve')->name('task.approve');
	Route::post('get-all-tasks', 'Questions\QuestionController@get_all_tasks')->name('get.tasks');
	Route::post('task-approve/approved', 'Questions\QuestionController@task_approved')->name('task.approved');
});

 //NotPetQuestions
 Route::group(['middleware' => ['role_or_permission:Super-Admin|admin|show-not pet questions']], function () {
	Route::resource('not-pet-questions','Questions\NotPetQuestionController', ['names' => [
		'index' => 'not_pet_questions.index'
		]]);
	Route::post('get-all-not-questions', 'Questions\NotPetQuestionController@get_ajax_not_questions')->name('ajax_not_questions');
	Route::post('not-pet-questions/status', 'Questions\NotPetQuestionController@status')->name('not_pet_questions.status');
	Route::post('not-pet-questions/update', 'Questions\NotPetQuestionController@update')->name('not_pet_questions.update');
	Route::post('not-pet-questions/edit', 'Questions\NotPetQuestionController@edit')->name('not_pet_questions.edit');
	Route::post('not-pet-questions/destory', 'Questions\NotPetQuestionController@destory')->name('not_pet_questions.destory');
	Route::post('not-pet-questions/store', 'Questions\NotPetQuestionController@stores')->name('not_pet_questions.store');
});


Route::group(['middleware' => ['role_or_permission:Super-Admin|admin|show-pages']], function () {

	Route::resource('pages','Pages\PagesController', ['names' => [
		'index' => 'pages.index',
		'stores' => 'pages.store',
		]]);
	Route::post('get-ajax-pages', 'Pages\PagesController@get_ajax_pages')->name('ajax_pages');
	Route::post('pages/status', 'Pages\PagesController@status')->name('pages.status');
	Route::post('pages/update', 'Pages\PagesController@update')->name('pages.update');
	Route::post('pages/destory', 'Pages\PagesController@destory')->name('pages.destory');
	Route::get('pages/edit/{id}', 'Pages\PagesController@edit')->name('pages.edit');
	Route::get('pages/destroy/{id}', 'Pages\PagesController@destroy')->name('pages.destroy');
	Route::post('page/edit_extra', 'Pages\PagesController@edit_extra')->name('pages.edit_extra');
    Route::post('page-extra-content/update', 'Pages\PagesController@update_extra_content')->name('pages_extra_content.update');
});

Route::group(['middleware' => ['role_or_permission:Super-Admin|admin|show-page sections']], function () {

    //Page Section
	Route::resource('pages-sections','Pages\PageSectionController', ['names' => [
		'index' => 'pages_section.index',
		'store' => 'pages_section.store',
		]]);
    Route::post('page-sections/edit', 'Pages\PageSectionController@edit')->name('pages_section.edit');
    Route::get('page-sections-fields/edit/{id}', 'Pages\PageSectionController@edit_fields')->name('pages_section_fields.edit');
    Route::post('get-all-page-sections', 'Pages\PageSectionController@get_ajax_page_sections')->name('ajax_page_sections');
    Route::post('page-sections/destory', 'Pages\PageSectionController@destory')->name('pages_section.destory');
    Route::post('page-sections/status', 'Pages\PageSectionController@status')->name('pages_section.status');
    Route::post('page-sections/update', 'Pages\PageSectionController@update')->name('pages_section.update');
    Route::post('page-sections-fields/update', 'Pages\PageSectionController@edit_field_update')->name('pages_section_fields.update');
});


 //languages
 Route::group(['middleware' => ['role_or_permission:Super-Admin|admin|languages']], function () {
	Route::resource('languages', 'Setting\LanguageController');
	Route::post('get-all-languages', 'Setting\LanguageController@get_ajax_languages')->name('ajax_languages');
	Route::post('languages/edit', 'Setting\LanguageController@edit')->name('languages.edit');
	Route::post('languages/store', 'Setting\LanguageController@store')->name('languages.store');
	Route::post('languages/destory', 'Setting\LanguageController@destory')->name('languages.destory');
	Route::post('languages/update', 'Setting\LanguageController@update')->name('languages.update');
	
	Route::get('translate', 'Setting\LanguageController@translate')->name('translate.index');
	Route::post('get-all-translates', 'Setting\LanguageController@get_ajax_translates')->name('ajax_translates');
	Route::post('translate/edit', 'Setting\LanguageController@translate_edit')->name('translate.edit');
	Route::post('translate/destory', 'Setting\LanguageController@translate_destory')->name('translate.destory');
	Route::post('translate/update', 'Setting\LanguageController@translate_update')->name('translate.update');
	Route::post('translate/store', 'Setting\LanguageController@translate_store')->name('translate.store');
}); 
