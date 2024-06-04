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
                    <p class="expiration" style="margin-top: 10px;">Expires on: {{ $design->expiration }}</p>
                    <a href="{{ route('designs.index') }}" class="btn btn-dark mt-4">Back to Designs</a>
                </div>
            </div>
        </div>
    </div>
@endsection




