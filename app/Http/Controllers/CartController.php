<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->with('cartItems')->first();
        return view('cart.index', compact('cart'));
    }

    public function checkout()
    {
        if (Auth::check()) {
            // Lógica para proceder al checkout
            return view('cart.checkout');
        } else {
            return redirect()->route('login')->with('message', 'Please login to proceed with the purchase.');
        }
    }

    public function purchase(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        // Implementar lógica de compra aquí, como procesar el pago y vaciar el carrito

        return redirect()->route('cart.index')->with('success', 'Purchase completed successfully.');
    }
}
