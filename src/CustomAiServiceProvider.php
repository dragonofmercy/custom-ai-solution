<?php

namespace Dragon\CustomAi;

use Illuminate\Support\ServiceProvider;

class CustomAiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/services.php', 'services');
    }
}