<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    public function redirectToProviderGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackGoogle(Request $request){
        $user = Socialite::driver('google')->user();
        $users['name'] = $user->name;
        $users['email'] = $user->email;
        $exist = User::where('email', $user->email)->first();
        if(is_null($exist)){
            $data = User::create($users);
            Auth::login($data);
            return redirect()->route('home');
        }else{
            
            Auth::login($exist);
            return redirect()->route('home');
        }
       
    }

    public function redirectToProviderFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallbackFacebook(Request $request){
        $user = Socialite::driver('facebook')->user();
        $users['name'] = $user->name;
        $users['email'] = $user->email;
        $exist = User::where('email', $user->email)->first();
        if(is_null($exist)){
            $data = User::create($users);
            Auth::login($data);
            return redirect()->route('home');
        }else{
            
            Auth::login($exist);
            return redirect()->route('home');
        }
        
        

       
    }
    /**
     * Display the login view.
     */
    public function login(): View
    {
        return view('auth.login');
    }
    public function admin_login(): View
    {
        return view('backend.auth.login');
    }



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
