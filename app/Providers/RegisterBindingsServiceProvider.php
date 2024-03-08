<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Shared\Laravel\Providers\Bindings\CustomBaseBindingsProvider;

class RegisterBindingsServiceProvider extends ServiceProvider
{
    protected $packagesBindingsRegister = [
        CustomBaseBindingsProvider::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->packagesBindingsRegister as $packageRegister) {
            $register = new $packageRegister($this->app);
            $register->register();
        }
    }
}
