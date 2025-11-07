<?php

namespace App\Enums;

enum TransactionType: string
{
    case PAYMENT = 'payment';
    case REFUND = 'refund';
    case PARTIAL_REFUND = 'partial_refund';
}