<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


class CartItemController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'design_id' => 'required|exists:designs,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $cartItem = CartItem::updateOrCreate(
            ['cart_id' => $cart->id, 'design_id' => $request->design_id],
            ['quantity' => $request->quantity]
        );

        return redirect()->route('cart.index')->with('success', 'Item added to cart.');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.index')->with('success', 'Cart item updated.');
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }
}
