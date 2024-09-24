<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $products = products::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'discounts' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath; // Add image path to validated data
        }

        // Create the product
        products::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function show($id)
    {
        $product = products::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = products::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'discounts' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = products::findOrFail($id);

        // Handle image update if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($product->image && Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath; // Add new image path to validated data
        }

        // Update the product with validated data
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = products::findOrFail($id);

        // Delete product image from storage if it exists
        if ($product->image && Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
