<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homes = Home::all();
        return view('admin.home.index', compact('homes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.home.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'photos' => 'nullable|image',
        ]);

        if ($request->hasFile('photos')) {
            $photoName = $request->file('photos')->store('homes', 'public');
        } else {
            $photoName = null;
        }

        Home::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'photos' => $photoName,
        ]);

        return redirect()->route('home.index')->with('success', 'Home added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.home.show', compact('home'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        return view('admin.home.edit', compact('home'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        $request->validate([
            'title' => 'sometimes|required',
            'subtitle' => 'sometimes|required',
            'description' => 'sometimes|required',
            'photos' => 'nullable|image',
        ]);

        $data = $request->only('title', 'subtitle', 'description');

        if ($request->hasFile('photos')) {
            if (!empty($home->photos)) {
                Storage::disk('public')->delete($home->photos);
            }

            $photoName = $request->file('photos')->store('homes', 'public');
            $data['photos'] = $photoName;
        }

        $home->update($data);

        return redirect()->route('home.index')->with('success', 'Data updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        Storage::disk('public')->delete($home->photos);
        $home->delete();

        return redirect()->route('home.index')->with('success', 'Data deleted successfully.');
    }
}
