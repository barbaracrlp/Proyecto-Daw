<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Design;

class CartItemController extends Controller
{

    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $oldQuantity = $cartItem->quantity;
        $newQuantity = $request->quantity;

        // Update the quantity of the cart item
        $cartItem->update(['quantity' => $newQuantity]);

        // Calculate the difference in quantity
        $quantityDifference = $newQuantity - $oldQuantity;

        $cartItem->cart->updateTotal();
        // Update the stock of the associated design
        $cartItem->design->stock -= $quantityDifference;
        $cartItem->design->save();

        return redirect()->route('cart.index')->with('success', 'Cart item updated.');
    }

    public function destroy(CartItem $cartItem)
    {
        $quantity=$cartItem->quantity;

        $cartItem->design->stock += $quantity;
        $cartItem->design->save();
        $cartItem->cart->updateTotal();
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }
}
