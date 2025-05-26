<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        return response()->json([
            'message' => 'User profile fetched successfully',
            'user' => $request->user()
        ]);
    }
}
