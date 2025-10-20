<?php

namespace Yuges\Reactable\Tests;

use Database\Seeders\ReactionTypeSeeder;
use Illuminate\Contracts\Config\Repository;
use Orchestra\Testbench\Attributes\WithMigration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Yuges\Reactable\Providers\ReactableServiceProvider;

#[WithMigration]
class TestCase extends \Orchestra\Testbench\TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(ReactionTypeSeeder::class);
    }

    protected function defineEnvironment($app)
    {
        tap($app['config'], function (Repository $config) {
            $config->set('reactable', require __DIR__ . '/../../config/reactable.php');
        });
    }

    protected function getPackageProviders($app)
    {
        return [
            ReactableServiceProvider::class,
        ];
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom([
                __DIR__ . '/../../database/migrations/',
                __DIR__ . '/Stubs/Migrations',
            ]
        );
    }
}
