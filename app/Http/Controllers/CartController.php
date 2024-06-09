<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Design;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function checkout()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        if (!$cart || $cart->cartItems->count() == 0) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Implement your checkout logic here

        return view('cart.checkout', compact('cart'));
    }

    public function purchase(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        // Implementar lógica de compra aquí, como procesar el pago y vaciar el carrito

        return redirect()->route('cart.index')->with('success', 'Purchase completed successfully.');
    }

    public function addToCart(Design $design)
    {

        if($design->stock==0){
            return redirect()->back()->with('sorry', 'Item out of stock');
        }
        $user = Auth::user();

        $cart = Cart::where('user_id', $user->id)
        ->where('state', 'created')
        ->firstOrCreate(
            ['user_id' => $user->id, 'state' => 'created'],
            ['totalPrice' => 0]
        );

        // Check if the design is already in the cart
        $cartItem = $cart->cartItems()->where('design_id', $design->id)->first();

        if ($cartItem) {
            // Update quantity and total price if it exists
            $cartItem->quantity += 1;
            $cartItem->total = $cartItem->quantity * $cartItem->price_unit;
            $cartItem->save();
        } else {
            // Create a new cart item if it does not exist
            CartItem::create([
                'cart_id' => $cart->id,
                'design_id' => $design->id,
                'quantity' => 1,
                'price_unit' => $design->price,
                'total' => $design->price,
            ]);
        }
        $design->stock -= 1;
        $design->save();
        // Update the total price of the cart
        $cart->updateTotal();

        return redirect()->back()->with('success', 'Item added to cart successfully!');
    }

    public function removeItem($id)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        if (!$cart) {
            return redirect()->back()->with('error', 'Cart not found.');
        }

        $cartItem = CartItem::find($id);

        if (!$cartItem || $cartItem->cart_id != $cart->id) {
            return redirect()->back()->with('error', 'Cart item not found.');
        }

          // Increase the stock of the design
          $design = $cartItem->design;
          $design->stock += $cartItem->quantity;
          $design->save();

        // Update the cart's total price
        $cart->totalPrice -= $cartItem->total;
        $cart->save();

        // Delete the cart item
        $cartItem->delete();

           // Check if the cart is empty
           if ($cart->cartItems->isEmpty()) {
            return redirect()->route('home')->with('success', 'Item removed from cart successfully! Your cart is now empty.');
        }

        return redirect()->back()->with('success', 'Item removed from cart successfully!');
    }
}
