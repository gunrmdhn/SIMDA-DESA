<?php

namespace App\Http\Controllers\PKP\PPKP;

use App\Models\Stunting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreStuntingRequest;
use App\Http\Requests\UpdateStuntingRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class StuntingController extends Controller
{
    private $menu = 'Pembangunan Kawasan Perdesaan / Perencanaan Pembangunan Kawasan Perdesaan';
    private $title = 'Data Lokus Stunting Di Halmahera Barat';

    public function index()
    {
        return view('pkp/ppkp/stunting/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userStunting : Stunting::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_stunting',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pkp/ppkp/stunting/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new Stunting(),
            'info_lokus_stunting' => [
                'Ya',
                'Tidak',
            ]
        ]);
    }

    public function store(StoreStuntingRequest $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        $data['sk_bupati'] = $request->file('sk_bupati')->storeAs('pkp/ppkp/stunting/', $request->file('sk_bupati')->hashName());
        Stunting::create($data);
        return redirect(route('stunting.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(Stunting $stunting)
    {
        //
    }

    public function edit(Stunting $stunting)
    {
        $this->authorize('pengguna');
        return view('pkp/ppkp/stunting/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $stunting->kode,
            'kode_kecamatan' => $stunting->stuntingUser->kode_kecamatan,
            'kecamatan' => $stunting->stuntingUser->kecamatan,
            'kode_desa' => $stunting->stuntingUser->kode_desa,
            'desa' => $stunting->stuntingUser->desa,
            'data' => $stunting,
            'info_lokus_stunting' => [
                'Ya',
                'Tidak',
            ]
        ]);
    }

    public function update(UpdateStuntingRequest $request, Stunting $stunting)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file('sk_bupati')) {
            Storage::delete($stunting->sk_bupati);
            $data['sk_bupati'] = $request->file('sk_bupati')->storeAs('pkp/ppkp/stunting/', $request->file('sk_bupati')->hashName());
        }
        Stunting::where('id', $stunting->id)->update($data);
        return redirect(route('stunting.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(Stunting $stunting)
    {
        $this->authorize('pengguna');
        Storage::delete($stunting->sk_bupati);
        Stunting::destroy($stunting->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
