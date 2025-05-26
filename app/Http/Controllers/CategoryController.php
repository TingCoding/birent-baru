<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Method untuk menampilkan form add category
    public function add(){
        return view('addCarCategory');
    }

    // Method untuk memproses form submission
    public function store(Request $request){
        $request->validate([
            'Name' => ['required', 'string', 'max:255']
            // 'Passengers' => ['required', 'string'],
            // 'Seats' => ['required', 'string'],
            // 'Bags' => ['required', 'integer', 'min:0'],
            // 'Luggages' => ['required', 'integer', 'min:0'],
            // 'Photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        try {
            // Handle file upload
            // $filename = $request->file('Photo')->getClientOriginalName();
            // $request->file('Photo')->storeAs('public/categories', $filename);

            // Create category
            Category::create([
                'Name' => $request->Name
                // 'Passengers' => $request->Passengers,
                // 'Seats' => $request->Seats,
                // 'Bags' => $request->Bags,
                // 'Luggages' => $request->Luggages,
                // 'Photo' => $filename
            ]);

            return redirect('/cars')->with('success', 'Category added successfully!');
            
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to add category. Please try again.']);
        }
    }

    // Jika ingin tetap menggunakan method add1, ganti nama method store menjadi add1
    // public function add1(Request $request) { ... }
}