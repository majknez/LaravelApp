<?php

namespace App\Providers;

use App\Services\PaymentService;
use Illuminate\Support\ServiceProvider;
/*
 * The app loads providers
 * register() method is called when the service provider is initialized
 * boot() method is called when the register() is called
 */
class AppServiceProvider extends ServiceProvider
{
    // All the container bindings that should be registered
    public $bindings = [
        // when someone asks for paymentserviceprovider give them paymentserviceprovider class
        PaymentServiceProvider::class => PaymentServiceProvider::class,
    ];

    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        //DowntimeNotifier::class => PingdomDowntimeNotifier::class,
        //ServerProvider::class => ServerToolsProvider::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
