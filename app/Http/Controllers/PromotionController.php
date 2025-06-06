<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view('promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'description' => 'required|string',
        ]);

        $path = $request->file('image')->store('promotions', 'public');

        Promotion::create([
            'image' => $path,
            'description' => $request->description,
        ]);

        return redirect()->route('promotions.index')->with('success', 'Promotion added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $promotion = Promotion::findOrFail($id);

        $request->validate([
            'description' => 'required|string',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($promotion->image);
            $promotion->image = $request->file('image')->store('promotions', 'public');
        }

        $promotion->description = $request->description;
        $promotion->save();

        return redirect()->route('promotions.index')->with('success', 'Promotion updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promotion = Promotion::findOrFail($id);
        Storage::disk('public')->delete($promotion->image);
        $promotion->delete();

        return redirect()->route('promotions.index')->with('success', 'Promotion deleted');
    }
}
