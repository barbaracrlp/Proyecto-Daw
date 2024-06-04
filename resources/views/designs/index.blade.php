
@extends('template')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($designs as $design)
        {{-- <div class="col-md-4">
            <div class="card mb-4">
                <div class="position-relative">
                    <img src="{{ Storage::url($design->file_path) }}" class="card-img-top" alt="{{ $design->name }}">
                    <div class="card-img-overlay d-flex flex-column align-items-end" style="top: 0; right: 0;">
                        <h4 class="card-title text-white mb-0" style="background-color: rgba(128, 128, 128, 0.5);padding:5px;">{{ $design->name }}</h4>
                        <a href="{{ route('designs.show', ['design' => $design->id]) }}" class="buton-view btn btn-sm" style="background-color: #ccccb3; color: #000;">View</a>
                    </div>
                </div>
            </div>
        </div> --}}
        @include('designs.onlycard',$design)
        @endforeach
    </div>
</div>
@endsection

