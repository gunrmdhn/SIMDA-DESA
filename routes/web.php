<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KMD\KDController;
use App\Http\Controllers\PD\APDController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PD\PKADController;
use App\Http\Controllers\PKP\PPKPController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\KMD\DIEPDController;
use App\Http\Controllers\KMD\KD\RTController;
use App\Http\Controllers\PKP\PSPKPController;
use App\Http\Controllers\PPMD\PUEMController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\PD\PKAD\PaguController;
use App\Http\Controllers\PPMD\PSDATTGController;
use App\Http\Controllers\Auth\BeritaController;
use App\Http\Controllers\KMD\DIEPD\IDMController;
use App\Http\Controllers\PD\PKAD\APBDesController;
use App\Http\Controllers\PKP\PPKP\StuntingController;
use App\Http\Controllers\PD\APD\Kades\KadesController;
use App\Http\Controllers\PPMD\PUEM\RegistrasiController;
use App\Http\Controllers\PD\PKAD\RealisasiAPBDesController;
use App\Http\Controllers\PD\APD\Perangkat\PerangkatController;
use App\Http\Controllers\SekretariatDPMDP\SuratMasukController;
use App\Http\Controllers\SekretariatDPMDP\PegawaiDPMPDController;
use App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran\PPA2Controller;
use App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran\PPA3Controller;
use App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran\PPA4Controller;
use App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran\PPDD1Controller;
use App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran\PPDD2Controller;
use App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran\PPDD3Controller;
use App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran\PPBLT1Controller;
use App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran\PPBLT2Controller;
use App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran\PPBLT3Controller;
use App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran\PPBLT4Controller;
use App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran\PersyaratanPenyaluranController;
use App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran\PPSA1\PenyaluranSiltapTunjanganController;
use App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran\PPSA1\PenyaluranOperasionalTriwulanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('dokumen.');
// });
Route::get('/', BerandaController::class)
    ->name('index');

Route::middleware('guest')
    ->group(function () {
        Route::get('masuk', [AuthController::class, 'index'])
            ->name('login');
        Route::post('autentikasi', [AuthController::class, 'authenticate'])
            ->name('authenticate');
    });

Route::middleware('auth')->group(function () {
    Route::get('keluar', [AuthController::class, 'logout'])
        ->name('logout');
    Route::name('kata-sandi.')
        ->group(function () {
            Route::get('kata-sandi/{user}/edit', [AuthController::class, 'edit'])
                ->name('edit');
            Route::put('kata-sandi/{user}', [AuthController::class, 'update'])
                ->name('update');
        });
    Route::resource('admin', AdminController::class)
        ->except(['show'])
        ->parameters([
            'admin' => 'user',
        ]);
    Route::resource('berita', BeritaController::class)
        ->parameters([
            'berita' => 'berita',
        ]);
    Route::get('administrasi-pemerintahan-desa', APDController::class)
        ->name('apd');
    Route::prefix('administrasi-pemerintahan-desa')
        ->group(function () {
            Route::resource('kades', KadesController::class)
                ->except(['show'])
                ->parameters([
                    'kades' => 'kades',
                ]);
            Route::resource('perangkat', PerangkatController::class)
                ->except(['show']);
        });
    Route::get('pengelolaan-keuangan-dan-aset-desa', PKADController::class)
        ->name('pkad');
    Route::prefix('pengelolaan-keuangan-dan-aset-desa')
        ->group(function () {
            Route::resource('pagu', PaguController::class)
                ->except(['show']);
            Route::resource('apbdes', APBDesController::class)
                ->except(['show'])
                ->parameters([
                    'apbdes' => 'apbdes',
                ]);
            Route::resource('realisasi-apbdes', RealisasiAPBDesController::class)
                ->except(['show'])
                ->parameters([
                    'realisasi-apbdes' => 'realisasiAPBDes',
                ]);
            Route::get('informasi-persyaratan-penyaluran-add-dan-dana-desa', PersyaratanPenyaluranController::class)
                ->name('persyaratan-penyaluran');
            Route::prefix('informasi-persyaratan-penyaluran-add-dan-dana-desa')
                ->group(function () {
                    Route::resource('penyaluran-siltap-tunjangan', PenyaluranSiltapTunjanganController::class)
                        ->except(['show']);
                    Route::resource('penyaluran-operasional-triwulan', PenyaluranOperasionalTriwulanController::class)
                        ->except(['show']);
                    Route::resource('ppa2', PPA2Controller::class)
                        ->except(['show'])
                        ->parameters([
                            'ppa2' => 'ppa2',
                        ]);
                    Route::resource('ppa3', PPA3Controller::class)
                        ->except(['show'])
                        ->parameters([
                            'ppa3' => 'ppa3',
                        ]);
                    Route::resource('ppa4', PPA4Controller::class)
                        ->except(['show'])
                        ->parameters([
                            'ppa4' => 'ppa4',
                        ]);
                    Route::resource('ppdd1', PPDD1Controller::class)
                        ->except(['show'])
                        ->parameters([
                            'ppdd1' => 'ppdd1',
                        ]);
                    Route::resource('ppdd2', PPDD2Controller::class)
                        ->except(['show'])
                        ->parameters([
                            'ppdd2' => 'ppdd2',
                        ]);
                    Route::resource('ppdd3', PPDD3Controller::class)
                        ->except(['show'])
                        ->parameters([
                            'ppdd3' => 'ppdd3',
                        ]);
                    Route::resource('ppblt1', PPBLT1Controller::class)
                        ->except(['show'])
                        ->parameters([
                            'ppblt1' => 'ppblt1',
                        ]);
                    Route::resource('ppblt2', PPBLT2Controller::class)
                        ->except(['show'])
                        ->parameters([
                            'ppblt2' => 'ppblt2',
                        ]);
                    Route::resource('ppblt3', PPBLT3Controller::class)
                        ->except(['show'])
                        ->parameters([
                            'ppblt3' => 'ppblt3',
                        ]);
                    Route::resource('ppblt4', PPBLT4Controller::class)
                        ->except(['show'])
                        ->parameters([
                            'ppblt4' => 'ppblt4',
                        ]);
                });
        });
    Route::get('kelembagaan-desa', KDController::class)
        ->name('kd');
    Route::prefix('kelembagaan-desa')
        ->group(function () {
            Route::resource('rt', RTController::class)
                ->except(['show']);
        });
    Route::get('data-informasi-dan-evaluasi-perkembangan-desa', DIEPDController::class)
        ->name('diepd');
    Route::prefix('data-informasi-dan-evaluasi-perkembangan-desa')
        ->group(function () {
            Route::resource('idm', IDMController::class)
                ->except(['show']);
        });
    Route::get('pengembangan-usaha-ekonomi-masyarakat', PUEMController::class)
        ->name('puem');
    Route::prefix('pengembangan-usaha-ekonomi-masyarakat')
        ->group(function () {
            Route::resource('registrasi', RegistrasiController::class)
                ->parameters([
                    'registrasi' => 'bumdes',
                ]);
        });
    // Route::get('pemberdayaan-sumber-daya-alam-dan-teknologi-tepat-guna', PSDATTGController::class)
    //     ->name('psdattg');
    Route::get('pengembangan-sarana-dan-prasarana-kawasan-perdesaan', PSPKPController::class)
        ->name('pspkp');
    Route::get('perencanaan-pembangunan-kawasan-perdesaan', PPKPController::class)
        ->name('ppkp');
    Route::prefix('perencanaan-pembangunan-kawasan-perdesaan')
        ->group(function () {
            Route::resource('stunting', StuntingController::class)
                ->except(['show']);
        });
    Route::resource('pegawai-dpmpd', PegawaiDPMPDController::class)
        ->parameters([
            'pegawai-dpmpd' => 'pegawaiDPMPD'
        ]);
    Route::resource('surat-masuk', SuratMasukController::class)
        ->parameters([
            'surat-masuk' => 'suratMasuk'
        ]);
});
