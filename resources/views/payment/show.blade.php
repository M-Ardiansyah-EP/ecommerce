@extends('layouts.home')

@section('content')
<div class="container">
    <div class="text-center mb-4">
        <h1>Detail Pembayaran</h1>
    </div>

    <div class="card mb-4 w-50 mx-auto">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>ID Pembayaran</th>
                    <td>{{ $payment->id }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $user->alamat }}</td>
                </tr>
                <tr>
                    <th>Nomor HP</th>
                    <td>{{ $user->nomor_hp }}</td>
                </tr>
                <tr>
                    <th>Paypal ID</th>
                    <td>{{ $user->paypal_id }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $payment->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card w-50 mx-auto bg-primary">
        <div class="card-body text-success">
            <h5 class="card-title text-center text-dark">Pembayaran Berhasil</h5>
        </div>
    </div>
</div>
@endsection
