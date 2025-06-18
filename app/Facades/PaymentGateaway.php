<?php

namespace App\Facades;

use App\Services\PaymentService;
use App\Services\StripePayment;
use Illuminate\Support\Facades\Facade;

class PaymentGateaway extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StripePayment::class; // this matches the binding key in the container
    }
}
