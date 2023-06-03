<?php

namespace Tests\Core\Orders;

use Core\Orders\Product;
use PHPUnit\Framework\TestCase;

class ProductUnitTest extends TestCase
{
    public function test_attributes(): void
    {
        $product = new Product(
            id: '1',
            name: 'Farinha',
            price: 3,
            total: 10
        );

        $this->assertEquals('1', $product->getId());
        $this->assertEquals('Farinha', $product->name());
        $this->assertEquals(3, $product->price());
    }

    public function test_calc(): void
    {
        $product = new Product(
            id: '1',
            name: 'Prodx',
            price: 10,
            total: 12
        );

        $this->assertEquals(120, $product->total());
    }

    /**
     * @dataProvider dataProviderCalcWithTax
     */
    public function test_calc_with_tax(
        string $id,
        string $name,
        float $price,
        int $total,
        float $tax,
        float $totalWithTax
    ): void {
        $product = new Product(
            id: $id,
            name: $name,
            price: $price,
            total: $total
        );

        $this->assertEquals($totalWithTax, $product->totalWithTax($tax));
    }

    protected static function dataProviderCalcWithTax(): array
    {
        return [
            'no tax' => [
                'id' => '1',
                'name' => 'PROD1',
                'price' => 10,
                'total' => 12,
                'tax' => 0,
                'totalWithTax' => 120,
            ],
            'tax 10 percent' => [
                'id' => '2',
                'name' => 'PROD2',
                'price' => 15,
                'total' => 5,
                'tax' => 0.1,
                'totalWithTax' => 82.5,
            ],
            'tax 15 percent' => [
                'id' => '3',
                'name' => 'PROD3',
                'price' => 120.5,
                'total' => 12,
                'tax' => 0.15,
                'totalWithTax' => 1662.9,
            ],
        ];
    }
}
