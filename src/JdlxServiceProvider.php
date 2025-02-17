<?php

namespace Jdlx;

use Illuminate\Support\ServiceProvider;
use Jdlx\Commands\Account\AccountChangePasswordCommand;
use Jdlx\Commands\Account\AccountCreateCommand;
use Jdlx\Commands\Auth\LoginSanctumCommand;
use Jdlx\Commands\Docs\GenerateDocsCommand;


class JdlxServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateDocsCommand::class,
                AccountChangePasswordCommand::class,
                AccountCreateCommand::class,
                LoginSanctumCommand::class,
                AccountCreateCommand::class,
            ]);
        }


        $this->publishes([
            __DIR__ . '/../publish/app' => base_path('app'),
            __DIR__ . '/../publish/routes' => base_path('routes'),
            __DIR__ . '/../publish/tests' => base_path('tests'),
            __DIR__ . '/../publish/config' => base_path('config'),
        ]);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'jdlx');
        $this->loadRoutesFrom(__DIR__ . '/../routes/docs.php');

    }


}
