<?php

namespace TooPago\CoinPayments;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class LaravelCoinPaymentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/coinpayments.php' => config_path('coinpayments.php')
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/config/coinpayments.php', 'coinpayments'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
