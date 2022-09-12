<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        $permissions = ['users','students','roles','schools','canteens','settings','orders'];

        foreach ($permissions as $permission){
            foreach (config('permissions.'.$permission) as $name => $value) {
                Gate::define($name , function($admin)use($name){
                    return $admin->roles[0]->hasPermissions($name);
                });
            }
        }
    }
}
