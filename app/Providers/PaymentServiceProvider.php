<?php

namespace App\Providers;

use App\Services\PaymentService;
use App\Services\StripePayment;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Bind - new instance each time
        $this->app->bind(PaymentService::class, function ($app) {
            return new PaymentService($app->make(StripePayment::class));
        });

        // Singleton - same instance reused
        /* This is usually used for services like cache, queue etc.. that dont need reinitiating
        $this->app->singleton(PaymentLogger::class, function ($app) {
            return new PaymentLogger(); // simple logger class, for example
        });
        */

    }
}
