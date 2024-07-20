<?php

namespace Tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;


class TestListener extends BaseTestCase
{
    public function startTestSuite(\PHPUnit\Framework\TestSuite $suite)
    {
        echo "Setting up test environment...\n";
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
    }
}
