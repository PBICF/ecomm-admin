<?php

namespace App\Support;

class Address
{
    public function __construct(
        private string $lineOne,
        private string $lineTwo,
        private string $lineThree,
        private string $city, 
        private string $state, 
        private string $postalCode, 
        private string $country,
        private bool $isDefault = false)
    {
    }
}