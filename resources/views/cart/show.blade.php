@extends('template')

@section('title', 'My Carts')

@section('content')
<div class="container">
    <h1 style="color: white;">My Orders</h1>

    @if ($carts)
        <div class="accordion" id="cartAccordion">
            @foreach ($carts as $cart)
                <div class="card">
                    <div class="card-header" id="heading{{ $cart->id }}">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $cart->id }}" aria-expanded="true" aria-controls="collapse{{ $cart->id }}">
                                Cart #{{ $cart->id }} - State: {{ $cart->state }}
                            </button>
                        </h2>
                    </div>


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

                </div>
            @endforeach
        </div>
    @else
        <p>No carts found.</p>
    @endif
</div>
@endsection
