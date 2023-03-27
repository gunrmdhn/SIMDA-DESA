<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('pengguna-berita', function () {
            return auth()->user()->peran === 'Admin'
                || auth()->user()->peran === 'Kepala Bidang';
        });
        Gate::define('admin', function () {
            return auth()->user()->peran === 'Admin'
                || auth()->user()->peran === 'Kepala Bidang'
                || auth()->user()->peran === 'BPD'
                || auth()->user()->peran === 'Bappeda'
                || auth()->user()->peran === 'Inspektorat';
        });
        Gate::define('pengguna', function () {
            return auth()->user()->peran === 'Akun Desa';
        });
        Gate::define('sekretariat', function () {
            return auth()->user()->peran === 'Sekretariat';
        });
    }
}
