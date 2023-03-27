<?php

namespace App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran;

use App\Models\PPBLT3;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePPBLT3Request;
use App\Http\Requests\UpdatePPBLT3Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PPBLT3Controller extends Controller
{
    private $menu = 'Pemerintahan Desa / Administrasi Pemerintahan Desa / Informasi Persyaratan Penyaluran ADD dan Dana Desa';
    private $title = 'Persyaratan Penyaluran BLT Tahap 3';

    public function index()
    {
        return view('pd/pkad/persyaratan-penyaluran/ppblt3/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userPPBLT3 : PPBLT3::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_ppblt3',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/pkad/persyaratan-penyaluran/ppblt3/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new PPBLT3(),
        ]);
    }

    public function store(StorePPBLT3Request $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppblt3', $file->hashName());
        }
        PPBLT3::create($data);
        return redirect(route('ppblt3.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(PPBLT3 $ppblt3)
    {
        //
    }

    public function edit(PPBLT3 $ppblt3)
    {
        $this->authorize('pengguna');
        return view('pd/pkad/persyaratan-penyaluran/ppblt3/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $ppblt3->kode,
            'kode_kecamatan' => $ppblt3->ppblt3User->kode_kecamatan,
            'kecamatan' => $ppblt3->ppblt3User->kecamatan,
            'kode_desa' => $ppblt3->ppblt3User->kode_desa,
            'desa' => $ppblt3->ppblt3User->desa,
            'data' => $ppblt3,
        ]);
    }

    public function update(UpdatePPBLT3Request $request, PPBLT3 $ppblt3)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($ppblt3->$key);
                $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppblt3', $file->hashName());
            }
        }
        PPBLT3::where('id', $ppblt3->id)->update($data);
        return redirect(route('ppblt3.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(PPBLT3 $ppblt3)
    {
        $this->authorize('pengguna');
        foreach ($ppblt3->only(
            'surat_pengantar_camat',
            'surat_permohonan_penyaluran',
            'laporan_pembayaran',
        ) as $path) {
            Storage::delete($path);
        }
        ppblt3::destroy($ppblt3->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
