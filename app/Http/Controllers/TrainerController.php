<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Models\Specialization;
use App\Models\TrainingPackage;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Trainer::with(['specializations', 'trainingPackages', 'achievements'])->get();
        return view('trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations = Specialization::all();
        return view('trainers.create', compact('specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'required|image',
            'description' => 'required|string',
            'type' => 'required|in:freelance,inhouse',
            'instagram_link' => 'nullable|url',
            'whatsapp_link' => 'nullable|string',
            'specializations_title' => 'nullable|string',
            'specializations' => 'array',
            'specializations.*' => 'exists:specializations,id',
            'new_specializations' => 'array',
            'new_specializations.*' => 'nullable|string',
            'packages' => 'required|array|min:1',
            'packages.*.sessions' => 'required|string',
            'packages.*.duration' => 'required|string',
            'packages.*.price' => 'required|string',
            'packages.*.sessions_count' => 'required|integer|min:1',
            'packages.*.price_numeric' => 'required|numeric|min:0',
            'achievements' => 'array',
            'achievements.*' => 'nullable|string',
        ]);

        $path = $request->file('image')->store('images', 'public');

        $trainer = Trainer::create([
            'name' => $request->name,
            'role' => $request->role,
            'image' => $path,
            'description' => $request->description,
            'type' => $request->type,
            'instagram_link' => $request->instagram_link,
            'whatsapp_link' => $request->whatsapp_link,
            'specializations_title' => $request->specializations_title,
        ]);

        // Handle specializations
        $specializationIds = [];

        // Existing specializations
        if ($request->has('specializations')) {
            $specializationIds = array_merge($specializationIds, $request->specializations);
        }

        // New specializations
        if ($request->has('new_specializations')) {
            foreach ($request->new_specializations as $newSpec) {
                if (!empty(trim($newSpec))) {
                    $specialization = Specialization::create(['name' => trim($newSpec)]);
                    $specializationIds[] = $specialization->id;
                }
            }
        }

        $trainer->specializations()->attach($specializationIds);

        // Create training packages
        foreach ($request->packages as $package) {
            $trainer->trainingPackages()->create($package);
        }

        // Create achievements
        if ($request->has('achievements')) {
            foreach ($request->achievements as $achievement) {
                if (!empty(trim($achievement))) {
                    $trainer->achievements()->create(['title' => trim($achievement)]);
                }
            }
        }

        return redirect()->route('trainers.index')->with('success', 'Trainer added successfully');
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
        $trainer = Trainer::with(['specializations', 'trainingPackages', 'achievements'])->findOrFail($id);
        $specializations = Specialization::all();
        return view('trainers.edit', compact('trainer', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $trainer = Trainer::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:freelance,inhouse',
            'image' => 'nullable|image',
            'instagram_link' => 'nullable|url',
            'whatsapp_link' => 'nullable|string',
            'specializations_title' => 'nullable|string',
            'specializations' => 'array',
            'specializations.*' => 'exists:specializations,id',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($trainer->image);
            $trainer->image = $request->file('image')->store('trainers', 'public');
        }

        $trainer->update([
            'name' => $request->name,
            'role' => $request->role,
            'description' => $request->description,
            'type' => $request->type,
            'instagram_link' => $request->instagram_link,
            'whatsapp_link' => $request->whatsapp_link,
            'specializations_title' => $request->specializations_title,
        ]);

        // Sync specializations
        $trainer->specializations()->sync($request->specializations ?? []);

        return redirect()->route('trainers.index')->with('success', 'Trainer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trainer = Trainer::findOrFail($id);
        Storage::disk('public')->delete($trainer->image);
        $trainer->delete();

        return redirect()->route('trainers.index')->with('success', 'Trainer deleted successfully');
    }

    // Method untuk mengambil data sesuai format frontend
    public function getTrainersForFrontend()
    {
        $trainers = Trainer::with(['specializations', 'trainingPackages', 'achievements'])->get();

        return $trainers->map(function ($trainer) {
            return $trainer->formatted_data;
        });
    }
}
