<?php

namespace App\Http\Controllers;

use App\Models\Depresiasi;
use Illuminate\Http\Request;

class DepresiasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Depresiasi::query();
        $bulan = $request->input('bulan', 1); // Default bulan ke-1
    
        // Jika ada parameter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('lama_depresiasi', 'LIKE', "%{$search}%");
        }
    
        $depresiasi = $query->paginate(10); // Data dipaginasi (10 per halaman)
        return view('admin.depresiasi.index', compact('depresiasi'));
    }

    public function Userindex(Request $request)
    {
        $query = Depresiasi::query();
    
        // Jika ada parameter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('lama_depresiasi', 'LIKE', "%{$search}%");
        }
    
        $depresiasi = $query->paginate(10); // Data dipaginasi (10 per halaman)
        return view('user.depresiasi.index', compact('depresiasi'));
    }

    public function create()
    {
        return view('admin.depresiasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lama_depresiasi' => 'required|integer',
            'keterangan' => 'nullable|string|max:100',
        ]);

        Depresiasi::create($request->all());

        return redirect()->route('depresiasi.index')->with('success', 'Depresiasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $depresiasi = Depresiasi::findOrFail($id);
        return view('admin.depresiasi.edit', compact('depresiasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'lama_depresiasi' => 'required|integer',
            'keterangan' => 'nullable|string|max:100',
        ]);

        $depresiasi = Depresiasi::findOrFail($id);
        $depresiasi->update($request->all());

        return redirect()->route('depresiasi.index')->with('success', 'Depresiasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Depresiasi::findOrFail($id)->delete();
        return redirect()->route('depresiasi.index')->with('success', 'Depresiasi berhasil dihapus.');
    }
}
