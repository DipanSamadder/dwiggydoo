<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use App\Models\Upload;
use App\Models\Address;
use App\Models\Dog;
use App\Models\UserReferralToken;
use Hash;

class UserController extends Controller
{
  

    public function setup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'name' => 'required',
            'age' => 'required|numeric',
            'avatar' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postal_code' => 'required|numeric',
        ],
        [
            'user_id.required' => 'User id required.',
            'name.required' => 'Name id required.',
            'age.required' => 'Age id required.',
            'avatar.required' => 'Avatar id required.',
            'address.required' => 'Address id required.',
            'city.required' => 'City id required.',
            'country.required' => 'Country id required.',
            'postal_code.required' => 'Pincode id required.',
        ]
        );

        if($validator->fails()){
            return $this->sendError($validator->messages());       
        }


        $user = User::findOrFail($request->user_id);

        $avatar_original = 0;
        $avatar = array();


        if($request->hasFile('avatar')){
            foreach ($request->file('avatar') as $key => $mediaFiles) {
                $files = $user->addMedia($mediaFiles)
                        ->withCustomProperties(['purpose' => 'profile'])
                        ->toMediaCollection('user', 'uploads');
                array_push($avatar, $files->id);
            }
            $user->avatar  = json_encode($avatar);
            $user->avatar_original  = $avatar[0];

        }

        $user->name  = $request->name;
        $user->age  = $request->age;

        $address = new Address;
        $address->user_id  = $request->user_id;
        $address->country  = $request->country;
        $address->city  = $request->city;
        $address->postal_code  = $request->postal_code;
        $address->address  = $request->address;
        $address->latitude  = $request->latitude;
        $address->longitude  = $request->longitude;
        $address->set_default  = 0;
        

        $dogs = new Dog;
        $dogs->age  = $request->dage;
        $dogs->user_id  = $request->user_id;
        $dogs->name  = $request->dname;
        $dogs->gender  = $request->dgender;
        $dogs->good_genes_id  = $request->good_genes_id;
        $dogs->breed_id  = $request->breed_id;
        $dogs->is_default  = 1;
        $dogs->status  = 1;

       

        $dogs->save();

        $davatar_original = 0;
        $davatar = array();

        if($request->hasFile('davatar')){
            foreach ($request->file('davatar') as $key => $mediaFiles) {
                $files = $dogs->addMedia($mediaFiles)
                        ->withCustomProperties(['purpose' => 'dogs'])
                        ->toMediaCollection('dogs', 'uploads_dogs');
                array_push($davatar, $files->id);
            }
            $dogs->avatar  = json_encode($davatar);
            $dogs->avatar_original  = $davatar[0];

        }
        $dogs->save();
        
        $address->save();

        $user->save();

        return $this->sendResponse(new UserCollection($user), 'Profile information has been updated successfully');
    }

    public function refferral_token($token){
        if(!is_null($token)){
            $success['token'] = $token;
            return $this->sendResponse($success, 'This is your token');
        }
    }


    public function refferal_code_generators($id){
        $user  = User::where('id', $id)->first();
 
        $code = dsld_random_code_generator(20);
        $expirs = now()->addDays(30);
        if(!is_null($user)){
            UserReferralToken::Create([
                'user_id' => $id,
                'referrals_code' => $user->referral_code,
                'referrals_token' => $code,
                'expire_at' => $expirs,
            ]);
            UserReferralToken::where('expire_at', '<', now())->delete();

            $success['code'] = $code;
            $success['expire_at'] = $expirs;
            return $this->sendResponse($success, 'Refferal code generate success');
        }else{
            return $this->sendError('User not found.');
        }
    }


    public function updateName(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->update(['name' => $request->name]);
        return response()->json([
            'message' => 'Profile information has been updated successfully'
        ]);
    }
}
