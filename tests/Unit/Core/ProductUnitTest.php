<?php

namespace Unit\Core;

use PHPUnit\Framework\TestCase;

class ProductUnitTest extends TestCase
{
    public function test_example(): void
    {
        $productClassExists = class_exists('Product');
        $this->assertTrue($productClassExists);
    }
}
