<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    //
    public function index()
    {
        $gejalas = Gejala::paginate(10);
        return view('admin.gejala.index', compact('gejalas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gejala.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kode' => 'required|string|max:255|unique:gejalas',
            'bobot' => 'required|numeric',
        ]);

        Gejala::create($request->all());

        return redirect()->route('gejala.index')->with('success', 'Gejala created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gejala $gejala)
    {
        return view('admin.gejala.show', compact('gejala'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gejala $gejala)
    {
        return view('admin.gejala.edit', compact('gejala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gejala $gejala)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kode' => 'required|string|max:255|unique:gejalas,kode,' . $gejala->id,
            'bobot' => 'required|numeric',
        ]);

        $gejala->update($request->all());

        return redirect()->route('gejala.index')->with('success', 'Gejala updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gejala $gejala)
    {
        $gejala->delete();

        return redirect()->route('gejala.index')->with('success', 'Gejala deleted successfully');
    }
}
