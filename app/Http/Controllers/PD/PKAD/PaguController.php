<?php

namespace App\Http\Controllers\PD\PKAD;

use App\Models\Pagu;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaguRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePaguRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PaguController extends Controller
{
    private $menu = 'Pemerintahan Desa / Pengelolaan Keuangan Dan Aset Desa';
    private $title = 'Rekapitulasi Pagu ADD Dan Dana Desa ';

    public function index()
    {
        return view('pd/pkad/pagu/index', [
            'menu' => $this->menu,
            'title' => $this->title . now()->year,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userPagu : Pagu::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_pagu',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/pkad/pagu/index', [
            'menu' => $this->menu,
            'title' => $this->title . now()->year,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new Pagu(),
        ]);
    }

    public function store(StorePaguRequest $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('pd/pkad/pagu', $file->hashName());
        }
        Pagu::create($data);
        return redirect(route('pagu.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(Pagu $pagu)
    {
        //
    }

    public function edit(Pagu $pagu)
    {
        $this->authorize('pengguna');
        return view('pd/pkad/pagu/index', [
            'menu' => $this->menu,
            'title' => $this->title . now()->year,
            'kode' => $pagu->kode,
            'kode_kecamatan' => $pagu->paguUser->kode_kecamatan,
            'kecamatan' => $pagu->paguUser->kecamatan,
            'kode_desa' => $pagu->paguUser->kode_desa,
            'desa' => $pagu->paguUser->desa,
            'data' => $pagu,
        ]);
    }

    public function update(UpdatePaguRequest $request, Pagu $pagu)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($pagu->$key);
                $data[$key] = $file->storeAs('pd/pkad/pagu', $file->hashName());
            }
        }
        Pagu::where('id', $pagu->id)->update($data);
        return redirect(route('pagu.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(Pagu $pagu)
    {
        $this->authorize('pengguna');
        foreach ($pagu->only('pagu_add', 'pagu_dana_desa') as $path) {
            Storage::delete($path);
        }
        Pagu::destroy($pagu->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
