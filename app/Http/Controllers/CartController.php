<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->get();
        $products = Product::all(); // Fetch all products
        return view('cart.index', compact('cartItems', 'products')); // Pass both cart items and products to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $cartItem = Cart::where('product_id', $request->product_id)->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'product_id' => $request->product_id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }
}
