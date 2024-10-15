<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Registration;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function showPaymentPage($eventId)
    {
        $event = Event::findOrFail($eventId);

        return view('pages-user.bayar', compact('event'));
    }

    public function processPayment(Request $request, $eventId)
    {
        $userId = auth()->id();
        $event = Event::findOrFail($eventId);
    
        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.is_sanitized');
        Config::$is3ds = config('services.midtrans.is_3ds');
    
        // Parameter untuk Snap API
        $params = [
            'transaction_details' => [
                'order_id' => 'EVENT-' . uniqid(),
                'gross_amount' => $event->harga,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
            'item_details' => [
                [
                    'id' => $event->id,
                    'price' => $event->harga,
                    'quantity' => 1,
                    'name' => $event->judul_event,
                ]
            ],
        ];
    
        try {
            // Mendapatkan Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($params);
    
            // Simpan data pembayaran di database
            $payment = Payment::create([
                'user_id' => $userId,
                'event_id' => $eventId,
                'order_id' => $params['transaction_details']['order_id'],
                'amount' => $event->harga,
                'payment_type' => 'qris',
                'transaction_status' => 'pending',
                'snap_token' => $snapToken,
            ]);
    
            return response()->json([
                'success' => true,
                'snap_token' => $snapToken,
                'message' => 'Berhasil mendaftar event.',
                'payment_status' => $payment->transaction_status,
            ]);
    
        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan saat memproses pembayaran: ' . $e->getMessage()], 500);
        }
    }    

    public function handleNotification(Request $request)
    {
        $notif = new \Midtrans\Notification();

        $orderId = $notif->order_id;
        $transactionStatus = $notif->transaction_status;

        $payment = Payment::where('order_id', $orderId)->first();

        if (!$payment) {
            return response()->json(['message' => 'Payment not found.'], 404);
        }

        if ($transactionStatus == 'settlement') {
            // Pembayaran berhasil
            $payment->transaction_status = 'success';
            $payment->save();

            // Update status registrasi user
            $registration = Registration::where('user_id', $payment->user_id)
                                        ->where('event_id', $payment->event_id)
                                        ->first();
            if ($registration) {
                $registration->status = 'registered';
                $registration->save();
            }

            // Kembali dengan status berhasil
            return response()->json(['message' => 'Payment successful, user registered.'], 200);

        } elseif (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
            // Pembayaran gagal atau dibatalkan
            $payment->transaction_status = 'failed';
            $payment->save();

            return response()->json(['message' => 'Payment failed or expired.'], 200);
        } else {
            // Status pembayaran lainnya
            return response()->json(['message' => 'Payment pending.'], 200);
        }
    }


    // public function checkPaymentStatus($orderId)
    // {
    //     try {
    //         // Konfigurasi Midtrans
    //         Config::$serverKey = config('services.midtrans.server_key');
    //         Config::$isProduction = config('services.midtrans.is_production');

    //         $status = \Midtrans\Transaction::status($orderId);

    //         return response()->json(['transaction_status' => $status->transaction_status]);
    //     } catch (\Exception $e) {
    //         Log::error('Payment status check error: ' . $e->getMessage());
    //         return response()->json(['error' => 'Terjadi kesalahan saat memeriksa status pembayaran.'], 500);
    //     }
    // }

    // public function handleCallback(Request $request)
    // {
    //     $data = $request->all();
        
    //     $orderId = $data['order_id'];
    //     $transactionStatus = $data['transaction_status'];
        
    //     $payment = Payment::where('order_id', $orderId)->first();
        
    //     if ($payment) {
    //         $payment->transaction_status = $transactionStatus;
    //         $payment->save();
            
    //         // Jika sukses, Anda bisa mengirimkan notifikasi atau mengarahkan pengguna.
    //     }
    // }

}
