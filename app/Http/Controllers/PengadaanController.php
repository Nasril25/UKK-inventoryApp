<?php

namespace App\Http\Controllers;

use App\Models\Depresiasi;
use App\Models\MasterBarang;
use App\Models\Merk;
use App\Models\SubKategoriAsset;
use App\Models\Distributor;
use App\Models\Satuan;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    /**
     * Menampilkan data pengadaan untuk admin.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pengadaan = Pengadaan::with(['masterBarang', 'merk', 'depresiasi', 'satuan', 'subKategoriAsset', 'distributor'])
            ->when($search, function ($query, $search) {
                $query->where('kode_pengadaan', 'LIKE', "%{$search}%")
                    ->orWhere('no_invoice', 'LIKE', "%{$search}%")
                    ->orWhere('no_seri_barang', 'LIKE', "%{$search}%")
                    ->orWhereHas('masterBarang', function ($q) use ($search) {
                        $q->where('nama_barang', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('merk', function ($q) use ($search) {
                        $q->where('merk', 'LIKE', "%{$search}%");
                    });
            })
            ->paginate(10);

        return view('admin.pengadaan.index', compact('pengadaan'));
    }

    /**
     * Menampilkan data pengadaan untuk user.
     */
    public function Userindex(Request $request)
    {
        $search = $request->input('search');

        $pengadaan = Pengadaan::with(['masterBarang', 'merk', 'depresiasi', 'satuan', 'subKategoriAsset', 'distributor'])
            ->when($search, function ($query, $search) {
                $query->where('kode_pengadaan', 'LIKE', "%{$search}%")
                    ->orWhere('no_invoice', 'LIKE', "%{$search}%")
                    ->orWhere('no_seri_barang', 'LIKE', "%{$search}%")
                    ->orWhereHas('masterBarang', function ($q) use ($search) {
                        $q->where('nama_barang', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('merk', function ($q) use ($search) {
                        $q->where('merk', 'LIKE', "%{$search}%");
                    });
            })
            ->paginate(10);

        return view('user.pengadaan.index', compact('pengadaan'));
    }

    /**
     * Menampilkan form untuk menambah data pengadaan.
     */
    public function create()
    {
        $depresiasi = Depresiasi::all();
        $master_barang = MasterBarang::all();
        $merk = Merk::all();
        $sub_kategori_asset = SubKategoriAsset::all();
        $distributor = Distributor::all();
        $satuan = Satuan::all();

        return view('admin.pengadaan.create', compact(
            'depresiasi',
            'master_barang',
            'merk',
            'sub_kategori_asset',
            'distributor',
            'satuan'
        ));
    }

    /**
     * Menyimpan data pengadaan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_master_barang' => 'required',
            'id_depresiasi' => 'nullable',
            'id_merk' => 'required',
            'id_satuan' => 'required',
            'id_sub_kategori_asset' => 'required',
            'id_distributor' => 'required',
            'kode_pengadaan' => 'required|unique:tbl_pengadaan',
            'no_invoice' => 'required',
            'no_seri_barang' => 'required',
            'tahun_produksi' => 'required|integer',
            'tgl_pengadaan' => 'required|date',
            'harga_barang' => 'required|numeric|min:0',
            'jumlah_barang' => 'required|integer|min:1',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // Hitung nilai barang
        $nilaiBarang = $request->harga_barang * $request->jumlah_barang;

        // Hitung depresiasi barang
        $lamaDepresiasi = Depresiasi::find($request->id_depresiasi)->lama_depresiasi;
        $penyusutanPerBulan = $request->harga_barang / $lamaDepresiasi;

        // Simpan data pengadaan
        $pengadaan = Pengadaan::create(array_merge($request->all(), ['nilai_barang' => $nilaiBarang, 'depresiasi_barang' => $penyusutanPerBulan]));

        return redirect()->route('pengadaan.index')->with('success', 'Pengadaan berhasil disimpan beserta depresiasi.');
    }

    /**
     * Menampilkan form untuk mengedit data pengadaan.
     */
    public function edit($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);
        $depresiasi = Depresiasi::all();
        $master_barang = MasterBarang::all();
        $merk = Merk::all();
        $sub_kategori_asset = SubKategoriAsset::all();
        $distributor = Distributor::all();
        $satuan = Satuan::all();

        return view('admin.pengadaan.edit', compact(
            'pengadaan',
            'depresiasi',
            'master_barang',
            'merk',
            'sub_kategori_asset',
            'distributor',
            'satuan'
        ));
    }

    /**
     * Memperbarui data pengadaan.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_master_barang' => 'required',
            'id_depresiasi' => 'nullable',
            'id_merk' => 'required',
            'id_satuan' => 'required',
            'id_sub_kategori_asset' => 'required',
            'id_distributor' => 'required',
            'kode_pengadaan' => 'required|string|max:50',
            'no_invoice' => 'required',
            'no_seri_barang' => 'required',
            'tahun_produksi' => 'required|integer',
            'tgl_pengadaan' => 'required|date',
            'harga_barang' => 'required|numeric|min:0',
            'jumlah_barang' => 'required|integer|min:1',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable|string|max:255',
        ]);
    
        $pengadaan = Pengadaan::findOrFail($id);

        // Hitung nilai barang
        $nilaiBarang = $request->harga_barang * $request->jumlah_barang;
    
        $pengadaan->update(array_merge($request->all(), ['nilai_barang' => $nilaiBarang]));
    
        // Hitung ulang depresiasi
        $lamaDepresiasi = Depresiasi::find($request->id_depresiasi)->lama_depresiasi;
        $penyusutanPerBulan = $request->harga_barang / $lamaDepresiasi;
        $pengadaan->depresiasi_barang = $penyusutanPerBulan;
        $pengadaan->save();
    
        return redirect()->route('pengadaan.index')->with('success', 'Data pengadaan berhasil diperbarui beserta depresiasi.');
    }
    
    /**
     * Menghapus data pengadaan.
     */
    public function destroy($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);
    
        // Hapus data pengadaan
        $pengadaan->delete();
    
        return redirect()->route('pengadaan.index')->with('success', 'Data pengadaan berhasil dihapus.');
    }

    /**
     * Menampilkan detail pengadaan.
     */
    public function show($id)
    {
        $pengadaan = Pengadaan::with(['masterBarang', 'merk', 'depresiasi', 'satuan', 'subKategoriAsset', 'distributor'])->findOrFail($id);
        return view('admin.pengadaan.show', compact('pengadaan'));
    }
}