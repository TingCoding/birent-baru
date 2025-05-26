<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Rental;
use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function createTransaction($id)
    {
        try {
            // Ambil rental berdasarkan ID
            $rental = Rental::with(['user', 'car'])->findOrFail($id);
            
            // Pastikan user yang login adalah pemilik rental ini
            if ($rental->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'Unauthorized access');
            }

            $user = $rental->user;
            $car = $rental->car;

            // Hitung detail rental
            $startDate = Carbon::parse($rental->StartDate);
            $endDate = Carbon::parse($rental->EndDate);
            $rentalDays = $startDate->diffInDays($endDate);
            $totalPayment = $rentalDays * $car->Price;
            $rentalPeriod = "$rentalDays days (" . $startDate->toDateString() . " to " . $endDate->toDateString() . ")";
            
            // Generate transaction number
            $trNumber = 'TR' . rand(1000000000, 9999999999);

            return view('transaction', compact('user', 'rental', 'car', 'rentalDays', 'totalPayment', 'rentalPeriod', 'trNumber'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Rental not found or invalid');
        }
    }

    public function store(Request $request)
    {
        try {
            $rental = Rental::with(['user', 'car'])->findOrFail($request->rental_id);
            
            // Pastikan user yang login adalah pemilik rental ini
            if ($rental->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'Unauthorized access');
            }

            // Hitung detail
            $startDate = Carbon::parse($rental->StartDate);
            $endDate = Carbon::parse($rental->EndDate);
            $rentalDays = $startDate->diffInDays($endDate);
            $totalPayment = $rentalDays * $rental->car->Price;
            $rentalPeriod = "$rentalDays days (" . $startDate->toDateString() . " to " . $endDate->toDateString() . ")";

            // Buat transaction
            $transaction = Transaction::create([
                'user_id' => Auth::id(),
                'rental_id' => $rental->id,
                'transaction_number' => 'TR' . rand(1000000000, 9999999999),
                'rental_days' => $rentalDays,
                'total_payment' => $totalPayment,
                'rental_period' => $rentalPeriod,
                'status' => 'paid',
                'paid_at' => now()
            ]);

            // Update status rental
            $rental->update(['status' => 'confirmed']);

            return redirect()->route('transaction.create', ['id' => $rental->id])
                           ->with('success', 'Transaction processed successfully!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Transaction failed. Please try again.');
        }
    }
}