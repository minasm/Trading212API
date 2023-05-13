<?php

namespace MinasM\T212;

use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class T212ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $source = realpath($raw = __DIR__.'/../config/T212.php') ?: $raw;

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('T212.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('T212');
        }

        $this->mergeConfigFrom($source, 'T212');
    }

    public function register()
    {
        $this->app->singleton('MinasM.T212', function (Container $app) {
            return new T212(new Config(config('T212.api_token')));
        });
    }
}
