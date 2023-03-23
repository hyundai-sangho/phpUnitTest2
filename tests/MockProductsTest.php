<?php

use App\ProductRepository;
use PHPUnit\Framework\TestCase;

class MockProductsTest extends TestCase
{
    /** @group db  */
    public function testMockProductsAreReturned()
    {
        $mockRepo = $this->createMock(ProductRepository::class);

        $mockProductsArray = [
          ['id'=>1, 'name'=>'갤럭시폰'],
          ['id'=>2, 'name'=>'아이폰'],
        ];

        $mockRepo->method('fetchProducts')->willReturn($mockProductsArray);

        $products = $mockRepo->fetchProducts();

        $this->assertEquals('갤럭시폰', $products[0]['name']);
    }
}
