<?php

namespace App\Http\Controllers\PD\PKAD;

use App\Models\APBDes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAPBDesRequest;
use App\Http\Requests\UpdateAPBDesRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class APBDesController extends Controller
{
    private $menu = 'Pemerintahan Desa / Pengelolaan Keuangan Dan Aset Desa';
    private $title = 'Informasi APBDes ';

    public function index()
    {
        return view('pd/pkad/apbdes/index', [
            'menu' => $this->menu,
            'title' => $this->title . now()->year,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userAPBDes : APBDes::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_apbdes',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/pkad/apbdes/index', [
            'menu' => $this->menu,
            'title' => $this->title . now()->year,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new APBDes(),
        ]);
    }

    public function store(StoreAPBDesRequest $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        $data['baliho'] = $request->file('baliho')->storeAs('pd/pkad/apbdes', $request->file('baliho')->hashName());
        APBDes::create($data);
        return redirect(route('apbdes.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(APBDes $apbdes)
    {
        //
    }

    public function edit(APBDes $apbdes)
    {
        $this->authorize('pengguna');
        return view('pd/pkad/apbdes/index', [
            'menu' => $this->menu,
            'title' => $this->title . now()->year,
            'kode' => $apbdes->kode,
            'kode_kecamatan' => $apbdes->apbdesUser->kode_kecamatan,
            'kecamatan' => $apbdes->apbdesUser->kecamatan,
            'kode_desa' => $apbdes->apbdesUser->kode_desa,
            'desa' => $apbdes->apbdesUser->desa,
            'data' => $apbdes,
        ]);
    }

    public function update(UpdateAPBDesRequest $request, APBDes $apbdes)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file('baliho')) {
            Storage::delete($apbdes->baliho);
            $data['baliho'] = $request->file('baliho')->storeAs('pd/pkad/apbdes', $request->file('baliho')->hashName());
        }
        APBDes::where('id', $apbdes->id)->update($data);
        return redirect(route('apbdes.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(APBDes $apbdes)
    {
        $this->authorize('pengguna');
        Storage::delete($apbdes->baliho);
        APBDes::destroy($apbdes->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
