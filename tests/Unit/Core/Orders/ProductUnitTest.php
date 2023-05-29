<?php

namespace Tests\Core\Orders;

use Core\Orders\Product;
use PHPUnit\Framework\TestCase;

class ProductUnitTest extends TestCase
{
    public function test_calc(): void
    {
        $product = new Product(
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
        string $name,
        float $price,
        int $total,
        float $tax,
        float $totalWithTax
    ): void {
        $product = new Product(
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
                'name' => 'PROD1',
                'price' => 10,
                'total' => 12,
                'tax' => 0,
                'totalWithTax' => 132,
            ],
            'tax 10 percent' => [
                'name' => 'PROD2',
                'price' => 15,
                'total' => 5,
                'tax' => 0.1,
                'totalWithTax' => 82.5,
            ],
            'tax 15 percent' => [
                'name' => 'PROD3',
                'price' => 120.5,
                'total' => 12,
                'tax' => 0.15,
                'totalWithTax' => 1590.6,
            ],
        ];
    }
}
