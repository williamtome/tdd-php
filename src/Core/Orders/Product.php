<?php

namespace Core\Orders;

class Product
{
    public function __construct(
        private string $name,
        private float $price,
        private int $total
    ) {}

    public function total(): float
    {
        return $this->price * $this->total;
    }

    public function totalWithTax(float $tax): float
    {
        $total = $this->price * $this->total;

        return ($total * $tax) + $total;
    }
}
