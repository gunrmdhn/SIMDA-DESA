<?php

namespace App\Http\Controllers\PD\APD\Perangkat;

use App\Models\Perangkat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePerangkatRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Requests\UpdatePerangkatRequest;

class PerangkatController extends Controller
{
    private $menu = 'Pemerintahan Desa / Administrasi Pemerintahan Desa';
    private $title = 'Perangkat';

    public function index()
    {
        return view('pd/apd/perangkat/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userPerangkat : Perangkat::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_perangkat',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/apd/perangkat/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new Perangkat(),
        ]);
    }

    public function store(StorePerangkatRequest $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        $data['file_sk'] = $request->file('file_sk')->storeAs('pd/apd/perangkat', $request->file('file_sk')->hashName());
        Perangkat::create($data);
        return redirect(route('perangkat.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(Perangkat $perangkat)
    {
        //
    }

    public function edit(Perangkat $perangkat)
    {
        $this->authorize('pengguna');
        return view('pd/apd/perangkat/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $perangkat->kode,
            'kode_kecamatan' => $perangkat->perangkatUser->kode_kecamatan,
            'kecamatan' => $perangkat->perangkatUser->kecamatan,
            'kode_desa' => $perangkat->perangkatUser->kode_desa,
            'desa' => $perangkat->perangkatUser->desa,
            'data' => $perangkat,
        ]);
    }

    public function update(UpdatePerangkatRequest $request, Perangkat $perangkat)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file('file_sk')) {
            Storage::delete($perangkat->file_sk);
            $data['file_sk'] = $request->file('file_sk')->storeAs('pd/apd/perangkat', $request->file('file_sk')->hashName());
        }
        Perangkat::where('id', $perangkat->id)->update($data);
        return redirect(route('perangkat.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(Perangkat $perangkat)
    {
        $this->authorize('pengguna');
        Storage::delete($perangkat->file_sk);
        Perangkat::destroy($perangkat->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
