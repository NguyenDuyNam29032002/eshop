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
        $this->defineGateCategory();

        Gate::define('product-edit', function ($user, $id) {
            if ($user->checkPermissionAccess('product_edit')) {
                return $user->checkPermissionAccess('product_edit');
            }
        });
        Gate::define('product-list', function ($user) {
            return $user->checkPermissionAccess('product_list');
        });

        Gate::define('category-edit', function ($user, $category) {
            return $user->checkPermissionAccess('category_edit');
        });

    }

    public function defineGateCategory()
    {

//        Gate::define('category-add', 'App\Policies\CategoryPolicy@create');
//        Gate::define('category-create', 'App\Policies\CategoryPolicy@update');
//        Gate::define('category-delete', 'App\Policies\CategoryPolicy@delete');
    }
}
