<?php

namespace Alara\AlaraPreset;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Console\Presets\Preset as AlaraPreset;

class Preset extends AlaraPreset
{
    public static function install()
    {
        static::updateStyles();
        static::updatePackages();
        static::updateMix();
        static::updateScripts();
        static::updateEditorConfig();
    }

    public static function updateStyles()
    {
        File::deleteDirectory(resource_path('assets/sass'));
        mkdir(resource_path('assets/css'));
        copy(__DIR__ . '/stubs/app.css', resource_path('assets/css/app.css'));
    }

    public static function updatePackageArray($packages)
    {
        return array_merge([
            'laravel-mix'          => '^2.1.11',
            'laravel-mix-tailwind' => '~0.1.0',
            'laravel-mix-purgecss' => '~1.0.5',
            'postcss-import'       => '^11.1.0',
            'precss'               => '^3.1.2',
            'tailwind'             => '^0.5.3'
        ], Arr::except($packages, [
            'bootstrap',
            'jquery',
            'lodash',
            'popper.js'
        ]));
    }

    public static function updateMix()
    {
        copy(__DIR__ . '/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    public static function updateScripts()
    {
        copy(__DIR__ . '/stubs/js/app.js', resource_path('assets/js/app.js'));
        copy(__DIR__ . '/stubs/js/bootstrap.js', resource_path('assets/js/bootstrap.js'));
    }

    public static function updateEditorConfig()
    {
        copy(__DIR__ . '/stubs/.editorconfig', base_path('.editorconfig'));
    }
}
