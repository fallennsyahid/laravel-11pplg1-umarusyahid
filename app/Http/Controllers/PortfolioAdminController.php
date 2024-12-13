<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\fileExists;

class PortfolioAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'nullable',
            'picture' => 'nullable|image',
        ]);

        $pictureName = $request->file('picture')->store('portfolios', 'public');

        Portfolio::create([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'picture' => $pictureName,
        ]);

        return redirect()->route('portfolio.index')->with('success', 'Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'nullable',
            'picture' => 'nullable',
        ]);

        if ($request->hasFile('picture')) {
            Storage::disk('public')->delete($portfolio->picture);

            $pictureName = $request->file('picture')->store('portfolios', 'public');
            $portfolio->picture = $pictureName;
        }

        $portfolio->update($request->only('title', 'description', 'link'));

        return redirect()->route('portfolio.index')->with('success', 'Portfolio added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        Storage::disk('public')->delete($portfolio->picture);
        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('success', 'Data deleted successfully');
    }
}
