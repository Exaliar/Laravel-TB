<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Config\UserPermitionConfig;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        $this->defineUserAccesGate('isAdmin', UserPermitionConfig::ADMIN);
    }

    private function defineUserAccesGate(string $name, string $permition): void
    {
        Gate::define($name, function (User $user) use ($permition) {
            return $user->permition === $permition;
        });
    }
}
