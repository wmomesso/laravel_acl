<?php

namespace App\Providers;

use App\Permission;
use App\Post;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
//        App\Post::class => \App\Policies\PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @param GateContract $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        $permissions = Permission::with('roles')->get();
        foreach ($permissions as $permission)
        {
            //dd($gate);
            $gate->define($permission->name, function (User $user) use ($permission){
                return $user->hasPermission($permission);
            });
        }
    }
}
