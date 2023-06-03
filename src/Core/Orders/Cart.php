<?php

namespace Core\Orders;

class Cart
{
    /** @var Product[] */
    protected array $items = [];

    public function add(Product $product): void
    {
        $this->items[] = $product;
    }

    public function totalItems(): array
    {
        return $this->items;
    }

    public function total(): float
    {
        return 1;
    }
}
