<?php

namespace App\Services\Contracts;

interface PasswordGenerator
{
    public function generate(string $length): string;
}