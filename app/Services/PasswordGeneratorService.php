<?php

namespace App\Services;

use App\Services\Contracts\PasswordGenerator;

class PasswordGeneratorService implements PasswordGenerator
{
    public function generate(string $length): string
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, $length );
        
        return $password;
    }
}