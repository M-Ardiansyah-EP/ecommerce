<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;

class PaymentController extends Controller
{
    public function create()
    {
        // Mengambil semua item keranjang
        $cartItems = Cart::with('product')->get();
        // Menghitung total pembayaran
        $totalPayment = 0;
        foreach ($cartItems as $cartItem) {
            $totalPayment += $cartItem->product->price * $cartItem->quantity;
        }
        $user = Auth::user();
        return view('payment.create', compact('cartItems', 'totalPayment', 'user'));
    }

    // Proses pembayaran
    public function store(Request $request)
    {
        // Validasi pembayaran
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        // Simpan pembayaran ke dalam database
        $payment= Payment::create([
            'amount' => $request->amount,
            'user_id' => Auth::id(),
        ]);

        // Hapus item keranjang karena sudah dibayar
        Cart::truncate();

        return redirect()->route('payment.show', ['payment' => $payment->id])->with('success', 'Pembayaran berhasil.');
    }

    public function show(Payment $payment)
    {
        // Mengambil data pengguna yang terkait dengan pembayaran ini
        $user = Auth::user();
        
        // // Mengambil item cart yang terkait dengan pembayaran ini
        // $cartItems = $payment->Cart::with('product')->get(); 
        // // Menghitung total pembayaran
        // $totalPayment = $cartItems->sum(function($cartItem) {
        //     return $cartItem->product->price * $cartItem->quantity;
        // });

        // Mengirim data ke view
        return view('payment.show', compact('payment', 'user'));
    }

    // public function generatePdf()
    // {
    //     $mpdf = new \Mpdf\Mpdf();
    //     $mpdf->WriteHTML('<h1>Hello world!</h1>'); 
    //     $mpdf->Output();
    // }


}
