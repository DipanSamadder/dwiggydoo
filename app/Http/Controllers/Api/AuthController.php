<?php
   
namespace App\Http\Controllers\Api;
   
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use App\Models\UserVerified;
use App\Models\Customer;
use App\Models\Dog;
use App\Models\ReferralUser;
use App\Models\UserReferralToken;
   
class AuthController extends Controller
{
    public function signin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $authUser = Auth::user(); 
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken; 
            $success['name'] =  $authUser->name;
   
            return $this->sendResponse($success, 'User signed in');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    public function refer_registration(Request $request){
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required',
            'referral_code' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Error validation', $validator->messages());       
        }


        $referral_system = dsld_get_setting('referral_system');

        if($referral_system == 1){

                $valid = UserReferralToken::where('referrals_token', $request->referral_code)->first();
                if(!is_null($valid)){
                    if(now()->isBefore($valid->expire_at)){

                        $findRefer = User::where('referral_code', $valid->referrals_code)->where('banned', 0)->get();
                        if(count($findRefer) > 0){

                            $code = dsld_random_code_generator();
                            $referral_code = dsld_referral_code_create($code);

                            $user = new User;
                            $user->name =  $request->name;
                            $user->email =  $request->email;
                            $user->phone =  $request->phone;
                            $user->password =  bcrypt($request->password);
                            $user->referral_code =  $referral_code;
                            $user->save();

                            dsld_store_rewards_data('referral_system', $user->id);
                            $referral_system_ru = dsld_get_setting('referral_system_ru');
                            if($referral_system_ru == 1){
                                dsld_store_rewards_ru_data('referral_system_ru', $findRefer[0]['id']);
                            }

                            $customer = new Customer([
                                'user_id' => $user->id
                            ]);
                            $customer->save();

                           
                            $refer = new ReferralUser;
                            $refer->user_id = $user->id;
                            $refer->referral_code = $valid->referrals_code;
                            $refer->parent_user_id = $findRefer[0]['id'];
                            $refer->save(); 

                            $valid->update([
                                'expire_at' => now()
                            ]);
                            
                            $accessToken =  $user->createToken('MyAuthApp')->plainTextToken;
                            return $this->loginSuccess($accessToken, $user);
                            
                        }else{
                            return $this->sendError('Sorry! Referral code not found.');
                        }
                        
                    }elseif(now()->isAfter($valid->expire_at)){
                        return $this->sendError('This token has been expired.');
                    } 
                }else{
                    return $this->sendError('This token not found.');
                }  

        }
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Error validation', $validator->messages());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $accessToken =  $user->createToken('MyAuthApp')->plainTextToken;
        return $this->loginSuccess($accessToken, $user);
    }

    public function signupEmailSendOtp(Request $request){
        $user_type = 'customer';

        //validation email validation 
        $message = [
            'email.required' => 'Email is required',
            'email.email' => 'Enter your validate email',
        ];

        $validator = Validator::make($request->all(), ['email' => 'required|email'], $message);
        if ($validator->fails())
        {
            return $this->sendError($validator->messages());
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

            dsld_mail_send($request->email, 'Otp for login/registraion.', 'emails.user_template', $success, 0);             
            return $this->sendResponse($success, 'Otp sent on your email.');
        }else{
            
            return $this->sendError('Sorry! Otp not send.');
        }

    }

    public function signupPhoneSendOtp(Request $request){
        $user_type = 'customer';

        //validation email validation 
        $message = [
            'phone.required' => 'Phone is required with country code.',
            'phone.min' => 'Enter your validate phone number with country code.',
            'phone.max' => 'Enter your validate phone number with country code.',
            'phone.regex' => 'Enter your validate phone number with country code.',
        ];

        $validator = Validator::make($request->all(), ['phone' => 'required|regex:/^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/|min:12|max:15'], $message);
        
        if ($validator->fails()){
            return $this->sendError($validator->messages());
        }

        //Checked email validation 

        /**
        * Start User Ragistration 
        * Enter email id and check user is existed or not 
        */
        $code = dsld_random_code_generator();
        $referral_code = dsld_referral_code_create($code);

        if(User::where('phone', $request->phone)->first() != null){
                $user = User::where('phone', $request->phone)->first();
            }else{
               
            $user = new User;
            $user->name =  $request->phone;
            $user->email =  $request->phone;
            $user->phone =  $request->phone;
            $user->password =  bcrypt($request->phone);
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
                            
            return $this->sendResponse($success, 'Otp sent on your phone.');


        }else{
            return $this->sendError('Sorry! Otp not send.');
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
            return $this->sendError($validator->messages());
        }

        //Checked email validation 

        $userVerified = UserVerified::where('user_id', $request->id)->where('otp', $request->otp)->first();

        if(!$userVerified){ 
            return $this->sendError('Otp is not correct.');
        }else if($userVerified && now()->isAfter($userVerified->expire_at)){

            return $this->sendError('Your otp has been expires.');
        }

        $user = User::findOrfail($request->id);
        if($user){
           $userVerified->update([
                'expire_at' => now()
           ]); 

            $accessToken = $user->createToken('MyAuthApp')->plainTextToken;
            return $this->loginSuccess($accessToken, $user);
        }
   }

    protected function loginSuccess($accessToken, $user)
    {
         $success['access_token'] = $accessToken;
         $success['token_type'] = 'Bearer';
         $success['user'] = [
                            'id' => $user->id,
                            'type' => $user->user_type,
                            'name' => $user->name,
                            'email' => $user->email,
                            'avatar' => $user->avatar,
                            'avatar_original' => $user->avatar_original,
                            'address' => $user->address,
                            'country'  => $user->country,
                            'city' => $user->city,
                            'postal_code' => $user->postal_code,
                            'phone' => $user->phone
                        ];
        return $this->sendResponse($success, 'User Login successfully.');      
    }
   
}