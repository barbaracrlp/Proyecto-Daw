{{-- <div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
{{-- </div> --}}
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="cartDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-shopping-cart"></i>
        <span class="badge badge-light">{{ $cart ? $cart->cartItems->count() : 'Cart' }}</span>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="cartDropdown">
        @if($cart && $cart->cartItems->count() > 0)
            <div class="cart-items">
                @foreach($cart->cartItems as $item)
                    <a href="{{ route('designs.show', $item->design->id) }}" class="dropdown-item">
                        {{ $item->design->name }} - {{ $item->quantity }} x {{ $item->design->price }}$
                    </a>
                @endforeach
                <div class="dropdown-divider"></div>
                <a href="{{ route('cart.checkout') }}" class="dropdown-item text-center text-primary">
                    buy now
                </a>
            </div>
        @else
            <div class="dropdown-item">Cart Empty</div>
        @endif
    </div>
</div>
