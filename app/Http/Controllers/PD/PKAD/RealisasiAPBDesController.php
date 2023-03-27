<?php

namespace App\Http\Controllers\PD\PKAD;

use App\Models\RealisasiAPBDes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Requests\StoreRealisasiAPBDesRequest;
use App\Http\Requests\UpdateRealisasiAPBDesRequest;

class RealisasiAPBDesController extends Controller
{
    private $menu = 'Pemerintahan Desa / Pengelolaan Keuangan Dan Aset Desa';
    private $title = 'Informasi Realisasi APBDes ';

    public function index()
    {
        return view('pd/pkad/realisasi-apbdes/index', [
            'menu' => $this->menu,
            'title' => $this->title . now()->year - 1,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userRealisasiAPBDes : RealisasiAPBDes::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_realisasi_apbdes',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/pkad/realisasi-apbdes/index', [
            'menu' => $this->menu,
            'title' => $this->title . now()->year - 1,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new RealisasiAPBDes(),
        ]);
    }

    public function store(StoreRealisasiAPBDesRequest $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        $data['baliho'] = $request->file('baliho')->storeAs('pd/pkad/realisasi-apbdes', $request->file('baliho')->hashName());
        RealisasiAPBDes::create($data);
        return redirect(route('realisasi-apbdes.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(RealisasiAPBDes $realisasiAPBDes)
    {
        //
    }

    public function edit(RealisasiAPBDes $realisasiAPBDes)
    {
        $this->authorize('pengguna');
        return view('pd/pkad/realisasi-apbdes/index', [
            'menu' => $this->menu,
            'title' => $this->title . now()->year - 1,
            'kode' => $realisasiAPBDes->kode,
            'kode_kecamatan' => $realisasiAPBDes->realisasiapbdesUser->kode_kecamatan,
            'kecamatan' => $realisasiAPBDes->realisasiapbdesUser->kecamatan,
            'kode_desa' => $realisasiAPBDes->realisasiapbdesUser->kode_desa,
            'desa' => $realisasiAPBDes->realisasiapbdesUser->desa,
            'data' => $realisasiAPBDes,
        ]);
    }

    public function update(UpdateRealisasiAPBDesRequest $request, RealisasiAPBDes $realisasiAPBDes)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file('baliho')) {
            Storage::delete($realisasiAPBDes->baliho);
            $data['baliho'] = $request->file('baliho')->storeAs('pd/pkad/realisasi-apbdes', $request->file('baliho')->hashName());
        }
        RealisasiAPBDes::where('id', $realisasiAPBDes->id)->update($data);
        return redirect(route('realisasi-apbdes.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(RealisasiAPBDes $realisasiAPBDes)
    {
        $this->authorize('pengguna');
        Storage::delete($realisasiAPBDes->baliho);
        RealisasiAPBDes::destroy($realisasiAPBDes->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
