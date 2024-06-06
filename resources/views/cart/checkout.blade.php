@extends('template')

@section('title', 'Checkout')

@section('content')
<div class="container">
    <h1>Checkout</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Order Summary</h5>
            <ul class="list-group list-group-flush">
                @foreach($cart->cartItems as $item)
                    <li class="list-group-item">
                        {{ $item->design->name }} - {{ $item->quantity }} x {{ $item->design->price }}$
                    </li>
                @endforeach
            </ul>
            <div class="card-footer">
                <strong>Total: ${{ $cart->totalPrice }}</strong>
            </div>
        </div>
        <a href="#" class="btn btn-primary mt-3">Proceed to Payment</a>
    </div>
</div>
@endsection
