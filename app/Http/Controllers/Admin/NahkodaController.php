<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nahkoda;
use Illuminate\Http\Request;

class NahkodaController extends Controller
{
    public function index()
    {
        $nahkodas = Nahkoda::all();
        return view('admin.nahkodas.index', compact('nahkodas'));
    }

    public function create()
    {
        return view('admin.nahkodas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'pengalaman' => 'required|integer|min:0',
            'sertifikasi' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        Nahkoda::create([
            'nama' => $request->nama,
            'pengalaman' => $request->pengalaman,
            'sertifikasi' => $request->sertifikasi,
            'rating' => $request->rating ?? 0,
        ]);

        return redirect()->route('admin.nahkodas.index')->with('success', 'Data Nahkoda berhasil ditambahkan.');
    }

    public function edit(Nahkoda $nahkoda)
    {
        return view('admin.nahkodas.edit', compact('nahkoda'));
    }

    public function update(Request $request, Nahkoda $nahkoda)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'pengalaman' => 'required|integer|min:0',
            'sertifikasi' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        $nahkoda->update([
            'nama' => $request->nama,
            'pengalaman' => $request->pengalaman,
            'sertifikasi' => $request->sertifikasi,
            'rating' => $request->rating ?? 0,
        ]);

        return redirect()->route('admin.nahkodas.index')->with('success', 'Data Nahkoda berhasil diperbarui.');
    }

    public function destroy(Nahkoda $nahkoda)
    {
        $nahkoda->delete();
        return redirect()->route('admin.nahkodas.index')->with('success', 'Data Nahkoda berhasil dihapus.');
    }
}
