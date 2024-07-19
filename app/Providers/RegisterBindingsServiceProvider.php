<?php

namespace App\Providers;

use Src\Shared\SharedRegisterBindings;
use Illuminate\Support\ServiceProvider;
use Src\Shared\DAO\DAORegisterBindings;

class RegisterBindingsServiceProvider extends ServiceProvider
{
    protected array $bindingsPackage = [
        SharedRegisterBindings::class,
        DAORegisterBindings::class,
    ];

    /**
     * Register services.
     * Registrar los bindings de la aplicación
     */
    public function register(): void
    {
        foreach ($this->bindingsPackage as $packageRegister) {
            $bindings = new $packageRegister($this->app);
            foreach ($bindings->bindings() as $key => $value) {
                $this->app->bind($key, $value);
            }
        }
        // dd(app()->getBindings());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
