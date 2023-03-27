<?php

namespace App\Http\Controllers\PD\APD\Kades;

use App\Models\Kades;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreKadesRequest;
use App\Http\Requests\UpdateKadesRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class KadesController extends Controller
{
    private $menu = 'Pemerintahan Desa / Administrasi Pemerintahan Desa';
    private $title = 'Kades';

    public function index()
    {
        return view('pd/apd/kades/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userKades : Kades::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_kades',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/apd/kades/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new Kades(),
        ]);
    }

    public function store(StoreKadesRequest $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        $data['file_sk'] = $request->file('file_sk')->storeAs('pd/apd/kades', $request->file('file_sk')->hashName());
        Kades::create($data);
        return redirect(route('kades.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(Kades $kades)
    {
        //
    }

    public function edit(Kades $kades)
    {
        $this->authorize('pengguna');
        return view('pd/apd/kades/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kades->kode,
            'kode_kecamatan' => $kades->kadesUser->kode_kecamatan,
            'kecamatan' => $kades->kadesUser->kecamatan,
            'kode_desa' => $kades->kadesUser->kode_desa,
            'desa' => $kades->kadesUser->desa,
            'data' => $kades,
        ]);
    }

    public function update(UpdateKadesRequest $request, Kades $kades)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file('file_sk')) {
            Storage::delete($kades->file_sk);
            $data['file_sk'] = $request->file('file_sk')->storeAs('pd/apd/kades', $request->file('file_sk')->hashName());
        }
        Kades::where('id', $kades->id)->update($data);
        return redirect(route('kades.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(Kades $kades)
    {
        $this->authorize('pengguna');
        Storage::delete($kades->file_sk);
        Kades::destroy($kades->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
