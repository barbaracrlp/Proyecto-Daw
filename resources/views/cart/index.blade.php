@extends('template')

@section('title', 'Your Cart')

@section('content')
    <div class="container">
        <h1>Your Cart</h1>
        @if($cart && $cart->cartItems->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Design</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->cartItems as $item)
                        <tr>
                            <td>{{ $item->design->name }}</td>
                            <td>
                                <form action="{{ route('cart.item.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </td>
                            <td>{{ $item->design->price }}</td>
                            <td>{{ $item->design->price * $item->quantity }}</td>
                            <td>
                                <form action="{{ route('cart.item.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Buy Now</a>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection
