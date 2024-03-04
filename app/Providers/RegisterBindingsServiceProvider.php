<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Shared\Providers\Bindings\CustomBindingsProvider;

class RegisterBindingsServiceProvider extends ServiceProvider
{
    protected $packagesBindingsRegister = [
        CustomBindingsProvider::class,
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
