<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::all();
        $profile = Profile::first();
        return view('portfolio.index', compact('portofolios', 'profile'));
    }

    public function create()
    {
        return view('portfolio.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'teknologi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('portofolio', 'public');
        }

        Portofolio::create($data);

        return redirect()->route('portofolio.index')
            ->with('success', 'Portofolio berhasil ditambahkan.');
    }

    public function show(Portofolio $portofolio)
    {
        return view('portfolio.show', compact('portofolio'));
    }

    public function edit(Portofolio $portofolio)
    {
        return view('portfolio.edit', compact('portofolio'));
    }

    public function update(Request $request, Portofolio $portofolio)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'teknologi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'hapus_gambar' => 'nullable|boolean',
        ]);

        unset($data['hapus_gambar']);

        if ($request->hasFile('gambar')) {
            if ($portofolio->gambar) {
                Storage::disk('public')->delete($portofolio->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('portofolio', 'public');
        } elseif ($request->boolean('hapus_gambar')) {
            if ($portofolio->gambar) {
                Storage::disk('public')->delete($portofolio->gambar);
            }

            $data['gambar'] = null;
        }

        $portofolio->update($data);

        return redirect()->route('portofolio.index')
            ->with('success', 'Portofolio berhasil diperbarui.');
    }

    public function destroy(Portofolio $portofolio)
    {
        if ($portofolio->gambar) {
            Storage::disk('public')->delete($portofolio->gambar);
        }

        $portofolio->delete();

        return redirect()->route('portofolio.index')
            ->with('success', 'Portofolio berhasil dihapus.');
    }
}
