<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialAccountService;
use App\Http\Requests;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(SocialAccountService $service, $provider)
    {
        // Important change from previous post is that I'm now passing
        // whole driver, not only the user. So no more ->user() part
        $user = $service->createOrGetUser(Socialite::driver($provider)->user(),$provider);
        auth()->login($user);

        return redirect()->to('/home');
        //$user = $service->createOrGetUser(Socialite::driver($provider)->user());
        //dd($user);
        

    }
}
