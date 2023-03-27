<?php

namespace App\Http\Controllers\KMD\KD;

use App\Models\RT;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRTRequest;
use App\Http\Requests\UpdateRTRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class RTController extends Controller
{
    private $menu = 'Kelembagaan Masyarakat Desa / Kelembagaan Desa';
    private $title = 'Data Jumlah RT';

    public function index()
    {
        return view('kmd/kd/rt/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userRT : RT::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_rt',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('kmd/kd/rt/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new RT(),
        ]);
    }

    public function store(StoreRTRequest $request)
    {
        $this->authorize('pengguna');
        RT::create($request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa'));
        return redirect(route('rt.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(RT $rt)
    {
        //
    }

    public function edit(RT $rt)
    {
        $this->authorize('pengguna');
        return view('kmd/kd/rt/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $rt->kode,
            'kode_kecamatan' => $rt->rtUser->kode_kecamatan,
            'kecamatan' => $rt->rtUser->kecamatan,
            'kode_desa' => $rt->rtUser->kode_desa,
            'desa' => $rt->rtUser->desa,
            'data' => $rt,
        ]);
    }

    public function update(UpdateRTRequest $request, RT $rt)
    {
        $this->authorize('pengguna');
        RT::where('id', $rt->id)->update($request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method'));
        return redirect(route('rt.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(RT $rt)
    {
        $this->authorize('pengguna');
        RT::destroy($rt->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
