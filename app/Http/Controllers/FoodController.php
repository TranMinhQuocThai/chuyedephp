<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index() {
        return Food::all();
    }

    public function show($id) {
        return Food::findOrFail($id);
    }

    public function store(Request $request) {
        $food = Food::create($request->all());
        return response()->json($food, 201);
    }

    public function update(Request $request, $id) {
        $food = Food::findOrFail($id);
        $food->update($request->all());
        return response()->json($food, 200);
    }

    public function destroy($id) {
        Food::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
