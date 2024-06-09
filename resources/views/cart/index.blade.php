@extends('layouts.home')

@section('content')
    <div class="container">
        <h1>Keranjang</h1>
        
        <h2>Produk</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Gambar Produk</th>
                    <th>Produk</th>
                    <th>Harga</th>                
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>
                        @if ($product->id == 1)
                            <img src="{{ url('https://png.pngtree.com/png-clipart/20220605/ourmid/pngtree-timbangan-badan-analog-png-image_4865401.png') }}" class="card-img-top" alt="Product Image" style="width: 75px">
                        @elseif ($product->id == 2)
                            <img src="{{ url('https://png.pngtree.com/png-vector/20240130/ourlarge/pngtree-3d-wheel-chair-png-image_11573801.png') }}" class="card-img-top" alt="Product Image" style="width: 75px">
                        @else
                            <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" alt="Product Image" >
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>Rp. {{ $product->price }}</td>
                    <td>
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-primary">Tambahkan ke keranjang</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <h2>Item Keranjang</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $cartItem)
                <tr>
                    <td>{{ $cartItem->product->name }}</td>
                    <td>{{ $cartItem->quantity }}</td>
                    <td>
                        <form action="{{ route('cart.destroy', $cartItem) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus dari Keranjang</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tombol Bayar -->
        <div class="text-right">
            <a href="{{ route('payment.create') }}" class="btn btn-success">Bayar</a>
        </div>
    </div>
@endsection
