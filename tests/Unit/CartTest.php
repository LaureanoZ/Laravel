<?php

namespace Tests\Unit;

use App\Cart\Cart;
use App\Cart\CartItem;
use App\Models\Service;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function createItem(int $id = 1, int $price = 1999, int $quantity = 1)
    {
        $service = new Service();
        $service->service_id = $id;
        $service->price = $price;
        return new CartItem($service, $quantity);
    }

    public function test_can_add_a_cartitem_to_the_cart(): Cart
    {
        $id = 1;
        $item = $this->createItem($id);
        $cart = new \App\Cart\Cart;

        $cart->addItem($item);

        $this->assertCount(1, $cart->getItems());
        $this->assertSame($item, $cart->getItems($id)[0]);
        $this->assertSame($item, $cart->getItem($id));

        return $cart;
    }
    #[Depends('test_can_add_a_cartitem_to_the_cart')]
    public function test_can_add_another_different_cartitem_to_the_array_to_include_it_in_the_items(Cart $cart): Cart
    {
        $id = 5;
        $item = $this->createItem($id);

        $cart->addItem($item);

        $this->assertCount(2, $cart->getItems());
        $this->assertSame($item, $cart->getItems()[1]);
        $this->assertSame($item, $cart->getItem($id));

        return $cart;
    }

    #[Depends('test_can_add_another_different_cartitem_to_the_array_to_include_it_in_the_items')]
    public function test_can_add_an_already_included_item_to_increase_its_quantity_instead_of_adding_a_new_item_to_the_cart(Cart $cart): Cart
    {
        $id = 5;

        $cart->addItem($this->createItem($id));

        $this->assertCount(2, $cart->getItems());
        $this->assertSame(2, $cart->getItem($id)->getQuantity());

        return $cart;
    }

    #[Depends('test_can_add_an_already_included_item_to_increase_its_quantity_instead_of_adding_a_new_item_to_the_cart')]
    public function test_can_remove_an_item_included_in_the_cart(Cart $cart)
    {
        $id = 1;

        $cart->removeItem($id);

        $this->assertCount(1, $cart->getItems());
        $this->assertSame(null, $cart->getItem($id));
    }

    public function test_can_get_the_cart_total_cost()
    {
        $cart = new Cart();
        $cart->addItem($this->createItem(1, 1999, 2));
        $cart->addItem($this->createItem(3, 2499, 1));
        $cart->addItem($this->createItem(4, 749, 1));
        $expectedResult = (1999 * 2) + 2499 + 749;

        $this->assertSame($expectedResult, $cart->getTotal());
    }
}

