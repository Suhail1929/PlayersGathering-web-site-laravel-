<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use app\Models\User;
use app\Models\Events;
use Illuminate\Support\Facades\Auth;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('Utilisateur', function ($user,$event) {
            // dd("zzzz".$event);
            if($user->id===$event->user_id){
                return 1;
            }
            return 0;


        });
    }
}
