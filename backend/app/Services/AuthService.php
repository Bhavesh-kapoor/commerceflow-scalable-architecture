<?php 

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthService{

    // register function
    public function  register($data){
        try{
            /*
             1. create user 
             2. send welcome mail through node service
             3. create jwt token
             4. return token with user info
            */

            //  1. creating user 
             $user = User::create([
                    'name'=>$data['name'],
                    'email'=>$data['email'],
                    'password'=>Hash::make($data['password']),
             ]);

             // 2. send welcome mail through node service
             $welcomeMailResponse = Http::post('http://notification-service:3000/send-email',[
                'email'=>$data['email'],
                'name'=>$data['name'],
             ]);
             Log::info('send welcome mail ', ['response'=>$welcomeMailResponse->json()]);

             // 3. create jwt token
             $token = auth('api')->login($user);

             //4. return token with user info
             return ['token'=>$token,'user'=>$user];

        }catch(\Exception $err){
            throw $err;
        }
    }

}
?>