<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index(Request $request)
    {
        $query = Satuan::query();
    
        // Jika ada parameter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('satuan', 'LIKE', "%{$search}%");
                  
        }
    
        $satuan = $query->paginate(10); // Data dipaginasi (10 per halaman)
        return view('admin.satuan.index', compact('satuan'));
    }

    public function Userindex(Request $request)
    {
        $query = Satuan::query();
    
        // Jika ada parameter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('satuan', 'LIKE', "%{$search}%");
                  
        }
    
        $satuan = $query->paginate(10); // Data dipaginasi (10 per halaman)
        return view('user.satuan.index', compact('satuan'));
    }

    public function create()
    {
        return view('admin.satuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'satuan' => 'required|max:20',
        ]);

        Satuan::create($request->all());
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('admin.satuan.edit', compact('satuan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'satuan' => 'required|max:20',
        ]);

        $satuan = Satuan::findOrFail($id);
        $satuan->update($request->all());
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil dihapus.');
    }
}
