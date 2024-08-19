<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    //
    public function index()
    {
        // Menggunakan scope untuk menampilkan hanya data yang belum diarsipkan
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
    // public function destroy(Gejala $gejala)
    // {
    //     $gejala->delete();

    //     return redirect()->route('gejala.index')->with('success', 'Gejala deleted successfully');
    // }

    // public function archiveIndex()
    // {
    //     dd('Archive Index called');
    //     // Mengambil data yang diarsipkan
    //     $gejalas = Gejala::where('is_archived', true)->paginate(10);
        
    //     return view('admin.gejala.archive', compact('gejalas'));
    // }

    public function archive($id)
    {
        $gejala = Gejala::find($id);
        if ($gejala) {
            $gejala->is_archived = true;
            $gejala->save();
            return redirect()->route('gejala.index')->with('success', 'Gejala berhasil diarsipkan.');
        }
        return redirect()->route('gejala.index')->with('error', 'Gejala tidak ditemukan.');
    }
    
    public function unarchive($id)
    {
        $gejala = Gejala::find($id);
        if ($gejala) {
            $gejala->is_archived = false;
            $gejala->save();
            return redirect()->route('gejala.index')->with('success', 'Gejala berhasil ditampilkan kembali.');
        }
        return redirect()->route('gejala.index')->with('error', 'Gejala tidak ditemukan.');
    }
    

}
