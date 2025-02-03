<?php

namespace App\Http\Controllers;

use App\Models\HitungDepresiasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class HitungDepresiasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $hitungDepresiasi = HitungDepresiasi::with(['pengadaan'])
            ->when($search, function ($query, $search) {
                $query->where('bulan', 'LIKE', "%{$search}%")
                ->orWhere('durasi', 'LIKE', "%{$search}%")
                ->orWhere('nilai_barang', 'LIKE', "%{$search}%")
                ->orWhere('tgl_hitung_depresiasi', 'LIKE', "%{$search}%")
                    ->orWhereHas('pengadaan', function ($q) use ($search) {
                        $q->where('kode_pengadaan', 'LIKE', "%{$search}%");
                    });
                
            })
            ->paginate(10);

        return view('admin.hitung_depresiasi.index', compact('hitungDepresiasi'));
    }

    public function Userindex(Request $request)
    {
        $search = $request->input('search');

        $hitungDepresiasi = HitungDepresiasi::with(['pengadaan'])
            ->when($search, function ($query, $search) {
                $query->where('bulan', 'LIKE', "%{$search}%")
                ->orWhere('durasi', 'LIKE', "%{$search}%")
                ->orWhere('nilai_barang', 'LIKE', "%{$search}%")
                ->orWhere('tgl_hitung_depresiasi', 'LIKE', "%{$search}%")
                    ->orWhereHas('pengadaan', function ($q) use ($search) {
                        $q->where('kode_pengadaan', 'LIKE', "%{$search}%");
                    });
                
            })
            ->paginate(10);

        return view('user.hitung_depresiasi.index', compact('hitungDepresiasi'));
    }

    public function create()
    {
        $pengadaan = Pengadaan::all();
        return view('admin.hitung_depresiasi.create', compact('pengadaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pengadaan' => 'required',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|string|max:10',
            'durasi' => 'required|integer',
        ]);

        $pengadaan = Pengadaan::findOrFail($request->id_pengadaan);
        $nilaiBarang = $pengadaan->harga_barang - ((int)$request->bulan * ($pengadaan->harga_barang / $request->durasi));

        HitungDepresiasi::create(array_merge($request->all(), ['nilai_barang' => $nilaiBarang]));
        return redirect()->route('hitung_depresiasi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $hitungDepresiasi = HitungDepresiasi::findOrFail($id);
        $pengadaan = Pengadaan::all();
        return view('admin.hitung_depresiasi.edit', compact('hitungDepresiasi', 'pengadaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pengadaan' => 'required',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|string|max:10',
            'durasi' => 'required|integer',
        ]);

        $hitungDepresiasi = HitungDepresiasi::findOrFail($id);
        $pengadaan = Pengadaan::findOrFail($request->id_pengadaan);
        $nilaiBarang = $pengadaan->harga_barang - ((int)$request->bulan * ($pengadaan->harga_barang / $request->durasi));

        $hitungDepresiasi->update(array_merge($request->all(), ['nilai_barang' => $nilaiBarang]));
        return redirect()->route('hitung_depresiasi.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        $hitungDepresiasi = HitungDepresiasi::findOrFail($id);
        $hitungDepresiasi->delete();
        return redirect()->route('hitung_depresiasi.index')->with('success', 'Data berhasil dihapus.');
    }

    public function show($id)
    {
        $hitungDepresiasi = HitungDepresiasi::findOrFail($id);
        return view('admin.hitung_depresiasi.show', compact('hitungDepresiasi'));
    }

    public function Usercreate()
    {
        $pengadaan = Pengadaan::all();
        return view('user.hitung_depresiasi.create', compact('pengadaan'));
    }

    public function Userstore(Request $request)
    {
        $request->validate([
            'id_pengadaan' => 'required',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|string|max:10',
            'durasi' => 'required|integer',
        ]);

        $pengadaan = Pengadaan::findOrFail($request->id_pengadaan);
        $nilaiBarang = $pengadaan->harga_barang - ((int)$request->bulan * ($pengadaan->harga_barang / $request->durasi));

        HitungDepresiasi::create(array_merge($request->all(), ['nilai_barang' => $nilaiBarang]));
        return redirect()->route('user.hitung_depresiasi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function Useredit($id)
    {
        $hitungDepresiasi = HitungDepresiasi::findOrFail($id);
        $pengadaan = Pengadaan::all();
        return view('user.hitung_depresiasi.edit', compact('hitungDepresiasi', 'pengadaan'));
    }

    public function Userupdate(Request $request, $id)
    {
        $request->validate([
            'id_pengadaan' => 'required',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|string|max:10',
            'durasi' => 'required|integer',
        ]);

        $hitungDepresiasi = HitungDepresiasi::findOrFail($id);
        $pengadaan = Pengadaan::findOrFail($request->id_pengadaan);
        $nilaiBarang = $pengadaan->harga_barang - ((int)$request->bulan * ($pengadaan->harga_barang / $request->durasi));

        $hitungDepresiasi->update(array_merge($request->all(), ['nilai_barang' => $nilaiBarang]));
        return redirect()->route('user.hitung_depresiasi.index')->with('success', 'Data berhasil diupdate.');
    }

    public function Userdestroy($id)
    {
        $hitungDepresiasi = HitungDepresiasi::findOrFail($id);
        $hitungDepresiasi->delete();
        return redirect()->route('user.hitung_depresiasi.index')->with('success', 'Data berhasil dihapus.');
    }

    public function Usershow($id)
    {
        $hitungDepresiasi = HitungDepresiasi::findOrFail($id);
        return view('user.hitung_depresiasi.show', compact('hitungDepresiasi'));
    }
}
