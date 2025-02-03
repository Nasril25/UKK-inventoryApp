<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;

class DistributorController extends Controller
{
    public function index(Request $request)
    {
        $query = Distributor::query();
    
        // Jika ada parameter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama_distributor', 'LIKE', "%{$search}%")
            ->orWhere('alamat', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%");
        }
    
        $distributor = $query->paginate(10); // Data dipaginasi (10 per halaman)
        return view('admin.distributor.index', compact('distributor'));
    }

    public function Userindex(Request $request)
    {
        $query = Distributor::query();
    
        // Jika ada parameter pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama_distributor', 'LIKE', "%{$search}%")
            ->orWhere('alamat', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%");
        }
    
        $distributor = $query->paginate(10); // Data dipaginasi (10 per halaman)
        return view('user.distributor.index', compact('distributor'));
    }

    public function create()
    {
        return view('admin.distributor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_distributor' => 'required|max:50',
            'alamat' => 'required|max:50',
            'no_telp' => 'required|max:15',
            'email' => 'required|email|max:30',
            'keterangan' => 'nullable|max:45',
        ]);

        Distributor::create($request->all());
        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('admin.distributor.edit', compact('distributor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_distributor' => 'required|max:50',
            'alamat' => 'required|max:50',
            'no_telp' => 'required|max:15',
            'email' => 'required|email|max:30',
            'keterangan' => 'nullable|max:45',
        ]);

        $distributor = Distributor::findOrFail($id);
        $distributor->update($request->all());
        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil diupdate.');
    }

    public function destroy($id)
    {
        Distributor::findOrFail($id)->delete();
        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil dihapus.');
    }
}
