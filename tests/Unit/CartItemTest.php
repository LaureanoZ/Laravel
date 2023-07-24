<?php

namespace Tests\Unit;

use App\Cart\CartItem;
use App\Models\Service;
use PHPUnit\Framework\TestCase;

class CartItemTest extends TestCase
{
    public function createService(int $id = 1, int $price = 1999): Service
    {

        return new Service([
            'service_id' => $id,
            'price' => $price,
        ]);
    }


    public function test_can_instantiate_a_cartitem_with_a_service_and_a_default_quantity_of_1(): void
    {
        $service = new Service();
        $service->service_id = 1;
        $service->price = 1223;

        $item = new \App\Cart\CartItem($service);

        $this->assertInstanceOf(\App\Cart\CartItem::class, $item);
        $this->assertSame($service, $item->getProduct());
        $this->assertEquals(1, $item->getQuantity());
    }


    public function test_can_instantiate_a_cartitem_with_a_movie_and_a_custom_quantity(): void
    {
        $quantity = 3;

        $item = new CartItem($this->createService(), $quantity);

        $this->assertEquals($quantity, $item->getQuantity());
    }


    public function test_can_set_the_cartitem_quantity(): void
    {
        $item = new CartItem($this->createService());
        $quantity = 4;

        $item->setQuantity($quantity);

        $this->assertEquals($quantity, $item->getQuantity()); 
    }


    public function test_can_increase_the_cartitem_quantity_by_a_default_amount_of_1(): void
    {
        $item = new CartItem($this->createService());

        $item->increaseQuantity();

        $this->assertEquals(2, $item->getQuantity());
    }


    public function test_can_increase_the_cartitem_quantity_by_a_custom_amount(): void
    {
        $item = new CartItem($this->createService());

        $item->increaseQuantity(3);

        $this->assertEquals(4, $item->getQuantity());
    }


    public function test_can_decrease_the_cartitem_quantity_by_a_default_of_1(): void
    {
        $item = new CartItem($this->createService(), 4);

        $item->decreaseQuantity();

        $this->assertEquals(3, $item->getQuantity());
    }


    public function test_can_decrease_the_cartitem_quantity_by_a_custom_amount(): void
    {
        $item = new CartItem($this->createService(), 3);

        $item->decreaseQuantity(2);

        $this->assertEquals(1, $item->getQuantity());
    }


    public function test_can_get_the_cartitem_subtotal(): void
    {
        $item = new CartItem($this->createService(1, 1499), 2);
        $expectedSubtotal = 1499 * 2;

        $this->assertEquals($expectedSubtotal, $item->getSubtotal());
    }
}
