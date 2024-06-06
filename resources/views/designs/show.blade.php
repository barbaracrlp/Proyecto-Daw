
@extends('template')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Product Image -->
                <div class="product-image text-center mb-4">
                    <img src="{{ Storage::url($design->file_path) }}" class="card-img-top" alt="{{ $design->name }}">
                </div>
                <!-- Product Details -->
                <div class="product-details" style="padding: 20px; background-color: #fff; color: #000; border-top: 1px solid #000;">
                    <h1 class="mb-4">{{ $design->name }}</h1>
                    <p class="price" style="font-size: 24px; font-weight: bold;">{{ $design->price }} €</p>
                    <p class="stock" style="margin-top: 10px;">Stock: {{ $design->stock }}</p>
                    <!-- Display expiration date if it exists -->
                    @if ($design->expiration)
                        <p class="expiration" style="margin-top: 10px;">Expires on: {{ $design->expiration }}</p>
                    @endif
                    <!-- Button to add design to cart -->
                    <form action="{{ route('cart.add', $design->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                    <a href="{{ route('designs.index') }}" class="btn btn-dark mt-2">Back to Designs</a>
                </div>
            </div>
        </div>
    </div>
@endsection



