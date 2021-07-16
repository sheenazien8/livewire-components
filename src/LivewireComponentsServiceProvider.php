<?php

namespace Sheenazien8\LivewireComponents;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

/**
 * Class LivewireComponentsServiceProiveder
 * @author sheenazien8
 */
class LivewireComponentsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('livewirecomponents.php'),
            ], 'config');
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/livewirecomponents'),
            ], 'views');
        }

        Livewire::component('form', \Sheenazien8\LivewireComponents\Livewire\From::class);
        $this->loadViewComponentsAs('livewirecomponents', [
            \Sheenazien8\LivewireComponents\View\Components\Form::class,
        ]);
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'livewirecomponents');
    }

    public function register()
    {
        $this->app->bind('Builder', function () {
            return new Builder();
        });
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'livewirecomponents');
    }
}
