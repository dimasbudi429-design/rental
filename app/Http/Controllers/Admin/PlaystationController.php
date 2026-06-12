<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Playstation;

class PlaystationController extends Controller
{
    public function index()
    {
        $ps = Playstation::latest()->get();
        return view('admin.playstations.index', compact('ps'));
    }

    public function create()
    {
        return view('admin.playstations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price_per_hour' => 'required|numeric'
        ]);

        Playstation::create([
            'name' => $request->name,
            'type' => $request->type,
            'price_per_hour' => $request->price_per_hour,
            'status' => 'tersedia'
        ]);

        return redirect('/admin/playstations')
            ->with('success', 'PlayStation berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ps = Playstation::findOrFail($id);
        return view('admin.playstations.edit', compact('ps'));
    }

    public function update(Request $request, $id)
    {
        $ps = Playstation::findOrFail($id);

        $ps->update($request->all());

        return redirect('/admin/playstations')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Playstation::destroy($id);

        return back()->with('success', 'Data berhasil dihapus');
    }
}