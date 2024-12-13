<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::all();
        return view('admin.certificate.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.certificate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'sometimes|required',
            'issued_by' => 'sometimes|required',
            'description' => 'sometimes|required',
            'date' => 'sometimes|required',
            'picture' => 'nullable|image',
        ]);

        if ($request->hasFile('picture')) {
            $pictureName = $request->file('picture')->store('certificates', 'public');
        } else {
            $pictureName = null;
        }

        Certificate::create([
            'title' => $request->title,
            'issued_by' => $request->issued_by,
            'description' => $request->description,
            'date' => $request->date,
            'picture' => $pictureName,
        ]);

        return redirect()->route('certificate.index')->with('success', 'Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        return view('admin.certificate.show', compact('certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        return view('admin.certificate.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'title' => 'sometimes|required',
            'issued_by' => 'sometimes|required',
            'description' => 'sometimes|required',
            'date' => 'sometimes|required',
            'picture' => 'nullable',
        ]);

        $data = $request->only('title', 'issued_by', 'description', 'date');

        if ($request->hasFile('picture')) {
            if (!empty($certificate->picture)) {
                Storage::disk('public')->delete($certificate->picture);
            }

            $pictureName = $request->file('picture')->store('certificates', 'public');
            $data['picture'] = $pictureName;
        }

        $certificate->update($data);

        return redirect()->route('certificate.index')->with('success', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        Storage::disk('public')->delete($certificate->picture);
        $certificate->delete();

        return redirect()->route('certificate.index')->with('success', 'Data deleted successfully');
    }
}
