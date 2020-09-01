<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $products = null;
    public $totalPrice = 0;
    public $totalQty = 0;

    public function __construct($cart)
    {
        if ($cart) {
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQty = $cart->totalQty;
        }
    }

    public function add($product, $id)
    {
        if ($product->price_discount != 0) {
            $storedItem = [
                'quantity' => 0,
                'price' => $product->price_discount,
                'productInfo' => $product,
            ];
        } else {
            $storedItem = [
                'quantity' => 0,
                'price' => $product->price,
                'productInfo' => $product,
            ];
        }
        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $storedItem = $this->products[$id];
            }
        }
        $storedItem['quantity']++;
        if ($product->price_discount != 0) {
            $storedItem['price'] = $storedItem['quantity'] * $product->price_discount;
            $this->totalPrice += $product->price_discount;
        } else {
            $storedItem['price'] = $storedItem['quantity'] * $product->price;
            $this->totalPrice += $product->price;
        }
        $this->products[$id] = $storedItem;
        $this->totalQty++;
    }

    public function deleteItemCart($id)
    {
        $this->totalQty -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

    public function updateItemListCart($id, $quantity)
    {
        $this->totalQty -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];
        $this->products[$id]['quantity'] = $quantity;
        if ($this->products[$id]['productInfo']->price_discount != 0) {
            $this->products[$id]['price'] = $quantity * $this->products[$id]['productInfo']->price_discount;
        } else {
            $this->products[$id]['price'] = $quantity * $this->products[$id]['productInfo']->price;
        }
        $this->totalQty += $this->products[$id]['quantity'];
        $this->totalPrice += $this->products[$id]['price'];
    }
}
