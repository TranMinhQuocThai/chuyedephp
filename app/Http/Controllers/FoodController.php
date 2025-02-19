<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function index() {
        $foods = Food::all();
        return view('food.index', compact('foods'));
    }

    public function create() {
        $food = new Food(); // Tạo một đối tượng trống để tránh lỗi

        return view('food.create', compact('food'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        Food::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'image' => $imagePath,
            'categories' => $validatedData['categories'],
        ]);
        return redirect()->route('food.index')->with('success', 'Thêm món ăn thành công.');
    }

    public function edit($id)
    {
        $food = Food::findOrFail($id);
        return view('food.edit', compact('food'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categories' => 'required|string',
        ]);

        $food = Food::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($food->image) {
                Storage::disk('public')->delete($food->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $food->image;
        }

        $food->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'image' => $imagePath,
            'categories' => $validatedData['categories'],
        ]);

        return redirect()->route('food.index')->with('success', 'Cập nhật món ăn thành công.');
    }

    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        if ($food->image) {
            Storage::disk('public')->delete($food->image);
        }
        $food->delete();

        return redirect()->route('food.index')->with('success', 'Xóa món ăn thành công.');
    }
}
