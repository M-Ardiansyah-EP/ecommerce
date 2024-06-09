@extends('layouts.home')

@section('content')
    <div class="container">
        <h1>Produk</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($product->id == 1)
                            <img src="{{ url('https://png.pngtree.com/png-clipart/20220605/ourmid/pngtree-timbangan-badan-analog-png-image_4865401.png') }}" class="card-img-top" alt="Product Image">
                        @elseif ($product->id == 2)
                            <img src="{{ url('https://png.pngtree.com/png-vector/20240130/ourlarge/pngtree-3d-wheel-chair-png-image_11573801.png') }}" class="card-img-top" alt="Product Image">
                        @else
                            <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" alt="Product Image" >
                        @endif
                        {{-- <img src="{{ url('https://e7.pngegg.com/pngimages/1016/374/png-clipart-measuring-scales-weight-watchers-conair-corporation-health-digital-scale-glass-measuring-scales.png') }}" class="card-img-top" alt="Product Image">
                        <img src="{{ url('https://png.pngtree.com/png-vector/20240130/ourlarge/pngtree-3d-wheel-chair-png-image_11573801.png') }}" class="card-img-top" alt="Product Image"> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">Price: Rp. {{ $product->price }}</p>
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-primary">Tambahkan ke keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
