<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        try {
            // Simpan data ke database
            About::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return redirect()->route('about.index')->with('success', 'Data added successfully');
        } catch (\Exception $e) {
            return redirect()->route('about.index')->with('error', 'Data failed added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('admin.about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        // Validasi input menggunakan sometimes
        $request->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
        ]);

        // Update hanya field yang tersedia dalam request
        $about->update($request->only(['title', 'description']));

        return redirect()->route('about.index')->with('success', 'Data updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about->delete();

        return redirect()->route('about.index')->with('success', 'Data deleted successfully');
    }
}
