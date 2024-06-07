@extends('template')

@section('title', 'Checkout')

@section('content')
<div class="container">
    <h1 style="color: white;">Checkout</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Order Summary</h5>
            <ul class="list-group list-group-flush">
                @foreach($cart->cartItems as $item)
                    <li class="list-group-item">
                        {{ $item->design->name }} - {{ $item->quantity }} x {{ $item->design->price }}$
                        <img style="height: 60px;width:60px;"  src="{{ Storage::url($item->design->file_path) }}" class="card-img-top" alt="{{ $item->design->name }}">
                        <form method="POST" action="{{ route('cart.removeItem', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link p-0 text-danger">
                                <i class="fa fa-trash">Delete</i>
                            </button>
                        </form>
                    </li>

                @endforeach
            </ul>
            <div class="card-footer">
                <strong>Total: ${{ $cart->totalPrice }}</strong>
            </div>
        </div>
        <a href="#" class="btn btn-primary mt-3" style="background-color: #ccccb3; color: #000;">Proceed to Payment</a>
    </div>
</div>
@endsection
