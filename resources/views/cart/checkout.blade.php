@extends('template')

@section('title', 'Checkout')

@section('content')
    <div class="container">
        <h1>Checkout</h1>
        <form action="{{ route('cart.purchase') }}" method="POST">
            @csrf
            <!-- Agregar detalles de pago aquí -->
            <button type="submit" class="btn btn-success">Complete Purchase</button>
        </form>
    </div>
@endsection
