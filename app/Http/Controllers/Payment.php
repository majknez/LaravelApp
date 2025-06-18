<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\Request;

class Payment extends Controller
{
    //
    public function index(PaymentService $paymentService)
    {
        return $paymentService->stripe->charge(100);
    }
}
