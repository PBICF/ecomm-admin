<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case COD = 'cod';
    case CARD = 'card';
    case UPI = 'upi';
    case WALLET = 'wallet';
    case PAYPAL = 'paypal';
    case NETBANKING = 'net_banking';
}
