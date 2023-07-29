<?php

namespace App\Services\Contracts;

use Illuminate\Contracts\Auth\PasswordBrokerFactory;
use Laravel\Socialite\Contracts\User as SocialUser;

interface Social
{
    public function loginAndGetRedirectUrl(SocialUser $socialUser, PasswordGenerator $passwordGenerator): string;
}