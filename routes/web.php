<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/password', function(){
    App\Models\User::where('id', 1)->update(['password' => Hash::make('Admin@!!123')]);
});

// Route::get('/breed-slug', function(){
//     $breeds  = App\Models\Breed::all();
//     foreach($breeds as $key => $breed){
//         $data  = App\Models\Breed::find($breed->id);
//         $data->slug = dsld_generate_slug_by_text_with_model('App\Models\Breed', $breed->name, 'slug');
//         $data->save();
//     }
// });

Route::get('send-test-mail', 'MailController@testmail')->name('testmail');
Route::get('/optimize', function() {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::view('medias', 'media')->name('media');




Route::middleware('guest')->group(function () {
    Route::get('register/phone', 'Auth\RegisteredUserController@signInByPhone')->name('register.phone');
    Route::get('register/email', 'Auth\RegisteredUserController@signInByEmail')->name('register.email');
    Route::post('register/email/submit', 'Auth\RegisteredUserController@signInByEmailSubmit')->name('register.email.submit');
    Route::post('register/opt/submit', 'Auth\RegisteredUserController@verifyOtp')->name('register.otp.submit');
    Route::get('singup-referral/{token}', 'Api\UserController@refferral_token');
    Route::resource('user_profile', 'UserProfileController');
    Route::get('/login/google', 'Auth\AuthController@redirectToProviderGoogle')->name('google.login');
    Route::get('/login/google/callback', 'Auth\AuthController@handleProviderCallbackGoogle');
    Route::get('/login/facebook', 'Auth\AuthController@redirectToProviderFacebook')->name('facebook.login');
    Route::get('/login/facebook/callback', 'Auth\AuthController@handleProviderCallbackFacebook');
    Route::get('/not-a-pet', 'HomeController@notAPets')->name('not.a.pet');
    Route::post('/not_pet_questions_ajax_get_questions', 'HomeController@ajax_get_questions')->name('not_pet.ajax_get_questions');
    Route::post('/not_pet_questions_answer', 'HomeController@not_pet_questions_answer')->name('not_pet.answer');

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('signout', [AuthenticatedSessionController::class, 'signout'])->name('signout');
    Route::get('/', 'HomeController@index')->name('home');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('user/profile/feed', 'Feeds\DogFeedsController@feedListsOnPrfile')->name('user.profile.feed');
    Route::post('user/profile/feed-lists', 'Feeds\DogFeedsController@feedListsOnPrfileShow')->name('user.profile.feed_list.show');
    Route::post('user/profile/reel-lists', 'Feeds\DogFeedsController@reelListsOnPrfileShow')->name('user.profile.reel_list.show');
    Route::get('user/setup', 'User\UsersController@setup_profile')->name('user.setup');
    Route::get('/breeds', 'Dogs\BreedsController@all_breeds')->name('breeds.all');
    Route::get('/breeds/{slug}', 'Dogs\BreedsController@find_breeds_by_slug')->name('breeds.find.slug');
    Route::post('/breeds/filter', 'Dogs\BreedsController@filter_breeds_by_slug')->name('breeds.filter.slug');
    Route::post('/breeds-search', 'Dogs\BreedsController@breeds_search')->name('breeds.search');
    Route::get('/connections', 'Dogs\FriendshipController@connections')->name('connections');
    Route::post('/connections/filter', 'Dogs\FriendshipController@filter_connections')->name('connections.filter');
    Route::post('/connections/settings', 'Dogs\FriendshipController@connections_setting')->name('connections.modal.setting');
    Route::post('/dog/near-me', 'Dogs\DogsController@near_me')->name('dog.near_me');
    Route::post('/notification', 'Setting\NotifictionsController@get_notifictions')->name('notifictions.get');
    Route::post('/notification/manage', 'Setting\NotifictionsController@manage')->name('notifictions.manage');
    Route::post('/notification/manage-multiple', 'Setting\NotifictionsController@manage_multiple')->name('notifictions.manage.multiple');
    Route::post('/notification/received-request', 'Setting\NotifictionsController@received_request')->name('notifictions.received.request');
    Route::post('/notification/sent-request', 'Setting\NotifictionsController@sent_request')->name('notifictions.sent.request');
    Route::post('/notification/received-request-multiple', 'Setting\NotifictionsController@received_request_multiple')->name('notifictions.received.request.multiple');
    Route::post('/notification/sent-request-multiple', 'Setting\NotifictionsController@sent_request_multiple')->name('notifictions.sent.request.multiple');
});
Route::get('/barcode-scanner', function () {
    return view('frontend.barcode-scanner');
});
require __DIR__.'/auth.php';
