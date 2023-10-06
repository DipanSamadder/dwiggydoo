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
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('signout', [AuthenticatedSessionController::class, 'signout'])->name('signout');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('user/setup', 'User\UsersController@setup_profile')->name('user.setup');
    Route::get('/breeds', 'Dogs\BreedsController@all_breeds')->name('breeds.all');
    Route::get('/breeds/{slug}', 'Dogs\BreedsController@find_breeds_by_slug')->name('breeds.find.slug');
    Route::post('/breeds/filter', 'Dogs\BreedsController@filter_breeds_by_slug')->name('breeds.filter.slug');
    Route::post('/breeds-search', 'Dogs\BreedsController@breeds_search')->name('breeds.search');
    Route::get('/connections', 'Dogs\FriendshipController@connections')->name('connections');
});
Route::get('/barcode-scanner', function () {
    return view('frontend.barcode-scanner');
});
require __DIR__.'/auth.php';
