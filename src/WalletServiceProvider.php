<?php

namespace FaganChalabizada\Wallet;

use Illuminate\Support\ServiceProvider;
use App;

class WalletServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/migrations' => base_path('database/migrations'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('FaganChalabizada\Wallet\controller\WalletController');
        App::bind('walletapi', function()
        {
            return new \FaganChalabizada\Wallet\WalletApi;
        });
    }
}
