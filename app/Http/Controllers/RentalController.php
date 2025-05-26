<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RentalController extends Controller
{
    public function createOrder($carId = null){
        $car = null;
        if ($carId) {
            $car = Car::findOrFail($carId);
        }
        return view('rental', compact('car'));
    }

    public function createOrder1(Request $request){
        try {
            // Debug: Log semua data yang diterima
            Log::info('Rental form data:', $request->all());
            
            // Cek apakah user sudah login
            if (!Auth::check()) {
                return redirect()->route('login')->with('error', 'Please login first');
            }

            $request->validate([
                'car_id' => ['required', 'exists:cars,id'],
                'PhoneNumber' => ['required', 'string', 'max:255'],
                'Address' => ['required', 'string', 'max:255'],
                'StartDate' => ['required', 'date', 'after_or_equal:today'],
                'EndDate' => ['required', 'date', 'after:StartDate'],
                'IDCard' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                'DriverLicense' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ]);

            // Simpan file dengan nama unik
            $idCardName = time() . '_idcard_' . $request->file('IDCard')->getClientOriginalName();
            $licenseName = time() . '_license_' . $request->file('DriverLicense')->getClientOriginalName();
            
            $idCardPath = $request->file('IDCard')->storeAs('public/IDCard', $idCardName);
            $licensePath = $request->file('DriverLicense')->storeAs('public/DriverLicense', $licenseName);

            // Buat rental baru
            $rental = Rental::create([
                'user_id' => Auth::id(),
                'car_id' => $request->car_id,
                'PhoneNumber' => $request->PhoneNumber,
                'Address' => $request->Address,
                'StartDate' => $request->StartDate,
                'EndDate' => $request->EndDate,
                'IDCard' => $idCardName,
                'DriverLicense' => $licenseName,
                'status' => 'pending'
            ]);

            Log::info('Rental created successfully:', ['rental_id' => $rental->id]);

            // Redirect ke halaman transaction dengan rental ID
            return redirect()->route('transaction.create', ['id' => $rental->id])
                            ->with('success', 'Rental created successfully!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error:', $e->errors());
            return redirect()->back()
                           ->withErrors($e->errors())
                           ->withInput();
        } catch (\Exception $e) {
            Log::error('Rental creation error:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()
                           ->with('error', 'Failed to create rental: ' . $e->getMessage())
                           ->withInput();
        }
    }
}