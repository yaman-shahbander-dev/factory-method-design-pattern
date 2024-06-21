<?php

// Product interface
interface PaymentGateway
{
    public function processPayment(float $amount): bool;
}

// Concrete Products
class PayPalGateway implements PaymentGateway
{
    public function processPayment(float $amount): bool
    {
        // Implement PayPal payment processing logic
        echo "Processing payment of $amount using PayPal\n";
        return true;
    }
}

class StripeGateway implements PaymentGateway
{
    public function processPayment(float $amount): bool
    {
        // Implement Stripe payment processing logic
        echo "Processing payment of $amount using Stripe\n";
        return true;
    }
}

class ApplePayGateway implements PaymentGateway
{
    public function processPayment(float $amount): bool
    {
        // Implement Apple Pay payment processing logic
        echo "Processing payment of $amount using Apple Pay\n";
        return true;
    }
}

// Creator interface
class PaymentGatewayFactory
{
    public static function createPaymentGateway(string $gatewayType): PaymentGateway
    {
        return match ($gatewayType) {
            'PayPal' => new PayPalGateway(),
            'Stripe' => new StripeGateway(),
            'ApplePay' => new ApplePayGateway(),
            default => throw new \Exception("Invalid payment gateway type"),
        };
    }
}

// Client code
$paymentGateway = PaymentGatewayFactory::createPaymentGateway('PayPal');
$paymentGateway->processPayment(100.0); // Output: Processing payment of 100 using PayPal

$paymentGateway = PaymentGatewayFactory::createPaymentGateway('Stripe');
$paymentGateway->processPayment(50.0); // Output: Processing payment of 50 using Stripe

$paymentGateway = PaymentGatewayFactory::createPaymentGateway('ApplePay');
$paymentGateway->processPayment(75.0); // Output: Processing payment of 75 using Apple Pay
