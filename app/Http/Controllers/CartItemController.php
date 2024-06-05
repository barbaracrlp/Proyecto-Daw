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
    //     public function addItem(Request $request, Design $design)
    //     {
    //         // Verificar si el usuario tiene un carrito existente
    //         $cart = auth()->user()->cart;

    //         // Si no hay un carrito existente, crear uno nuevo
    //         if (!$cart) {
    //             $cart = new Cart([
    //                 'user_id' => auth()->id(),
    //                 // Aquí puedes establecer otras propiedades del carrito, si es necesario
    //             ]);
    //             $cart->save();
    //         }
    //         $price=$request->price;
    //         $quantity=$request->quantity;
    //         $total=$price*$quantity;
    //         // Ahora puedes agregar el artículo al carrito
    //         $cartItem = new CartItem([
    //             'cart_id' => $cart->id,
    //             'design_id' => $design->id,
    //             'quantity' => $request->quantity,
    //             'price_unit'=>$request->price,
    //             'total'=>$total,
    //             // Aquí puedes establecer otras propiedades del artículo del carrito, como el precio, etc.
    //         ]);
    //         $cartItem->save();

    //         return redirect()->back()->with('success', 'Design added to cart');
    //     }
    // }

    public function addToCart(Request $request)
    {
        $request->validate([
            'design_id' => 'required|exists:designs,id',
        ]);
        $design=Design::findOrFail($request->design_id);

        $total=$design->price;
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $cartItem = CartItem::updateOrCreate(
            ['cart_id' => $cart->id, 'design_id' => $request->design_id],
            ['quantity' => 1,'price_unit'=>$design->price,
            'total'=>$total]
        );

        $design->stock -= $request->quantity;
        $design->save();
        dd('se guarda ');
        return redirect()->route('cart.index')->with('success', 'Item added to cart.');
    }

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

        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }
}
