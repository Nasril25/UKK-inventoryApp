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

//     public function Userindex(Request $request)
// {
//     $search = $request->input('search');

//     $opname = Opname::with(['pengadaan'])
//         ->when($search, function ($query, $search) {
//             $query->where('tgl_opname', 'LIKE', "%{$search}%")
//             ->orWhere('kondisi', 'LIKE', "%{$search}%")
//                 ->orWhereHas('pengadaan', function ($q) use ($search) {
//                     $q->where('kode_pengadaan', 'LIKE', "%{$search}%");
//                 });
            
//         })
//         ->paginate(10);

//     return view('user.opname.index', compact('opname'));
// }

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
            'kondisi' => 'required|string|max:25',
            'keterangan' => 'nullable|string|max:100',
        ]);

        Opname::create($request->all());
        return redirect()->route('opname.index')->with('success', 'Data Opname berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $opname = Opname::findOrFail($id);
        $pengadaans = Pengadaan::all();
        return view('admin.opname.edit', compact('opname', 'pengadaans'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_opname' => 'required|date',
            'kondisi' => 'required|string|max:25',
            'keterangan' => 'nullable|string|max:100',
        ]);

        $opname = Opname::findOrFail($id);
        $opname->update($request->all());

        return redirect()->route('opname.index')->with('success', 'Data Opname berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $opname = Opname::findOrFail($id);
        $opname->delete();

        return redirect()->route('opname.index')->with('success', 'Data Opname berhasil dihapus!');
    }
}
