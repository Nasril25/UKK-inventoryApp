<?php

namespace App\Http\Controllers;

use App\Models\Opname;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class OpnameController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $opname = Opname::with(['pengadaan'])
            ->when($search, function ($query, $search) {
                $query->where('tgl_opname', 'LIKE', "%{$search}%")
                    ->orWhere('kondisi', 'LIKE', "%{$search}%")
                    ->orWhereHas('pengadaan', function ($q) use ($search) {
                        $q->where('kode_pengadaan', 'LIKE', "%{$search}%");
                    });
            })
            ->paginate(10);

        return view('admin.opname.index', compact('opname'));
    }

    public function Userindex(Request $request)
    {
        $search = $request->input('search');

        $opname = Opname::with(['pengadaan'])
            ->when($search, function ($query, $search) {
                $query->where('tgl_opname', 'LIKE', "%{$search}%")
                    ->orWhere('kondisi', 'LIKE', "%{$search}%")
                    ->orWhereHas('pengadaan', function ($q) use ($search) {
                        $q->where('kode_pengadaan', 'LIKE', "%{$search}%");
                    });
            })
            ->paginate(10);

        return view('user.opname.index', compact('opname'));
    }

    public function create()
    {
        $pengadaans = Pengadaan::all();
        return view('admin.opname.create', compact('pengadaans'));
    }

    public function store(Request $request)
{
    $request->validate([
        'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
        'tgl_opname' => 'required|date',
        'kondisi' => 'required|array',
        'kondisi.*' => 'required|string|max:25',
        'keterangan' => 'nullable|array',
        'keterangan.*' => 'nullable|string|max:100',
        'jumlah_barang' => 'required|array',
        'jumlah_barang.*' => 'required|integer|min:1',
    ]);

    $pengadaan = Pengadaan::findOrFail($request->id_pengadaan);

    $totalJumlahBarang = array_sum($request->jumlah_barang);
    if ($totalJumlahBarang > $pengadaan->jumlah_barang) {
        return redirect()->back()->withErrors(['jumlah_barang' => 'Jumlah barang melebihi jumlah yang tersedia di pengadaan.'])->withInput();
    }

    foreach ($request->kondisi as $index => $kondisi) {
        $data = [
            'id_pengadaan' => $request->id_pengadaan,
            'tgl_opname' => $request->tgl_opname,
            'kondisi' => $kondisi,
            'keterangan' => $request->keterangan[$index] ?? null,
            'jumlah_barang' => $request->jumlah_barang[$index],
        ];

        Opname::create($data);

        if ($kondisi !== 'Baik') {
            $pengadaan->jumlah_barang -= $request->jumlah_barang[$index];
        }
    }

    $pengadaan->nilai_barang = $pengadaan->harga_barang * $pengadaan->jumlah_barang;
    $pengadaan->save();

    return redirect()->route('opname.index')->with('success', 'Data Opname berhasil ditambahkan!');
}


    public function edit($id)
    {
        $opname = Opname::findOrFail($id);
        $opname->conditions = $opname->conditions ?? [];
        $pengadaans = Pengadaan::all();
        return view('admin.opname.edit', compact('opname', 'pengadaans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_opname' => 'required|date',
            'kondisi' => 'required|array',
            'kondisi.*' => 'required|string|max:25',
            'keterangan' => 'nullable|array',
            'keterangan.*' => 'nullable|string|max:100',
            'jumlah_barang' => 'required|array',
            'jumlah_barang.*' => 'required|integer|min:1',
        ]);

        $opname = Opname::findOrFail($id);
        $pengadaan = Pengadaan::findOrFail($request->id_pengadaan);

        // Revert previous adjustments
        $previousOpnameData = $opname->where('id_pengadaan', $opname->id_pengadaan)->get();
        foreach ($previousOpnameData as $data) {
            if ($data->kondisi !== 'Baik') {
                $pengadaan->jumlah_barang += $data->jumlah_barang;
            }
        }

        $totalJumlahBarang = array_sum($request->jumlah_barang);
        if ($totalJumlahBarang > $pengadaan->jumlah_barang) {
            return redirect()->back()->withErrors(['jumlah_barang' => 'Jumlah barang melebihi jumlah yang tersedia di pengadaan.'])->withInput();
        }

        // Update opname data
        $opname->delete();

        foreach ($request->kondisi as $index => $kondisi) {
            $data = [
                'id_pengadaan' => $request->id_pengadaan,
                'tgl_opname' => $request->tgl_opname,
                'kondisi' => $kondisi,
                'keterangan' => $request->keterangan[$index] ?? null,
                'jumlah_barang' => $request->jumlah_barang[$index],
            ];

            Opname::create($data);

            if ($kondisi !== 'Baik') {
                $pengadaan->jumlah_barang -= $request->jumlah_barang[$index];
            }
        }

        $pengadaan->nilai_barang = $pengadaan->harga_barang * $pengadaan->jumlah_barang;
        $pengadaan->save();

        return redirect()->route('opname.index')->with('success', 'Data Opname berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $opname = Opname::findOrFail($id);
        $pengadaan = Pengadaan::findOrFail($opname->id_pengadaan);

        // Revert adjustment
        $pengadaan->jumlah_barang += $opname->jumlah_barang;
        $pengadaan->save();

        $opname->delete();

        return redirect()->route('opname.index')->with('success', 'Data Opname berhasil dihapus!');
    }

    public function show($id)
    {
        $opname = Opname::with('pengadaan')->findOrFail($id);

        $baikCount = Opname::where('id_pengadaan', $opname->id_pengadaan)->where('kondisi', 'Baik')->sum('jumlah_barang');
        $rusakCount = Opname::where('id_pengadaan', $opname->id_pengadaan)->where('kondisi', 'Rusak')->sum('jumlah_barang');
        $hilangCount = Opname::where('id_pengadaan', $opname->id_pengadaan)->where('kondisi', 'Hilang')->sum('jumlah_barang');

        return view('admin.opname.show', compact('opname', 'baikCount', 'rusakCount', 'hilangCount'));
    }
}