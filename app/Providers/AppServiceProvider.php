<?php

namespace App\Providers;

use App\Services\Contracts\Parser;
use App\Services\Contracts\PasswordGenerator;
use App\Services\Contracts\Social;
use App\Services\ParserService;
use App\Services\PasswordGeneratorService;
use App\Services\SocialService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(PasswordGenerator::class, PasswordGeneratorService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
