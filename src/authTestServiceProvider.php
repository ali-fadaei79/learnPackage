<?php

namespace parsaco\authtestpackage;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use parsaco\authtestpackage\Http\Livewire\Login;
use parsaco\authtestpackage\Http\Livewire\Register;
use parsaco\authtestpackage\Http\Middleware\guestCheck;

class authTestServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('authTest');
    }

    public function boot(){
        $components =[
            'login' => Login::class,
            'register' => Register::class
        ];

        foreach ($components as $name => $component) {
            Livewire::component($name, $component);
        }

        $this->app['router']->aliasMiddleware('guestCheck',guestCheck::class);
        $this->loadRoutesFrom( dirname(__DIR__ ,1).'\router.php');
        $this->loadViewsFrom(dirname(__DIR__ ,1) . '\views','authTest');
        $this->loadMigrationsFrom( dirname(__DIR__,1).'\database\Migrations');

        $this->publishes([
            dirname(__DIR__,1).'\public' => public_path(),
        ]);
    }
}
