<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserCollection;
use App\Http\Resources\DogCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use App\Models\Upload;
use App\Models\Address;
use App\Models\Dog;
use App\Models\UserReferralToken;
use Hash;
use Session;
class UserController extends Controller
{
  

    public function setupStep1(Request $request)
    {
        $auth =  auth('sanctum')->user();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required|numeric',
        ]
        );

        if($validator->fails()){
            return $this->sendError($validator->messages());       
        }

        $user = User::findOrFail($auth->id);
        $user->name  = $request->name;
        $user->age  = $request->age;
        $user->dob  = $request->dob;
        $user->save();

        return $this->sendResponse(new UserCollection($user), 'Profile information has been updated successfully');
    }

    public function setupStep2(Request $request)
    {

        $auth =  auth('sanctum')->user();

        if(isset($request->dog_id)){
            $dog = Dog::findOrFail($request->dog_id);
            $dog->user_id = $auth->id;
        }elseif(Session::get('defaultDogID')){
            $dog = Dog::findOrFail(Session::get('defaultDogID'));
            $dog->user_id = $auth->id;
        }else{
            $dog = new Dog;
            $dog->user_id = $auth->id;
        }
       

        if(isset($request->step)){
            switch ($request->step) {
                case 2:
                    if(isset($request->dog_name)){  $dog->name  = $request->dog_name; $dog->slug = dsld_generate_slug_by_text_with_model('App\Models\Dog', $request->dog_name, 'slug'); }
                    if(isset($request->dog_age)){  $dog->age  = $request->dog_age; }
                    if(isset($request->dog_gender)){  $dog->gender  = $request->dog_gender; }
                    $dog->is_default = 1;
                    $dog->save();
                    Session::put('defaultDogID', $dog->id);
                    dsld_dog_barcode_generate($dog);
                    return $this->sendResponse(new DogCollection($dog), 'Dog details update successful.');
                    break;
                case 3:
                    if(isset($request->dog_breed)){  $dog->breed_id  = $request->dog_breed; }
                    $dog->save();
                    return $this->sendResponse(new DogCollection($dog), 'Dog’s Breed update successful.');
                    break;
                case 4:
                    $davatar_original = 0;
                    $davatar = json_decode($dog->avatar, true);

                    if($request->hasFile('davatar1')){
                        $files = $dog->addMedia($request->file('davatar1'))->withCustomProperties(['purpose' => 'dogs'])->toMediaCollection('dogs', 'uploads_dogs');
                        $davatar[0] = $files->id;
                    }

                    if($request->hasFile('davatar2')){
                        $files = $dog->addMedia($request->file('davatar2'))->withCustomProperties(['purpose' => 'dogs'])->toMediaCollection('dogs', 'uploads_dogs');
                        $davatar[1] = $files->id;
                    }

                    if($request->hasFile('davatar3')){
                        $files = $dog->addMedia($request->file('davatar3'))->withCustomProperties(['purpose' => 'dogs'])->toMediaCollection('dogs', 'uploads_dogs');
                        $davatar[2] = $files->id;
                    }

                    if($request->hasFile('davatar4')){
                        $files = $dog->addMedia($request->file('davatar4'))->withCustomProperties(['purpose' => 'dogs'])->toMediaCollection('dogs', 'uploads_dogs');
                        $davatar[3] = $files->id;
                    }

                    if($request->hasFile('davatar5')){
                        $files = $dog->addMedia($request->file('davatar5'))->withCustomProperties(['purpose' => 'dogs'])->toMediaCollection('dogs', 'uploads_dogs');
                        $davatar[4] = $files->id;
                    }

                    $dog->avatar  = json_encode($davatar);
                    $dog->avatar_original  = $davatar[0];
                    $dog->save();
                    return $this->sendResponse(new DogCollection($dog), 'Dog photos update successful.');
                    break;
                case 5:
                    if(isset($request->good_genes)){ $dog->good_genes_id  = json_encode($request->good_genes); }
                    $dog->save();
                    return $this->sendResponse(new DogCollection($dog), 'Dog genes update successful.');
                    break;
                case 6:
                    $dog_id = isset($request->dog_id) ? $request->dog_id :  Session::get('defaultDogID');
                    $address = Address::where('user_id',  $auth->id)->where('dog_id',  $dog_id)->first();

                    if(is_null($address)){
                        $address = new Address;
                        $address->user_id = $auth->id;
                        $address->dog_id = $dog_id;
                    }

                    $addressParts = explode(', ', $request->location);  
                    $totalParts = count($addressParts);

                    if(isset($request->location)){ $address->location_id  = $request->location; }
                    if(isset($request->lat)){ $address->latitude  = $request->lat; }
                    if(isset($request->long)){ $address->longitude  = $request->long; }
                    $addrs = array();
                    for($i = 0; $i<=$totalParts-1; $i++){
                       

                        if($totalParts-1 == $i){
                            $address->country = $addressParts[$totalParts-1];
                        }else if($totalParts-2 == $i){
                            $address->postal_code = $addressParts[$totalParts-2];
                        }else if($totalParts-3 == $i){
                            $address->city = $addressParts[$totalParts-3];
                        }else{
                            array_push($addrs, $addressParts[$i]);
                        }
                    }


                    $address->address  = implode(", ",$addrs);
                    $address->set_default  = 1;
                    $address->save();

                    $user_id = Session::get('userDetails.id');
                    $userDetails = User::find($user_id);
                    $userDetails->setup = 1;
                    $userDetails->save();
                    
                    $dogDetailsDefault = $userDetails->dogs()->where('is_default', 1)->where('status', 1)->first();
                    if(is_null($dogDetailsDefault )){
                        $dogDetailsDefault = $userDetails->dogs()->where('status', 1)->first();
                    }

                    if(!is_null($dogDetailsDefault)){
                        Session::put('defaultDogDetails', $dogDetailsDefault);
                    }
                    if(!is_null($address)){
                        Session::put('defaultAddressDetails', $address);
                    }

                    return $this->sendResponse(new DogCollection($dog), 'Location update successful.');
                    break;
                default:
                    return $this->sendError('Something Wrong. Please try again.');
                    break;
            }
        }else{
            return $this->sendError('Something Wrong. Please try again.');       
        }
    }

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

        $address = new Address;
        $address->user_id  = $request->user_id;
        $address->dog_id  = $dogs->id;
        $address->country  = $request->country;
        $address->city  = $request->city;
        $address->postal_code  = $request->postal_code;
        $address->address  = $request->address;
        $address->latitude  = $request->latitude;
        $address->longitude  = $request->longitude;
        $address->set_default  = 0;


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
