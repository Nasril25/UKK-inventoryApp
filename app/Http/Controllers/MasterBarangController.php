<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterBarang; // Model untuk tbl_master_barang

class MasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = MasterBarang::query();

        // Jika ada parameter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('kode_barang', 'LIKE', "%{$search}%")
                  ->orWhere('nama_barang', 'LIKE', "%{$search}%");
        }
        $barang = $query->paginate(10); // Data dipaginasi (10 per halaman)
        return view('admin.master_barang.index', compact('barang'));
    }

    public function Userindex(Request $request)
    {
        $query = MasterBarang::query();

        // Jika ada parameter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('kode_barang', 'LIKE', "%{$search}%")
                  ->orWhere('nama_barang', 'LIKE', "%{$search}%");
        }
        $barang = $query->paginate(10); // Data dipaginasi (10 per halaman)
        return view('user.master_barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master_barang.create'); // Return ke halaman create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:tbl_master_barang,kode_barang|max:20',
            'nama_barang' => 'required|max:100',
            'spesifikasi_teknis' => 'required|max:100',
        ]);

        MasterBarang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'spesifikasi_teknis' => $request->spesifikasi_teknis,
        ]);

        return redirect()->route('master_barang.index')->with('success', 'Data barang berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = MasterBarang::findOrFail($id); // Cari data berdasarkan ID
        return view('admin.master_barang.edit', compact('barang')); // Kirim data ke view edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required|max:20|unique:tbl_master_barang,kode_barang,' . $id . ',id_barang',
            'nama_barang' => 'required|max:100',
            'spesifikasi_teknis' => 'required|max:100',
        ]);

        $barang = MasterBarang::findOrFail($id);
        $barang->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'spesifikasi_teknis' => $request->spesifikasi_teknis,
        ]);

        return redirect()->route('master_barang.index')->with('success', 'Data barang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = MasterBarang::findOrFail($id);
        $barang->delete();

        return redirect()->route('master_barang.index')->with('success', 'Data barang berhasil dihapus!');
    }
}
