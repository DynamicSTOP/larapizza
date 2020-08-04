<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class MoneyFormatterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('money', function ($money) {
            return "<?php " .
                "if (($money) % 100 === 0){ echo ($money) / 100;}" .
                "else if (($money) % 10 === 0){ echo (($money) / 100.0) . '0';}" .
                "else { echo ($money) / 100.0;}" .
                "?>";
        });
    }
}
