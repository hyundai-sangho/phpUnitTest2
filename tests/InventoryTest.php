<?php

use App\Inventory;
use App\ProductRepository;
use PHPUnit\Framework\TestCase;

class InventoryTest extends TestCase
{
    /** @group db  */
    public function testProductsCanBeSet()
    {
        // Setup
        $mockRepo = $this->createMock(ProductRepository::class);

        $inventory = new Inventory($mockRepo);


        $mockProductsArray = [
          ['id'=>1, 'name'=>'갤럭시폰'],
          ['id'=>2, 'name'=>'아이폰'],
        ];

        $mockRepo->method('fetchProducts')->willReturn($mockProductsArray);

        // Do something
        $inventory->setProducts();

        // Make assertions
        $this->assertEquals('갤럭시폰', $inventory->getProducts()[0]['name']);
        $this->assertEquals('아이폰', $inventory->getProducts()[1]['name']);
    }
}
