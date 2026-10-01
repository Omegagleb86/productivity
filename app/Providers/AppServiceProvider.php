<?php

namespace App\Providers;

use App\Models\Task;
use Illuminate\Foundation\Auth\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination::simple-tailwind');

        Gate::define('destroy-task', function (User $user, Task $task) {
            return $user->permision == 1 or $task->category_id == 1;
        });

        Gate::define('edit-task', function (User $user, Task $task) {
            return $user->permision == 1 or $task->category_id == 1;
        });
    }
}
