<?php

namespace App\Http\Controllers;

use App\Models\KategoriAsset;
use Illuminate\Http\Request;

class KategoriAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = KategoriAsset::query();
    
        // Jika ada parameter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('kode_kategori_asset', 'LIKE', "%{$search}%")
            ->orWhere('kategori_asset', 'LIKE', "%{$search}%");
        }
    
        $kategori_asset = $query->paginate(10); // Data dipaginasi (10 per halaman)
        return view('admin.kategori_asset.index', compact('kategori_asset'));
    }

    public function Userindex(Request $request)
    {
        $query = KategoriAsset::query();
    
        // Jika ada parameter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('kode_kategori_asset', 'LIKE', "%{$search}%")
            ->orWhere('kategori_asset', 'LIKE', "%{$search}%");
        }
    
        $kategori_asset = $query->paginate(10); // Data dipaginasi (10 per halaman)
        return view('user.kategori_asset.index', compact('kategori_asset'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori_asset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kategori_asset' => 'required|string|max:20',
            'kategori_asset' => 'required|string|max:25',
        ]);

        KategoriAsset::create($request->all());
        return redirect()->route('kategori_asset.index')->with('success', 'Kategori Asset berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori_asset = KategoriAsset::findOrFail($id);
        return view('admin.kategori_asset.edit', compact('kategori_asset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kategori_asset' => 'required|string|max:20',
            'kategori_asset' => 'required|string|max:25',
        ]);

        $kategori_asset = KategoriAsset::findOrFail($id);
        $kategori_asset->update($request->all());

        return redirect()->route('kategori_asset.index')->with('success', 'Kategori Asset berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $kategori_asset = KategoriAsset::find($id);

    if (!$kategori_asset) {
        return redirect()->route('kategori_asset.index')->with('error', 'Kategori Asset tidak ditemukan.');
    }

    $kategori_asset->delete();
    return redirect()->route('kategori_asset.index')->with('success', 'Kategori Asset berhasil dihapus.');
}

}
