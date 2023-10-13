<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\{User,Address,};

class SettingController extends Controller
{
    
    
    public function setting()

    {  
        $user_id = Session::get('userDetails.id');
        $userDetails = User::find($user_id);
       

        $dogDetailsDefault = $userDetails->dogs()->where('is_default', 1)->where('status', 1)->first();
        if(is_null($dogDetailsDefault )){
            $dogDetailsDefault = $userDetails->dogs()->where('status', 1)->first();
        }
        
        if(!is_null($dogDetailsDefault)){
            
            $address = Address::where('user_id',  $user_id)->where('dog_id',  $dogDetailsDefault->id)->where('set_default', 1)->first();
            if(is_null($address)){
                $address = Address::where('user_id',  $user_id)->where('dog_id',  $dogDetailsDefault->id)->first();
            }

            if(!is_null($address)){
                Session::put('defaultAddressDetails', $address);
            }
            Session::put('defaultDogDetails', $dogDetailsDefault);
        }
        
        return view('frontend.pages.users.setting', compact('userDetails', 'dogDetailsDefault'));
    }
}
