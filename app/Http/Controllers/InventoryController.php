<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvetoryItemRequest;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvetoryItemRequest $request)
    {
        //
        $validated = $request->validated();

        // Create inventory linked to current user
        auth()->user()->inventories()->create($validated);

        return redirect()->route('dashboard')->with('success', 'Item added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        //
        return view('inventory.edit', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
        $inventory = Inventory::findOrFail($inventory->id);

        if ($inventory->user_id !== auth()->id()) {
            abort(403);
        }

        $inventory->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'unit' => 'required|string|max:50',
        ]));

        return redirect()->route('dashboard')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);

        // Optional: Check ownership
        if ($inventory->user_id !== auth()->id()) {
            abort(403); // Forbidden
        }

        $inventory->delete();

        return redirect()->route('dashboard')->with('success', 'Item deleted.');
    }
}
