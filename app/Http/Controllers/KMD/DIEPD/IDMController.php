<?php

namespace App\Http\Controllers\KMD\DIEPD;

use App\Models\IDM;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIDMRequest;
use App\Http\Requests\UpdateIDMRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class IDMController extends Controller
{
    private $menu = 'Kelembagaan Masyarakat Desa / Data Informasi Dan Evaluasi Perkembangan Desa';
    private $title = 'Data Rekapitulasi Jumlah Desa, Status Desa Berdasarkan IDM';

    public function index()
    {
        return view('kmd/diepd/idm/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userIDM : IDM::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_idm',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('kmd/diepd/idm/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new IDM(),
            'status' => [
                'Sangat Tertinggal',
                'Tertinggal',
                'Berkembang',
                'Maju',
                'Mandiri',
            ],
        ]);
    }

    public function store(StoreIDMRequest $request)
    {
        $this->authorize('pengguna');
        IDM::create($request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa'));
        return redirect(route('idm.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(IDM $idm)
    {
        //
    }

    public function edit(IDM $idm)
    {
        $this->authorize('pengguna');
        return view('kmd/diepd/idm/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $idm->kode,
            'kode_kecamatan' => $idm->idmUser->kode_kecamatan,
            'kecamatan' => $idm->idmUser->kecamatan,
            'kode_desa' => $idm->idmUser->kode_desa,
            'desa' => $idm->idmUser->desa,
            'data' => $idm,
            'status' => [
                'Sangat Tertinggal',
                'Tertinggal',
                'Berkembang',
                'Maju',
                'Mandiri',
            ],
        ]);
    }

    public function update(UpdateIDMRequest $request, IDM $idm)
    {
        $this->authorize('pengguna');
        IDM::where('id', $idm->id)->update($request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method'));
        return redirect(route('idm.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(IDM $idm)
    {
        $this->authorize('pengguna');
        IDM::destroy($idm->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
