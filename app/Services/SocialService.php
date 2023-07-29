<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contracts\PasswordGenerator;
use App\Services\Contracts\Social;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements Social
{
    public function loginAndGetRedirectUrl(SocialUser $socialUser, PasswordGenerator $passwordGenerator): string
    {
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();

        if ($user === null) {
            
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'password' => $passwordGenerator->generate(8),
            ]);

            $user->avatar = $socialUser->getAvatar();

            if ($user->save()){
                Auth::loginUsingId($user->id);
                return route('profile.show');
            }

            return route('login');
        }

        $user->name = $socialUser->getName();
        $user->avatar = $socialUser->getAvatar();

        if ($user->save()) {
            Auth::loginUsingId($user->id);

            return route('profile.show');
        }

        throw new \Exception('Did not save user');
    }
}