<?php

namespace App\Enums;

enum PaymentGateway: string
{
    case RAZORPAY = 'razorpay';
    case STRIPE = 'stripe';
    case PAYPAL = 'paypal';
    case CASH_ON_DELIVERY = 'cod';
}