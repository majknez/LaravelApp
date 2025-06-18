<?php



namespace App\Services;

class PaymentService {


    public function __construct(public StripePayment $stripe) {
        $this->stripe = $stripe;
    }
    public function parse(string $feedUrl)
    {
        // Imagine this parses an RSS feed or similar
        return "Parsing feed from: {$feedUrl}";
    }
}
