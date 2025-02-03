<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriAsset;
use App\Models\SubKategoriAsset;
use App\Models\Merk;
use App\Models\Satuan;
use App\Models\Distributor;
use App\Models\Depresiasi;
use App\Models\MasterBarang;
use App\Models\Pengadaan;
use App\Models\MutasiLokasi;
use App\Models\Lokasi;
use App\Models\Opname;
use App\Models\HitungDepresiasi;

class DashboardUserController extends Controller
{
    public function index()
    {
        // $kategoriAssetCount = KategoriAsset::count();
        // $subKategoriAssetCount = SubKategoriAsset::count();
        // $merkCount = Merk::count();
        // $satuanCount = Satuan::count();
        // $distributorCount = Distributor::count();
        // $depresiasiCount = Depresiasi::count();
        // $masterBarangCount = MasterBarang::count();
        // $pengadaanCount = Pengadaan::count();
        // $mutasiLokasiCount = MutasiLokasi::count();
        // $lokasiCount = Lokasi::count();
        // $opnameCount = Opname::count();
        $hitungDepresiasiCount = HitungDepresiasi::count();

        return view('user.home', [
            // 'kategoriAssetCount' => $kategoriAssetCount,
            // 'subKategoriAssetCount' => $subKategoriAssetCount,
            // 'merkCount' => $merkCount,
            // 'satuanCount' => $satuanCount,
            // 'distributorCount' => $distributorCount,
            // 'depresiasiCount' => $depresiasiCount,
            // 'masterBarangCount' => $masterBarangCount,
            // 'pengadaanCount' => $pengadaanCount,
            // 'mutasiLokasiCount' => $mutasiLokasiCount,
            // 'lokasiCount' => $lokasiCount,
            // 'opnameCount' => $opnameCount,
            'hitungDepresiasiCount' => $hitungDepresiasiCount
        ]);
        
    }
}
