<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="cartDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-shopping-cart"></i>
        <span class="badge badge-light">{{ $cart ? $cart->cartItems->count() : 'Cart' }}</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="cartDropdown">
        @if($cart && $cart->cartItems->count() > 0)
            <div class="cart-items">
                @foreach($cart->cartItems as $item)
                    <li><a href="{{ route('designs.show', $item->design->id) }}" class="dropdown-item">
                        {{ $item->design->name }} - {{ $item->quantity }} x {{ $item->design->price }}$
                    </a></li>
                @endforeach
                <div class="dropdown-divider"></div>
                <li><a href="{{ route('cart.checkout') }}" class="dropdown-item text-center text-primary">
                    Buy Now
                </a></li>
            </div>
        @else
            <li class="dropdown-item">Cart Empty</li>
        @endif
    </ul>

    <!-- Debugging Section -->
    <div style="display: none;">
        <pre>{{ print_r($cart, true) }}</pre>
    </div>
</div>
