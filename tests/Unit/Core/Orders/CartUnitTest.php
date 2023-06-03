<?php

namespace Tests\Core\Orders;

use Core\Orders\Cart;
use Core\Orders\Product;
use PHPUnit\Framework\TestCase;

class CartUnitTest extends TestCase
{
    public function test_cart(): void
    {
        $cart = new Cart();
        $cart->add(new Product(
            id: '1',
            name: 'Farinha',
            price: 3,
            total: 10
        ));
        $cart->add(new Product(
            id: '1',
            name: 'Farinha',
            price: 3,
            total: 10
        ));
        $cart->add(new Product(
            id: '2',
            name: 'Macarrão',
            price: 4.5,
            total: 1
        ));

        $this->assertCount(2, $cart->totalItems());
        $this->assertEquals(1, $cart->total());
    }
}
