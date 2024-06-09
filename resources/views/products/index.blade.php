@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create New Product</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">                    
                        {{-- Check the product ID and display the corresponding image --}}
                        @if ($product->id == 1)
                            <img src="{{ url('https://png.pngtree.com/png-clipart/20220605/ourmid/pngtree-timbangan-badan-analog-png-image_4865401.png') }}" class="card-img-top" alt="Product Image">
                        @elseif ($product->id == 2)
                            <img src="{{ url('https://png.pngtree.com/png-vector/20240130/ourlarge/pngtree-3d-wheel-chair-png-image_11573801.png') }}" class="card-img-top" alt="Product Image">
                        @else
                            {{-- Default image if ID is neither 1 nor 2 --}}
                            <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" alt="Product Image" >
                        @endif
                        {{-- <img src="{{ asset('storage/images' . $product->image) }}" class="card-img-top" alt="Product Image">
                        <img src="{{ url('https://e7.pngegg.com/pngimages/1016/374/png-clipart-measuring-scales-weight-watchers-conair-corporation-health-digital-scale-glass-measuring-scales.png') }}" class="card-img-top" alt="Product Image">
                        <img src="{{ url('https://png.pngtree.com/png-vector/20240130/ourlarge/pngtree-3d-wheel-chair-png-image_11573801.png') }}" class="card-img-top" alt="Product Image"> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">Price: {{ $product->price }}</p>
                            <div class="btn-group" role="group">
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
