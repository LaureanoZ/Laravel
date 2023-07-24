<?php

namespace App\Cart;


use App\Models\Service;

class CartItem
{
    public function __construct(
        private Service $service,
        private int $quantity = 1
    ){}

    public function getProduct(): Service
    {
        return $this->service;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function increaseQuantity(int $increaseBy = 1): void
    {
        $this->quantity += $increaseBy;
    }

    public function decreaseQuantity(int $decreaseBy = 1): void
    {
        $this->quantity -= $decreaseBy;
    }

    public function getSubtotal(): int|float
    {
        return $this->getProduct()->price * $this->quantity;
    }
}
