<?php

namespace App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran;

use App\Models\PPBLT2;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePPBLT2Request;
use App\Http\Requests\UpdatePPBLT2Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PPBLT2Controller extends Controller
{
    private $menu = 'Pemerintahan Desa / Administrasi Pemerintahan Desa / Informasi Persyaratan Penyaluran ADD dan Dana Desa';
    private $title = 'Persyaratan Penyaluran BLT Tahap 2';

    public function index()
    {
        return view('pd/pkad/persyaratan-penyaluran/ppblt2/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userPPBLT2 : PPBLT2::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_ppblt2',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/pkad/persyaratan-penyaluran/ppblt2/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new PPBLT2(),
        ]);
    }

    public function store(StorePPBLT2Request $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppblt2', $file->hashName());
        }
        PPBLT2::create($data);
        return redirect(route('ppblt2.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(PPBLT2 $ppblt2)
    {
        //
    }

    public function edit(PPBLT2 $ppblt2)
    {
        $this->authorize('pengguna');
        return view('pd/pkad/persyaratan-penyaluran/ppblt2/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $ppblt2->kode,
            'kode_kecamatan' => $ppblt2->ppblt2User->kode_kecamatan,
            'kecamatan' => $ppblt2->ppblt2User->kecamatan,
            'kode_desa' => $ppblt2->ppblt2User->kode_desa,
            'desa' => $ppblt2->ppblt2User->desa,
            'data' => $ppblt2,
        ]);
    }

    public function update(UpdatePPBLT2Request $request, PPBLT2 $ppblt2)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($ppblt2->$key);
                $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppblt2', $file->hashName());
            }
        }
        PPBLT2::where('id', $ppblt2->id)->update($data);
        return redirect(route('ppblt2.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(PPBLT2 $ppblt2)
    {
        $this->authorize('pengguna');
        foreach ($ppblt2->only(
            'surat_pengantar_camat',
            'surat_permohonan_penyaluran',
            'laporan_pembayaran',
        ) as $path) {
            Storage::delete($path);
        }
        ppblt2::destroy($ppblt2->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
