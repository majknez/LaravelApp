<?php

namespace App\Services;
class StripePayment {

    public function charge($amount) {
        return 'Charge for: '. $amount;
    }
}
