<?php

namespace App\Http\Controllers;

use App\Models\coffee;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(coffee::all(), 200);
    }

    
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'coffee_name' => 'required|string|max:255',
            'coffee_type' => 'required|string|max:255',
            'price' => 'required|integer|min:1',
        ]);

        // Create a new coffee record
        $coffee = Coffee::create($request->all());

        return response()->json([
            'message' => 'Coffee added successfully',
            'coffee' => $coffee
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'coffee_name' => 'sometimes|required|string|max:255',
            'coffee_type' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|integer|min:1',
        ]);

        $coffee = Coffee::find($id);

        if (!$coffee) {
            return response()->json(['message' => 'Coffee not found'], 404);
        }

        // Update the coffee record
        $coffee->update($request->all());

        return response()->json([
            'message' => 'Coffee updated successfully',
            'coffee' => $coffee
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coffee = Coffee::find($id);

        if (!$coffee) {
            return response()->json(['message' => 'Coffee not found'], 404);
        }

        $coffee->delete();

        return response()->json(['message' => 'Coffee deleted successfully'], 200);
    }
}
