<?php

namespace Alara\LaravelPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class AlaraServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        PresetCommand::macro('alara', function ($command) {
            Preset::install();
        });
    }
}
