<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FruitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Fruit::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('nutrition', 'like', "%{$search}%")
                    ->orWhere('benefits', 'like', "%{$search}%");
            });
        }

        $fruits = $query->latest()->get();

        return view('fruits.index', compact('fruits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fruits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nutrition' => 'required|string',
            'benefits' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('fruits', 'public');
        }
        \App\Models\Fruit::create($validated);
        return redirect()->route('fruits.index')->with('success', 'Berhasil Ditambahkan');
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
    public function edit(Fruit $fruit)
    {
        return view('fruits.edit', compact('fruit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fruit $fruit)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nutrition' => 'required|string',
            'benefits' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada
            if ($fruit->image) {
                Storage::disk('public')->delete($fruit->image);
            }
            // Simpan foto baru
            $validated['image'] = $request->file('image')->store('fruits', 'public');
        }

        $fruit->update($validated);

        return redirect()->route('fruits.index')->with('success', 'Data buah berhasil diupdate.');
    }

    public function destroy(Fruit $fruit)
    {
        if ($fruit->image) {
            Storage::disk('public')->delete($fruit->image);
        }

        $fruit->delete();

        return redirect()->route('fruits.index')->with('success', 'Data buah berhasil dihapus.');
    }

    // Controller
    public function print()
    {
        $fruits = Fruit::all();
        return view('fruits.print', compact('fruits'));
    }
}
