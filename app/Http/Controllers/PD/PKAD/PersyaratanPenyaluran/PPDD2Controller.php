<?php

namespace App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran;

use App\Models\PPDD2;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePPDD2Request;
use App\Http\Requests\UpdatePPDD2Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PPDD2Controller extends Controller
{
    private $menu = 'Pemerintahan Desa / Administrasi Pemerintahan Desa / Informasi Persyaratan Penyaluran ADD dan Dana Desa';
    private $title = 'Persyaratan Penyaluran Dana Desa Tahap 2';

    public function index()
    {
        return view('pd/pkad/persyaratan-penyaluran/ppdd2/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userPPDD2 : PPDD2::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_ppdd2',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/pkad/persyaratan-penyaluran/ppdd2/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new PPDD2(),
        ]);
    }

    public function store(StorePPDD2Request $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppdd2', $file->hashName());
        }
        PPDD2::create($data);
        return redirect(route('ppdd2.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(PPDD2 $ppdd2)
    {
        //
    }

    public function edit(PPDD2 $ppdd2)
    {
        $this->authorize('pengguna');
        return view('pd/pkad/persyaratan-penyaluran/ppdd2/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $ppdd2->kode,
            'kode_kecamatan' => $ppdd2->ppdd2User->kode_kecamatan,
            'kecamatan' => $ppdd2->ppdd2User->kecamatan,
            'kode_desa' => $ppdd2->ppdd2User->kode_desa,
            'desa' => $ppdd2->ppdd2User->desa,
            'data' => $ppdd2,
        ]);
    }

    public function update(UpdatePPDD2Request $request, PPDD2 $ppdd2)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($ppdd2->$key);
                $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppdd2', $file->hashName());
            }
        }
        PPDD2::where('id', $ppdd2->id)->update($data);
        return redirect(route('ppdd2.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(PPDD2 $ppdd2)
    {
        $this->authorize('pengguna');
        foreach ($ppdd2->only(
            'surat_pengantar_camat',
            'surat_permohonan_penyaluran',
            'lorpdd3',
            'lorpdd1',
            'sptjm',
            'pakta_integritas',
        ) as $path) {
            Storage::delete($path);
        }
        PPDD2::destroy($ppdd2->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
