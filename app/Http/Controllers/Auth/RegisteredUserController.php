<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use App\Models\UserVerified;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Validator;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.login');
    }
     
    public function signInByPhone(): View
    {
        return view('auth.loginByPhone');
    }
     
    public function signInByEmail(): View
    {
        return view('auth.loginByEmail');
    }

    public function signInByEmailSubmit(Request $request){
        $user_type = 'customer';

        //validation email validation 
        $message = [
            'email.required' => 'Email is required',
            'email.email' => 'Enter your validate email',
        ];

        $validator = Validator::make($request->all(), ['email' => 'required|email'], $message);
        if ($validator->fails())
        {
            return response()->json(['success'=> false,'message' => $validator->messages()]);
        }
        //Checked email validation 

        /**
        * Start User Ragistration 
        * Enter email id and check user is existed or not 
        */
        

        $code = dsld_random_code_generator();
        $referral_code = dsld_referral_code_create($code);

        if(User::where('email', $request->email)->first() != null){

                $user = User::where('email', $request->email)->first();
        
        }else{
        	           
            	$user = new User;
	            $user->name =  $request->email;
	            $user->email =  $request->email;
	            $user->phone =  $request->email;
	            $user->password =  bcrypt($request->email);
	            $user->referral_code =  $referral_code;
	            $user->save();
	            
	            $customer = new Customer([
	                'user_id' => $user->id
	            ]);
	            $customer->save(); 

        }
        
        $data  = $this->generateOtpViaMail($user);
        if($data != null){
    
            $success['otp'] = $data->otp; 
            $success['user_id'] = $data->user_id; 
            $success['expire_at'] = $data->expire_at; 

            dsld_mail_send($request->email, 'Otp for login/registraion.', 'emails.otp_template', $success, 0);             
            return response()->json(['success'=> true,'message' => 'Otp sent on your email.', 'data'=> $success]);
        }else{
            return response()->json(['success'=> false,'message' => 'Sorry! Otp not send.']);
        }
    }


    public function generateOtpViaMail($user){

        $userVerified = UserVerified::where('user_id', $user->id)->latest()->first();
        $now = now();

        if($userVerified  && now()->isBefore($userVerified->expire_at)){
            return $userVerified;
        }else{
            return UserVerified::create([
                'user_id' => $user->id,
                'otp' => rand(123456, 999999),
                'expire_at' => now()->addMinutes(10),
            ]);

        }
   }

   

   public function verifyOtp(Request $request){

    //validation email validation 
    $message = [
        'id.required' => 'User ID is required',
        'otp.required' => 'Otp is required',
    ];

    $validator = Validator::make($request->all(), ['otp' => 'required', 'id' => 'required|exists:users,id'], $message);

    if ($validator->fails()){
        return response()->json(['success'=> false,'message' => $validator->messages()]);
    }

    //Checked email validation 

    $userVerified = UserVerified::where('user_id', $request->id)->where('otp', $request->otp)->first();

    if(!$userVerified){ 
        return response()->json(['success'=> false,'message' => 'Otp is not correct.']);
    }else if($userVerified && now()->isAfter($userVerified->expire_at)){
        return response()->json(['success'=> false,'message' => 'Your otp has been expires.']);
    }

    $user = User::findOrfail($request->id);
    if($user){
       $userVerified->update([
            'expire_at' => now()
       ]);

       $userVeri = UserVerified::where('user_id', $user->id)->count();

       Auth::login($user, true);
       $new_user = false;
       if($userVeri == 1){
        $new_user = true;
       }
       $accessToken = $user->createToken('MyAuthApp')->plainTextToken;

       return response()->json(['success'=> true, 'message' => 'Login Successfull.','token_type'=> 'Bearer', 'access_token'=> $accessToken, 'new_user' => true]);
    }
}
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        if (Auth::user()->type=='admin'){
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }else{
          return redirect()->intended(RouteServiceProvider::HOME);  
        }
    }
}
