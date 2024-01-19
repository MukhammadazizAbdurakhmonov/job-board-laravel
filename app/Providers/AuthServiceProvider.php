<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Job;
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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Protecting from unauthorizated actions update, edit, delete
        Gate::define('job-owner', function (User $user, Job $job) {
            return $user->id === $job->user_id;
        });
    }
}
