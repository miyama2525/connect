<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // 管理者の場合にtrueを返す
        Gate::define('admin', function (User $user) {
            return ($user->role == 0);
        });
        // 保育園関係者の場合にtrueを返す
        Gate::define('teacher', function (User $user) {
            return ($user->role == 1);
        });
        // 保護者の場合にtrueを返す
        Gate::define('guardian', function (User $user) {
            return ($user->role == 11);
        });
    }
}
