<?php

namespace App\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartDropdown extends Component
{

    public $cart;

    protected $listeners = ['cartUpdated' => 'loadCart'];

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        //aqui cambio de user_id a buyer_id si veo que falla tengo que cambiarlo
        if (Auth::check()) {
            $this->cart = Cart::where('user_id', Auth::id())->with('cartItems.design')->first();
        } else {
            $this->cart = null;
        }
    }






    public function render()
    {
        return view('livewire.cart-dropdown');
    }
}
