<?php

namespace Business\Example\SubExample\Domain\Providers;

use Business\Example\SubExample\Application\Routes\ExampleApiRoutes;
use Business\Example\SubExample\Domain\Events\ExampleCompleted;
use Business\Example\SubExample\Domain\Listeners\SendExampleNotification;
use Business\Example\SubExample\Domain\Models\Example;
use Business\Example\SubExample\Domain\Observers\ExampleObserver;
use Business\Example\SubExample\Domain\Policies\ExamplePolicy;
use Business\Example\SubExample\Domain\Services\ExampleService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ExampleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ExampleService::class, function ($app) {
            return new ExampleService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Example::observe(ExampleObserver::class);

        $this->registerPolicies();

        $this->registerMailables();

        $this->registerListeners();

        $this->registerNotifications();

        $this->mapApiRoutes();
    }

    /**
     * Register the application's policies.
     */
    protected function registerPolicies(): void
    {
        Gate::define('viewAny', [ExamplePolicy::class, 'viewAny']);
        Gate::define('view', [ExamplePolicy::class, 'view']);
        Gate::define('create', [ExamplePolicy::class, 'create']);
        Gate::define('update', [ExamplePolicy::class, 'update']);
        Gate::define('delete', [ExamplePolicy::class, 'delete']);
        Gate::define('restore', [ExamplePolicy::class, 'restore']);
        Gate::define('forceDelete', [ExamplePolicy::class, 'forceDelete']);
    }

    /**
     * Register the application's mailables.
     */
    protected function registerMailables(): void
    {
        $this->app->bind('example.completed', ExampleCompleted::class);
    }

    /**
     * Register the application's listeners.
     */
    protected function registerListeners(): void
    {
        $this->app->bind('example.notification', SendExampleNotification::class);
    }

    /**
     * Register the application's notifications.
     */
    protected function registerNotifications(): void
    {
        //
    }

    /**
     * Define the "api" routes for the application.
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace('Business\Example\SubExample\Application\Controllers')
            ->group(function () {
                ExampleApiRoutes::register();
            });
    }
}
