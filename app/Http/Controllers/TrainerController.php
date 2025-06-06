<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trainers.create');
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

        $path = $request->file('image')->store('trainers', 'public');

        Trainer::create([
            'image' => $path,
            'description' => $request->description,
        ]);

        return redirect()->route('trainers.index')->with('success', 'Trainer added');
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
        $trainer = Trainer::findOrFail($id);
        return view('trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $trainer = Trainer::findOrFail($id);

        $request->validate([
            'description' => 'required|string',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($trainer->image);
            $trainer->image = $request->file('image')->store('trainers', 'public');
        }

        $trainer->description = $request->description;
        $trainer->save();

        return redirect()->route('trainers.index')->with('success', 'Trainer updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trainer = Trainer::findOrFail($id);
        Storage::disk('public')->delete($trainer->image);
        $trainer->delete();

        return redirect()->route('trainers.index')->with('success', 'Trainers deleted');
    }
}
