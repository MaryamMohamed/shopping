<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart
{
    use HasFactory;
    public $items = [];
    public $totalQuantity;
    public $totalPrice;

    public function __Construct($cart = null){
        if($cart){
            $this->items = $cart->items;
            $this->totalQuantity = $cart->totalQuantity;
        }else{
            $this->items = [];
            $this->totalQuantity = 0;
        }
    }

    public function add($product)
    {
        //item data
        $item = [
            'id' => $product->id,
            'title' => $product->title,
            'quantity' => 0
        ];

        //check if product founds in this cart $items and add it
        if(!(array_key_exists($product->id, $this->items))){
            $this->items[$product->id] = $item;         //save item in items with $product->id as key and $item as value
            $this->totalQuantity += 1;                  //increament quantity of cart
        }else{
            $this->totalQuantity += 1;
        }

        $this->items[$product->id]['quantity'] += 1;    //increament quantity of an item
    }

    public function remove($product)
    {
        if(array_key_exists($product, $this->items)){
            $this->totalQuantity -= $this->items[$product]['quantity'];
            unset($this->items[$product]);
        }
    }

    public function updateQuantity($product, $quantity)
    {
        $this->totalQuantity -= $this->items[$product]['quantity']; //remove past quantity of the item from cart totalQuantity
        $this->items[$product]['quantity'] = $quantity;             //update item quantity
        $this->totalQuantity += $quantity;                          //add new quantity of items in cart totalQuantity
    }
}
