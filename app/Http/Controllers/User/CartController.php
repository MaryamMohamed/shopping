<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        //check if session has cart
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = new Cart();
        }

        //add new product to cart
        $cart->add($product);

        //put cart in our session
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'added to cart');
    }

    public function showMyCart()
    {
        //check if session has cart
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = null;
        }
        return view('dashboard.user.cart.show', compact('cart'));
    }

    public function updateMyCart($product, Request $request)
    {
        $request->validate([
            'quantity' => 'numeric|required',
        ]);
        $cart = new Cart(session()->get('cart'));
        $cart->updateQuantity($product, $request->quantity);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'removed from cart');
    }

    public function removeFromCart($product)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->remove($product);

        if($cart->totalQuantity <= 0){
            session()->forget('cart');
        }else{
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'removed from cart');
    }

    public function emptyMyCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Your cart is empty');
    }
}
