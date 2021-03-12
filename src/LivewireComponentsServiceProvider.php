<?php

namespace Sheenazien8\LivewireComponents;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Sheenazien8\LivewireComponents\Livewire\From;

/**
 * Class LivewireComponentsServiceProiveder
 * @author sheenazien8
 */
class LivewireComponentsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'livewirecomponents');
        Livewire::component('form', From::class);
    }

    public function register()
    {
        $this->app->bind('Builder', function () {
            return new Builder();
        });
    }
}
