@extends('layouts.home')

@section('content')
<div class="container">
    <h2>Laporan Belanja Anda</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor HP</th>
                <th>Tanggal</th>
                <th>Paypal ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->alamat }}</td>
                <td>{{ $user->nomor_hp }}</td>
                <td>{{ \Carbon\Carbon::now()->format('d-m-Y') }}</td>
                <td>{{ $user->paypal_id }}</td>

            </tr>
        </tbody>
    </table>

    <h1>Pembayaran</h1>
    <h2>Item Keranjang</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $cartItem)
            <tr>
                <td>{{ $cartItem->product->name }}</td>
                <td>{{ $cartItem->quantity }}</td>
                <td>Rp. {{ $cartItem->product->price }}</td>
                <td>Rp. {{ $cartItem->product->price * $cartItem->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Total Harga: Rp. {{ $totalPayment }}</h2>

    <form action="{{ route('payment.store') }}" method="POST">
        @csrf
        <input type="hidden" name="amount" value="{{ $totalPayment }}">
        <button type="submit" class="btn btn-success">Bayar</button>
    </form>
</div>
@endsection
