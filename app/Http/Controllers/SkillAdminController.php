<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'photo' => 'nullable|image|mimes:svg,png,jpg',
        ]);

        if ($request->hasFile('photo')) {
            $photoName = $request->file('photo')->store('skills', 'public');
        } else {
            $photoName = null;
        }

        Skill::create([
            'title' => $request->title,
            'description' => $request->title,
            'photo' => $photoName,
        ]);

        return redirect()->route('skill.index')->with('success', 'Skill added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        return view('admin.skill.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('admin.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'photo' => 'nullable|image|mimes:svg,png,jpg',
        ]);

        $data = $request->only('title', 'description');

        if ($request->hasFile('photo')) {
            if (!empty($skill->photo)) {
                Storage::disk('public')->delete($skill->photo);
            }

            $photoName = $request->file('photo')->store('skills', 'public');
            $data['photo'] = $photoName;
        }

        $skill->update($data);

        return redirect()->route('skill.index')->with('success', 'Skill updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        Storage::disk('public')->delete($skill->photo);
        $skill->delete();

        return redirect()->route('skill.index')->with('success', 'Data deleted successfully');
    }
}
