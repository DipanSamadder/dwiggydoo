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
Route::prefix('v1/auth')->group(function () {

    /** Start New API for 2023 **/
    /**
    * 2023
    * Login & Registration
    * Email SignUp + Mobile SignUp send OTP
    * Verify OTP
    * Get Breeds + Top Breeds
    * All Feeds
    * Goods List
    */
    Route::post('login', 'Api\AuthController@signin');
	Route::post('register', 'Api\AuthController@signup');
    Route::post('referral-registrations', 'Api\AuthController@refer_registration');
    Route::post('signup-email-send-otp', 'Api\AuthController@signupEmailSendOtp');
    Route::post('signup-phone-send-otp', 'Api\AuthController@signupPhoneSendOtp');
    Route::post('signup-verify-otp', 'Api\AuthController@verifyOtp');

    /** End New API for 2023 **/


});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function(){
    Route::get('app-base-url', function(){
        return 'https://projects.cityinnovates.in/gieo_gita/api/v1/';
    });
    
	Route::get('get-all-countries-list', 'Api\CountriesController@get_all_countries_list');
    Route::get('test-code', function(){
        $code = dsld_random_code_generator();
        return dsld_referral_code_create($code);
    });
	Route::get('get-all-breeds', 'Api\BreedController@index');
    Route::get('get-all-breeds/top', 'Api\BreedController@top');
    Route::get('get-all-good-genes', 'Api\GoodGenesController@index');
    Route::get('get-not-pet-questions', 'Api\NotPetQuestionController@get_questions');

    /**Notifications**/
    Route::get('get-all-notifications/{id}', 'Api\NotificationController@index')->middleware('auth:sanctum');
    Route::post('notification/seen', 'Api\NotificationController@seen')->middleware('auth:sanctum');
    Route::post('notification/hide', 'Api\NotificationController@hide')->middleware('auth:sanctum');
    Route::post('notification/store', 'Api\NotificationController@store')->middleware('auth:sanctum');

    /**User Profile**/
    Route::post('user-setup-profile', 'Api\UserController@setup')->middleware('auth:sanctum');
    Route::post('setup/profile/details', 'Api\UserController@setupUserDetails')->middleware('auth:sanctum');
    Route::get('referral-code-generator/{id}', 'Api\UserController@refferal_code_generators')->middleware('auth:sanctum');


    /**Status**/
    Route::post('status-items/create', 'Api\StatusItemController@create')->middleware('auth:sanctum');
    Route::post('status-items/seen', 'Api\StatusItemController@seen')->middleware('auth:sanctum');
    Route::post('status-items/destroy', 'Api\StatusItemController@destroy')->middleware('auth:sanctum');
    Route::post('status-items/track', 'Api\StatusItemController@track')->middleware('auth:sanctum');
    Route::get('get-all-status/{id}', 'Api\StatusItemController@all_status')->middleware('auth:sanctum');
    Route::get('get-my-status/{id}', 'Api\StatusItemController@my_status')->middleware('auth:sanctum');
    Route::get('get-dwiggydoo-status', 'Api\StatusItemController@dwiggydoo_status');
    Route::get('status/{slug}', 'Api\StatusItemController@status_by_slug')->middleware('auth:sanctum');
    Route::get('track-my-status/{id}', 'Api\StatusItemController@track_my_status')->middleware('auth:sanctum');


    /**Wallet System**/
    Route::get('get-notifications/{id}', 'Api\WalletController@index')->middleware('auth:sanctum');

    /**Dog List**/
    Route::get('my-dogs', 'Api\DogController@my_dogs')->middleware('auth:sanctum');
    Route::get('all-dogs', 'Api\DogController@all_dogs')->middleware('auth:sanctum');


    /**Friendship Route**/
    Route::post('friend-request-send', 'Api\FriendshipController@send_request')->middleware('auth:sanctum');
    Route::post('get-friend-request-list', 'Api\FriendshipController@get_friend_request_lists')->middleware('auth:sanctum');
    Route::post('accept-friend-request', 'Api\FriendshipController@accept_friend_request')->middleware('auth:sanctum');
    Route::post('block-unblock-friend-request', 'Api\FriendshipController@block_unblock_friend_request')->middleware('auth:sanctum');
    Route::post('report-friend-request', 'Api\FriendshipController@report_friend_request')->middleware('auth:sanctum');
    Route::post('reject-friend-request', 'Api\FriendshipController@reject_friend_request')->middleware('auth:sanctum');
    Route::get('show-connected-dogs/{id}', 'Api\FriendshipController@show_connected_dogs')->middleware('auth:sanctum');

    /**Dog Feed*/
    Route::get('show-all-connected-dog-feed/{id}', 'Api\FeedController@show_dog_feeds')->middleware('auth:sanctum');
    Route::get('feed/{slug}', 'Api\FeedController@show_single_feed_by_slug')->middleware('auth:sanctum');
    Route::get('show-my-dog-post/{id}', 'Api\FeedController@show_my_dog_feed')->middleware('auth:sanctum');
    Route::post('add-dog-feed', 'Api\FeedController@create')->middleware('auth:sanctum');
    Route::post('edit-dog-feed', 'Api\FeedController@update')->middleware('auth:sanctum');
    Route::post('status-private-dog-feed', 'Api\FeedController@status_private_feed')->middleware('auth:sanctum');
    Route::post('delete-dog-feed', 'Api\FeedController@delete_feed')->middleware('auth:sanctum');


    Route::post('like-unlike-dog-feed', 'Api\FeedController@like_feed')->middleware('auth:sanctum');
    Route::post('comment-dog-feed', 'Api\FeedController@comment_feed')->middleware('auth:sanctum');
});