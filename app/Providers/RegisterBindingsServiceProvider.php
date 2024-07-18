<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RegisterBindingsServiceProvider extends ServiceProvider
{
    protected array $bindingsPackage = [
        //
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->registerBindings();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Registrar los bindings de la aplicación
     */
    protected function registerBindings()
    {
        foreach ($this->bindingsPackage as $key => $value) {
            is_numeric($key)
                ? $this->app->singleton($value)
                : $this->app->singleton($key, $value);
        }
    }
}
