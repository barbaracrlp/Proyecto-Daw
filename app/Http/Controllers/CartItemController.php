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
    public function addItem(Request $request, Design $design)
    {
        // Verificar si el usuario tiene un carrito existente
        $cart = auth()->user()->cart;

        // Si no hay un carrito existente, crear uno nuevo
        if (!$cart) {
            $cart = new Cart([
                'user_id' => auth()->id(),
                // Aquí puedes establecer otras propiedades del carrito, si es necesario
            ]);
            $cart->save();
        }
        $price=$request->price;
        $quantity=$request->quantity;
        $total=$price*$quantity;
        // Ahora puedes agregar el artículo al carrito
        $cartItem = new CartItem([
            'cart_id' => $cart->id,
            'design_id' => $design->id,
            'quantity' => $request->quantity,
            'price_unit'=>$request->price,
            'total'=>$total,
            // Aquí puedes establecer otras propiedades del artículo del carrito, como el precio, etc.
        ]);
        $cartItem->save();

        return redirect()->back()->with('success', 'Design added to cart');
    }
}
