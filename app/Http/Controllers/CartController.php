<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->on_sale ? $product->sale_price : $product->price,
            'quantity' => $request->input('quantity'),
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function showCart()
    {
        $cartItems = \Cart::getContent();
        $total = \Cart::getTotal();
        return view('cart.index', compact('cartItems', 'total'));
    }

    public function removeCartItem($id)
    {
        \Cart::remove($id);
        return redirect()->route('cart.index')->with('success', 'Item removed.');
    }
}
