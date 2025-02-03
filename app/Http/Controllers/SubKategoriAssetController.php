<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKategoriAsset;
use App\Models\KategoriAsset;

class SubKategoriAssetController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $subKategori = SubKategoriAsset::with(['kategoriAsset'])
        ->when($search, function ($query, $search) {
            $query->where('kode_sub_kategori_asset', 'LIKE', "%{$search}%")
            ->orWhere('sub_kategori_asset', 'LIKE', "%{$search}%")
                ->orWhereHas('kategoriAsset', function ($q) use ($search) {
                    $q->where('kategori_asset', 'LIKE', "%{$search}%");
                });
            
        })
        ->paginate(10);

    return view('admin.sub_kategori_asset.index', compact('subKategori'));
}
// user 
    public function Userindex(Request $request)
{
    $search = $request->input('search');

    $subKategori = SubKategoriAsset::with(['kategoriAsset'])
        ->when($search, function ($query, $search) {
            $query->where('kode_sub_kategori_asset', 'LIKE', "%{$search}%")
            ->orWhere('sub_kategori_asset', 'LIKE', "%{$search}%")
                ->orWhereHas('kategoriAsset', function ($q) use ($search) {
                    $q->where('kategori_asset', 'LIKE', "%{$search}%");
                });
            
        })
        ->paginate(10);

    return view('user.sub_kategori_asset.index', compact('subKategori'));
}


public function create()
{
    // Ambil semua data kategori asset
    $kategoriAssets = KategoriAsset::all();

    // Kirim data ke view
    return view('admin.sub_kategori_asset.create', compact('kategoriAssets'));
}

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori_asset' => 'required',
            'kode_sub_kategori_asset' => 'required|max:20',
            'sub_kategori_asset' => 'required|max:25',
        ]);

        SubKategoriAsset::create($request->all());
        return redirect()->route('sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // Ambil data sub kategori yang ingin diedit
        $subKategori = SubKategoriAsset::findOrFail($id);
    
        // Ambil semua kategori asset
        $kategoriAssets = KategoriAsset::all();
    
        // Kirim data ke view
        return view('admin.sub_kategori_asset.edit', compact('subKategori', 'kategoriAssets'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori_asset' => 'required',
            'kode_sub_kategori_asset' => 'required|max:20',
            'sub_kategori_asset' => 'required|max:25',
        ]);

        $sub_kategori_asset = SubKategoriAsset::findOrFail($id);
        $sub_kategori_asset->update($request->all());
        return redirect()->route('sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $sub_kategori_asset = SubKategoriAsset::findOrFail($id);
        $sub_kategori_asset->delete();
        return redirect()->route('sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil dihapus!');
    }
}
