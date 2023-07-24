<?php

namespace App\Cart;


use App\Models\Service;

class Cart
{
    private array $items = [];

    public function addItem(CartItem $newItem): void
    {
        foreach($this->items as $item) {
            if($item->getProduct()->service_id === $newItem->getProduct()->service_id) {
                $item->increaseQuantity();

                // Ya encontramos la película, así que terminamos la ejecución del método.
                return;
            }
        }

        $this->items[] = $newItem;
    }

    public function removeItem(int $id): void
    {
        foreach($this->items as $key => $item) {
            if($item->getProduct()->service_id === $id) {
                // Para borrar el ítem, hicimos un unset de la clave del array.
                // Esto es necesario para que funcione.
                unset($this->items[$key]);

                // Alguien podría pensar que tal vez fuese posible hacer un unset de $item, que es la variable
                // que generamos para el valor en el foreach.
//                unset($item); // No funciona :(
                // Sin embargo, eso no funciona.
                // El motivo es que el unset está eliminando la variable $item, pero no el valor almacenado
                // en el array.
                return;
            }
        }
    }

    public function getItem(int $id)
    {
        foreach($this->items as $item) {
            if($item->getProduct()->service_id == $id) {
                return $item;
            }
        }
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTotal(): int
    {
        $total = 0;

        foreach($this->items as $item) {
            $total += $item->getSubtotal();
        }

        return $total;
    }
}
