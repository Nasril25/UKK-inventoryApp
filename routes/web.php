<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriAssetController;
use App\Http\Controllers\SubKategoriAssetController;
use App\Http\Controllers\DepresiasiController;
use App\Http\Controllers\HitungDepresiasiController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MutasiLokasiController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();


// User
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/user', [DashboardUserController::class, 'index'])->name('user.home');

    // profile
    Route::get('user/profile/edit', [ProfileController::class, 'userEdit'])->name('user.profile.edit');
    Route::get('user/profile', [ProfileController::class, 'userShow'])->name('user.profile.show');
    Route::patch('user/profile', [ProfileController::class, 'userUpdate'])->name('user.profile.update');
    Route::delete('user/profile', [ProfileController::class, 'userDestroy'])->name('user.profile.destroy');
    Route::put('/user/password', [ProfileController::class, 'updateUserPassword'])->name('user.password.update');
    
    // // Kategori Asset
    // Route::get('user/kategori_asset', [KategoriAssetController::class, 'Userindex'])->name('user.kategori_asset.index');
    // // Sub Kategori Asset
    // Route::get('user/sub_kategori_asset', [SubKategoriAssetController::class, 'Userindex'])->name('user.sub_kategori_asset.index');
    // // Lokasi
    // Route::get('user/lokasi', [LokasiController::class, 'Userindex'])->name('user.lokasi.index');
    // // Mutasi Lokasi
    // Route::get('user/mutasi_lokasi', [MutasiLokasiController::class, 'Userindex'])->name('user.mutasi_lokasi.index');

    // // Pengadaan
    // Route::get('user/pengadaan', [PengadaanController::class, 'Userindex'])->name('user.pengadaan.index');
    // Route::get('user/pengadaan/create', [PengadaanController::class, 'Usercreate'])->name('user.pengadaan.create');
    // Route::post('user/pengadaan', [PengadaanController::class, 'Userstore'])->name('user.pengadaan.store');
    // Route::get('user/pengadaan/{pengadaan}/edit', [PengadaanController::class, 'Useredit'])->name('user.pengadaan.edit');
    // Route::put('user/pengadaan/{pengadaan}', [PengadaanController::class, 'Userupdate'])->name('user.pengadaan.update');
    // Route::delete('user/pengadaan/{pengadaan}', [PengadaanController::class, 'Userdestroy'])->name('user.pengadaan.destroy');

    // // Master Barang
    // Route::get('user/master_barang', [MasterBarangController::class, 'Userindex'])->name('user.master_barang.index');
    // // Opname
    // Route::get('user/opname', [OpnameController::class, 'Userindex'])->name('user.opname.index');
    // Route::get('user/opname/create', [OpnameController::class, 'userCreate'])->name('user.opname.create');
    // Route::post('user/opname', [OpnameController::class, 'userStore'])->name('user.opname.store');
    // Route::get('user/opname/{opname}/edit', [OpnameController::class, 'userEdit'])->name('user.opname.edit');
    // Route::put('user/opname/{opname}', [OpnameController::class, 'userUpdate'])->name('user.opname.update');
    // Route::delete('user/opname/{opname}', [OpnameController::class, 'userDestroy'])->name('user.opname.destroy');
    
    // // Distributor
    // Route::get('user/distributor', [DistributorController::class, 'Userindex'])->name('user.distributor.index');
    // // Merk
    // Route::get('user/merk', [MerkController::class, 'Userindex'])->name('user.merk.index');
    // // Satuan
    // Route::get('user/satuan', [SatuanController::class, 'Userindex'])->name('user.satuan.index');
    // // Depresiasi
    // Route::get('user/depresiasi', [DepresiasiController::class, 'Userindex'])->name('user.depresiasi.index');

    // Hitung Depresiasi
    Route::get('user/hitung_depresiasi', [HitungDepresiasiController::class, 'Userindex'])->name('user.hitung_depresiasi.index');
    Route::get('user/hitung_depresiasi/create', [HitungDepresiasiController::class, 'Usercreate'])->name('user.hitung_depresiasi.create');
    Route::post('user/hitung_depresiasi', [HitungDepresiasiController::class, 'Userstore'])->name('user.hitung_depresiasi.store');
    Route::get('user/hitung_depresiasi/{hitung_depresiasi}/edit', [HitungDepresiasiController::class, 'Useredit'])->name('user.hitung_depresiasi.edit');
    Route::put('user/hitung_depresiasi/{hitung_depresiasi}', [HitungDepresiasiController::class, 'Userupdate'])->name('user.hitung_depresiasi.update');
    Route::delete('user/hitung_depresiasi/{hitung_depresiasi}', [HitungDepresiasiController::class, 'Userdestroy'])->name('user.hitung_depresiasi.destroy');
    Route::get('user/hitung_depresiasi/{id}/show', [HitungDepresiasiController::class, 'Usershow'])->name('user.hitung_depresiasi.show');
});


// Admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.home');

     // profile
     Route::get('admin/profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
     Route::get('admin/profile', [ProfileController::class, 'show'])->name('admin.profile.show');
     Route::patch('admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update'); // Ensure method is PATCH
     Route::delete('admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
     Route::put('/admin/password', [ProfileController::class, 'updateAdminPassword'])->name('admin.password.update');

    // Kategori Asset
    Route::get('admin/kategori_asset', [KategoriAssetController::class, 'index'])->name('kategori_asset.index');
    Route::get('admin/kategori_asset/create', [KategoriAssetController::class, 'create'])->name('kategori_asset.create');
    Route::post('admin/kategori_asset', [KategoriAssetController::class, 'store'])->name('kategori_asset.store');
    Route::get('admin/kategori_asset/{kategori_asset}/edit', [KategoriAssetController::class, 'edit'])->name('kategori_asset.edit');
    Route::put('admin/kategori_asset/{kategori_asset}', [KategoriAssetController::class, 'update'])->name('kategori_asset.update');
    Route::delete('admin/kategori_asset/{kategori_asset}', [KategoriAssetController::class, 'destroy'])->name('kategori_asset.destroy');
    
    // Sub Kategori Asset
    Route::get('admin/sub_kategori_asset', [SubKategoriAssetController::class, 'index'])->name('sub_kategori_asset.index');
    Route::get('admin/sub_kategori_asset/create', [SubKategoriAssetController::class, 'create'])->name('sub_kategori_asset.create');
    Route::post('admin/sub_kategori_asset', [SubKategoriAssetController::class, 'store'])->name('sub_kategori_asset.store');
    Route::get('admin/sub_kategori_asset/{sub_kategori_asset}/edit', [SubKategoriAssetController::class, 'edit'])->name('sub_kategori_asset.edit');
    Route::put('admin/sub_kategori_asset/{sub_kategori_asset}', [SubKategoriAssetController::class, 'update'])->name('sub_kategori_asset.update');
    Route::delete('admin/sub_kategori_asset/{sub_kategori_asset}', [SubKategoriAssetController::class, 'destroy'])->name('sub_kategori_asset.destroy');
    
    // Lokasi
    Route::get('admin/lokasi', [LokasiController::class, 'index'])->name('lokasi.index');
    Route::get('admin/lokasi/create', [LokasiController::class, 'create'])->name('lokasi.create');
    Route::post('admin/lokasi', [LokasiController::class, 'store'])->name('lokasi.store');
    Route::get('admin/lokasi/{lokasi}/edit', [LokasiController::class, 'edit'])->name('lokasi.edit');
    Route::put('admin/lokasi/{lokasi}', [LokasiController::class, 'update'])->name('lokasi.update');
    Route::delete('admin/lokasi/{lokasi}', [LokasiController::class, 'destroy'])->name('lokasi.destroy');
    
    // Mutasi Lokasi
    Route::get('admin/mutasi_lokasi', [MutasiLokasiController::class, 'index'])->name('mutasi_lokasi.index');
    Route::get('admin/mutasi_lokasi/create', [MutasiLokasiController::class, 'create'])->name('mutasi_lokasi.create');
    Route::post('admin/mutasi_lokasi', [MutasiLokasiController::class, 'store'])->name('mutasi_lokasi.store');
    Route::get('admin/mutasi_lokasi/{mutasi_lokasi}/edit', [MutasiLokasiController::class, 'edit'])->name('mutasi_lokasi.edit');
    Route::put('admin/mutasi_lokasi/{mutasi_lokasi}', [MutasiLokasiController::class, 'update'])->name('mutasi_lokasi.update');
    Route::delete('admin/mutasi_lokasi/{mutasi_lokasi}', [MutasiLokasiController::class, 'destroy'])->name('mutasi_lokasi.destroy');
    
    // Pengadaan
    Route::get('admin/pengadaan', [PengadaanController::class, 'index'])->name('pengadaan.index');
    Route::get('admin/pengadaan/create', [PengadaanController::class, 'create'])->name('pengadaan.create');
    Route::post('admin/pengadaan', [PengadaanController::class, 'store'])->name('pengadaan.store');
    Route::get('admin/pengadaan/{pengadaan}/edit', [PengadaanController::class, 'edit'])->name('pengadaan.edit');
    Route::put('admin/pengadaan/{pengadaan}', [PengadaanController::class, 'update'])->name('pengadaan.update');
    Route::delete('admin/pengadaan/{pengadaan}', [PengadaanController::class, 'destroy'])->name('pengadaan.destroy');
    Route::get('admin/pengadaan/{pengadaan}', [PengadaanController::class, 'show'])->name('pengadaan.show'); // Tambahkan ini
    
    // Master Barang
    Route::get('admin/master_barang', [MasterBarangController::class, 'index'])->name('master_barang.index');
    Route::get('admin/master_barang/create', [MasterBarangController::class, 'create'])->name('master_barang.create');
    Route::post('admin/master_barang', [MasterBarangController::class, 'store'])->name('master_barang.store');
    Route::get('admin/master_barang/{master_barang}/edit', [MasterBarangController::class, 'edit'])->name('master_barang.edit');
    Route::put('admin/master_barang/{master_barang}', [MasterBarangController::class, 'update'])->name('master_barang.update');
    Route::delete('admin/master_barang/{master_barang}', [MasterBarangController::class, 'destroy'])->name('master_barang.destroy');
    
    // Opname
    Route::get('admin/opname', [OpnameController::class, 'index'])->name('opname.index');
    Route::get('admin/opname/create', [OpnameController::class, 'create'])->name('opname.create');
    Route::post('admin/opname', [OpnameController::class, 'store'])->name('opname.store');
    Route::get('admin/opname/{opname}/edit', [OpnameController::class, 'edit'])->name('opname.edit');
    Route::put('admin/opname/{opname}', [OpnameController::class, 'update'])->name('opname.update');
    Route::delete('admin/opname/{opname}', [OpnameController::class, 'destroy'])->name('opname.destroy');
    
    // Distributor
    Route::get('admin/distributor', [DistributorController::class, 'index'])->name('distributor.index');
    Route::get('admin/distributor/create', [DistributorController::class, 'create'])->name('distributor.create');
    Route::post('admin/distributor', [DistributorController::class, 'store'])->name('distributor.store');
    Route::get('admin/distributor/{distributor}/edit', [DistributorController::class, 'edit'])->name('distributor.edit');
    Route::put('admin/distributor/{distributor}', [DistributorController::class, 'update'])->name('distributor.update');
    Route::delete('admin/distributor/{distributor}', [DistributorController::class, 'destroy'])->name('distributor.destroy');
    
    // Merk
    Route::get('admin/merk', [MerkController::class, 'index'])->name('merk.index');
    Route::get('admin/merk/create', [MerkController::class, 'create'])->name('merk.create');
    Route::post('admin/merk', [MerkController::class, 'store'])->name('merk.store');
    Route::get('admin/merk/{merk}/edit', [MerkController::class, 'edit'])->name('merk.edit');
    Route::put('admin/merk/{merk}', [MerkController::class, 'update'])->name('merk.update');
    Route::delete('admin/merk/{merk}', [MerkController::class, 'destroy'])->name('merk.destroy');
    
    // Satuan
    Route::get('admin/satuan', [SatuanController::class, 'index'])->name('satuan.index');
    Route::get('admin/satuan/create', [SatuanController::class, 'create'])->name('satuan.create');
    Route::post('admin/satuan', [SatuanController::class, 'store'])->name('satuan.store');
    Route::get('admin/satuan/{satuan}/edit', [SatuanController::class, 'edit'])->name('satuan.edit');
    Route::put('admin/satuan/{satuan}', [SatuanController::class, 'update'])->name('satuan.update');
    Route::delete('admin/satuan/{satuan}', [SatuanController::class, 'destroy'])->name('satuan.destroy');
    
    // Depresiasi
    Route::get('admin/depresiasi', [DepresiasiController::class, 'index'])->name('depresiasi.index');
    Route::get('admin/depresiasi/create', [DepresiasiController::class, 'create'])->name('depresiasi.create');
    Route::post('admin/depresiasi', [DepresiasiController::class, 'store'])->name('depresiasi.store');
    Route::get('admin/depresiasi/{depresiasi}/edit', [DepresiasiController::class, 'edit'])->name('depresiasi.edit');
    Route::put('admin/depresiasi/{depresiasi}', [DepresiasiController::class, 'update'])->name('depresiasi.update');
    Route::delete('admin/depresiasi/{depresiasi}', [DepresiasiController::class, 'destroy'])->name('depresiasi.destroy');
    
    // Hitung Depresiasi
    Route::get('admin/hitung_depresiasi', [HitungDepresiasiController::class, 'index'])->name('hitung_depresiasi.index');
    Route::get('admin/hitung_depresiasi/create', [HitungDepresiasiController::class, 'create'])->name('hitung_depresiasi.create');
    Route::post('admin/hitung_depresiasi', [HitungDepresiasiController::class, 'store'])->name('hitung_depresiasi.store');
    Route::get('admin/hitung_depresiasi/{hitung_depresiasi}/edit', [HitungDepresiasiController::class, 'edit'])->name('hitung_depresiasi.edit');
    Route::put('admin/hitung_depresiasi/{hitung_depresiasi}', [HitungDepresiasiController::class, 'update'])->name('hitung_depresiasi.update');
    Route::delete('admin/hitung_depresiasi/{hitung_depresiasi}', [HitungDepresiasiController::class, 'destroy'])->name('hitung_depresiasi.destroy');
    Route::get('admin/hitung_depresiasi/{id}/show', [HitungDepresiasiController::class, 'show'])->name('hitung_depresiasi.show');
});

