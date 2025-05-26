<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function createCar()
    {
        // Get all categories for dropdown
        $categories = Category::all();
        return view('addCar', compact('categories'));
    }

    public function createCar1(Request $request)
    {
        // Validate the request
        $request->validate([
            'Name' => ['required', 'string', 'max:255'],
            'Subtitle' => ['required', 'string', 'max:255'],
            'Passengers' => ['required', 'integer', 'min:1'],
            'Seats' => ['required', 'integer', 'min:1'],
            'Bags' => ['required', 'integer', 'min:0'],
            'Luggages' => ['required', 'integer', 'min:0'],
            'Price' => ['required', 'integer', 'min:0'],
            'Description' => ['required', 'string'],
            'Photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'CategoryId' => ['required', 'integer', 'exists:categories,id'],
            'CategoryName' => ['required', 'string', 'exists:categories,Name'] // Fixed validation
        ]);

        try {
            // Handle file upload
            $filename = $request->file('Photo')->getClientOriginalName();
            $request->file('Photo')->storeAs('public/cars', $filename);

            // Create car record
            Car::create([
                'Name' => $request->Name,
                'Subtitle' => $request->Subtitle,
                'Passengers' => (int) $request->Passengers, 
                'Seats' => (int) $request->Seats,           
                'Bags' => (int) $request->Bags,             
                'Luggages' => (int) $request->Luggages,     
                'Price' => (int) $request->Price,           
                'Description' => $request->Description,
                'Photo' => $filename,
                'CategoryId' => (int) $request->CategoryId,
                'CategoryName' => $request->CategoryName
            ]);

            return redirect('/cars')->with('success', 'Car added successfully!');
            
        } catch (\Exception $e) {
            return redirect()->back()
                   ->withInput()
                   ->withErrors(['error' => 'Failed to add car: ' . $e->getMessage()]);
        }
    }

    public function viewCars()
    {
        $cars = Car::with('category')->get(); // Load with category relationship
        return view('cars', compact('cars'));
    }

    public function viewAllCars(){
        $cars = Car::all();
        $categories = Category::all();
        return view('viewAllCars', compact('cars', 'categories'));
    }

    // Category-specific methods
    public function luxury()
    {
        $cars = Car::whereHas('category', function($query) {
            $query->where('Name', 'Luxury');
        })->get();
        return view('luxury', compact('cars'));
    }

    public function medium()
    {
        $cars = Car::whereHas('category', function($query) {
            $query->where('Name', 'Medium');
        })->get();
        return view('medium', compact('cars'));
    }

    public function family()
    {
        $cars = Car::whereHas('category', function($query) {
            $query->where('Name', 'Family');
        })->get();
        return view('family', compact('cars'));
    }

    public function electric()
    {
        $cars = Car::whereHas('category', function($query) {
            $query->where('Name', 'Electric');
        })->get();
        return view('electric', compact('cars'));
    }

    public function minibus()
    {
        $cars = Car::whereHas('category', function($query) {
            $query->where('Name', 'Minibus');
        })->get();
        return view('minibus', compact('cars'));
    }


    public function editCar($id){
        $car = Car::findOrFail($id);
        $categories = Category::all();
        return view('editCar', compact('car', 'categories'));
    }

    public function updateCar($id, Request $request) {
        $request->validate([
            'Name' => ['required', 'string', 'max:255'],
            'Subtitle' => ['required', 'string', 'max:255'],
            'Passengers' => ['required', 'integer', 'min:1'],
            'Seats' => ['required', 'integer', 'min:1'],
            'Bags' => ['required', 'integer', 'min:0'],
            'Luggages' => ['required', 'integer', 'min:0'],
            'Price' => ['required', 'integer', 'min:0'],
            'Description' => ['required', 'string'],
            'Photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Made optional
            'CategoryId' => ['required', 'integer', 'exists:categories,id'],
            'CategoryName' => ['required', 'string', 'exists:categories,Name'] // Fixed validation
        ]);

        $car = Car::findOrFail($id);
        
        // Prepare update data
        $updateData = [
            'Name' => $request->Name,
            'Subtitle' => $request->Subtitle,
            'Passengers' => (int) $request->Passengers, 
            'Seats' => (int) $request->Seats,           
            'Bags' => (int) $request->Bags,             
            'Luggages' => (int) $request->Luggages,     
            'Price' => (int) $request->Price,           
            'Description' => $request->Description,
            'CategoryId' => (int) $request->CategoryId,
            'CategoryName' => $request->CategoryName
        ];

        // Handle photo upload only if new photo is provided
        if ($request->hasFile('Photo')) {
            // Delete old photo if exists
            if ($car->Photo) {
                Storage::delete('public/cars/' . $car->Photo);
            }
            
            // Upload new photo
            $filename = $request->file('Photo')->getClientOriginalName();
            $request->file('Photo')->storeAs('public/cars', $filename);
            $updateData['Photo'] = $filename;
        }

        // Update car
        $car->update($updateData);

        return redirect('/cars')->with('success', 'Car updated successfully!');
    }
    
    public function deleteCar($id) {
        $car = Car::find($id);
        Car::destroy($id);
        Storage::delete('/public'.'/'.$car->Photo);
        return redirect('/cars');
    }
}