<?php

namespace App\Providers;

use App\Models\Passport\Token;
use Laravel\Passport\Passport;


use App\Models\Passport\AuthCode;
use App\Models\Passport\Client;
use Illuminate\Support\Facades\Gate;
use App\Models\Passport\RefreshToken;
use App\Models\Passport\PersonalAccessClient;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        'App\Models\Model' => 'App\Polices\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //Passport::useTokenModel(Token::class);
        Passport::useRefreshTokenModel(RefreshToken::class);
        Passport::useAuthCodeModel(AuthCode::class);
        /*Passport::useClientModel(Client::class);*/
        /*Passport::usePersonalAccessClientModel(PersonalAccessClient::class);*/
    }
}
