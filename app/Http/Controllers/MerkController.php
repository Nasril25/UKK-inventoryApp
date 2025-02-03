<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;

class MerkController extends Controller
{
    public function index(Request $request)
    {
        $query = Merk::query();
    
        // Jika ada parameter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('merk', 'LIKE', "%{$search}%");
        }
    
        $merk = $query->paginate(10); // Data dipaginasi (10 per halaman)
        return view('admin.merk.index', compact('merk'));
    }

    public function Userindex(Request $request)
    {
        $query = Merk::query();
    
        // Jika ada parameter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('merk', 'LIKE', "%{$search}%");
        }
    
        $merk = $query->paginate(10); // Data dipaginasi (10 per halaman)
        return view('user.merk.index', compact('merk'));
    }

    public function create()
    {
        return view('admin.merk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required|max:50',
            'keterangan' => 'nullable|max:50',
        ]);

        Merk::create($request->all());

        return redirect()->route('merk.index')->with('success', 'Merk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $merk = Merk::findOrFail($id);
        return view('admin.merk.edit', compact('merk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'merk' => 'required|max:50',
            'keterangan' => 'nullable|max:50',
        ]);

        $merk = Merk::findOrFail($id);
        $merk->update($request->all());

        return redirect()->route('merk.index')->with('success', 'Merk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $merk = Merk::findOrFail($id);
        $merk->delete();

        return redirect()->route('merk.index')->with('success', 'Merk berhasil dihapus.');
    }
}
