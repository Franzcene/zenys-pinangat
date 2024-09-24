<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use App\Models\inventoryMaterial;
use App\Models\products;
use Illuminate\Http\Request;

class inventoryController extends Controller
{
    public function index()
    {
        $inventory = inventory::with('product')->get();
        return view('inventory.index', compact('materials'));
    }

    // Show form to create new inventory material
    public function create()
    {
        return view('inventory.create');
    }

    // Store a new inventory material
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
            'unit' => 'nullable|string|max:50',
        ]);

        InventoryMaterial::create($request->all());
        return redirect()->route('inventory.index')->with('success', 'Material added successfully.');
    }

    // Show form to edit inventory material
    public function edit(InventoryMaterial $inventoryMaterial)
    {
        return view('inventory.edit', compact('inventoryMaterial'));
    }

    // Update inventory material
    public function update(Request $request, InventoryMaterial $inventoryMaterial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
            'unit' => 'nullable|string|max:50',
        ]);

        $inventoryMaterial->update($request->all());
        return redirect()->route('inventory.index')->with('success', 'Material updated successfully.');
    }

    // Delete inventory material
    public function destroy(inventoryMaterial $inventoryMaterial)
    {
        $inventoryMaterial->delete();
        return redirect()->route('inventory.index')->with('success', 'Material deleted successfully.');
    }
}
