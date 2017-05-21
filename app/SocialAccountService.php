<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser,$provider)
    {
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
                $data=$user;
                Mail::send('emails.welcome', ['data'=>$data], function ($message) use($data) {
            $message->from('support@yakshanidhi.com', 'Yakshanidhi');

            $message->to($data['email'])->bcc(['prasadmayya82@gmail.com','gpstrail2017@gmail.com'])->subject('Welcome to Yakshanidhi');
        });
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}