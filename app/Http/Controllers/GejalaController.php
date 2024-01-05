<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Penyakit;

class GejalaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
        return view('gejala.index', compact('gejala'));
    }

    public function create()
    {
        $penyakitList = Penyakit::all();
        return view('gejala.create', compact('penyakitList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_penyakit' => 'required',
            'gejala' => 'required',
        ]);

        Gejala::create($request->all());

        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil ditambahkan.');
    }

    public function show(Gejala $gejala)
    {
        return view('gejala.show', compact('gejala'));
    }

    public function edit(Gejala $gejala)
    {
        $penyakitList = Penyakit::all();
        return view('gejala.edit', compact('gejala', 'penyakitList'));
    }

    public function update(Request $request, Gejala $gejala)
    {
        $request->validate([
            'id_penyakit' => 'required',
            'gejala' => 'required',
        ]);

        $gejala->update($request->all());

        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil diperbarui.');
    }

    public function destroy(Gejala $gejala)
    {
        $gejala->delete();

        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil dihapus.');
    }
}
