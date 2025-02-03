<?php

namespace App\Http\Controllers;

use App\Models\MutasiLokasi;
use App\Models\Lokasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class MutasiLokasiController extends Controller
{
    // Menampilkan list data
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $mutasiLokasi = MutasiLokasi::with(['lokasi', 'pengadaan'])
            ->when($search, function ($query, $search) {
                    $query->WhereHas('lokasi', function ($q) use ($search) {
                        $q->where('nama_lokasi', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('pengadaan', function ($q) use ($search) {
                        $q->where('kode_pengadaan', 'LIKE', "%{$search}%");
                    });
                
            })
            ->paginate(10);
    
        return view('admin.mutasi_lokasi.index', compact('mutasiLokasi'));
    }

    public function Userindex(Request $request)
    {
        $search = $request->input('search');
    
        $mutasiLokasi = MutasiLokasi::with(['lokasi', 'pengadaan'])
            ->when($search, function ($query, $search) {
                    $query->WhereHas('lokasi', function ($q) use ($search) {
                        $q->where('nama_lokasi', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('pengadaan', function ($q) use ($search) {
                        $q->where('kode_pengadaan', 'LIKE', "%{$search}%");
                    });
                
            })
            ->paginate(10);
    
        return view('user.mutasi_lokasi.index', compact('mutasiLokasi'));
    }

    // Menampilkan form create
    public function create()
    {
        $lokasi = Lokasi::all();
        $pengadaan = Pengadaan::all();
        return view('admin.mutasi_lokasi.create', compact('lokasi', 'pengadaan'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'id_lokasi' => 'required|exists:tbl_lokasi,id_lokasi',
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'flag_lokasi' => 'required|string|max:45',
            'flag_pindah' => 'required|string|max:45',
        ]);

        MutasiLokasi::create($request->all());

        return redirect()->route('mutasi_lokasi.index')->with('success', 'Mutasi Lokasi berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit(MutasiLokasi $mutasiLokasi)
    {
        $lokasi = Lokasi::all();
        $pengadaan = Pengadaan::all();
        return view('admin.mutasi_lokasi.edit', compact('mutasiLokasi', 'lokasi', 'pengadaan'));
    }

    // Mengupdate data
    public function update(Request $request, MutasiLokasi $mutasiLokasi)
    {
        $request->validate([
            'id_lokasi' => 'required|exists:tbl_lokasi,id_lokasi',
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'flag_lokasi' => 'required|string|max:45',
            'flag_pindah' => 'required|string|max:45',
        ]);

        $mutasiLokasi->update($request->all());

        return redirect()->route('mutasi_lokasi.index')->with('success', 'Mutasi Lokasi berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy(MutasiLokasi $mutasiLokasi)
    {
        $mutasiLokasi->delete();
        return redirect()->route('mutasi_lokasi.index')->with('success', 'Mutasi Lokasi berhasil dihapus.');
    }
}
