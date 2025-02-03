<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Lokasi::query();
    
        // Jika ada parameter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('kode_lokasi', 'LIKE', "%{$search}%")
            ->orWhere('nama_lokasi', 'LIKE', "%{$search}%");
        }
    
        $lokasi = $query->paginate(10); // Data dipaginasi (10 per halaman)
        return view('admin.lokasi.index', compact('lokasi'));
    }

    public function Userindex(Request $request)
    {
        $query = Lokasi::query();
    
        // Jika ada parameter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('kode_lokasi', 'LIKE', "%{$search}%")
            ->orWhere('nama_lokasi', 'LIKE', "%{$search}%");
        }
    
        $lokasi = $query->paginate(10); // Data dipaginasi (10 per halaman)
        return view('user.lokasi.index', compact('lokasi'));
    }

    public function create()
    {
        return view('admin.lokasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_lokasi' => 'required|max:20',
            'nama_lokasi' => 'required|max:25',
            'keterangan' => 'nullable|max:50',
        ]);

        Lokasi::create($request->all());
        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('admin.lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_lokasi' => 'required|max:20',
            'nama_lokasi' => 'required|max:25',
            'keterangan' => 'nullable|max:50',
        ]);

        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update($request->all());
        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();
        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil dihapus.');
    }
}
