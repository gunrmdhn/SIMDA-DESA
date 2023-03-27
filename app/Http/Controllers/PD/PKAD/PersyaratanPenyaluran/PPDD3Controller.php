<?php

namespace App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran;

use App\Models\PPDD3;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePPDD3Request;
use App\Http\Requests\UpdatePPDD3Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PPDD3Controller extends Controller
{
    private $menu = 'Pemerintahan Desa / Administrasi Pemerintahan Desa / Informasi Persyaratan Penyaluran ADD dan Dana Desa';
    private $title = 'Persyaratan Penyaluran Dana Desa Tahap 3';

    public function index()
    {
        return view('pd/pkad/persyaratan-penyaluran/ppdd3/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userPPDD3 : PPDD3::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_ppdd3',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/pkad/persyaratan-penyaluran/ppdd3/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new PPDD3(),
        ]);
    }

    public function store(StorePPDD3Request $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppdd3', $file->hashName());
        }
        PPDD3::create($data);
        return redirect(route('ppdd3.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(PPDD3 $ppdd3)
    {
        //
    }

    public function edit(PPDD3 $ppdd3)
    {
        $this->authorize('pengguna');
        return view('pd/pkad/persyaratan-penyaluran/ppdd3/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $ppdd3->kode,
            'kode_kecamatan' => $ppdd3->ppdd3User->kode_kecamatan,
            'kecamatan' => $ppdd3->ppdd3User->kecamatan,
            'kode_desa' => $ppdd3->ppdd3User->kode_desa,
            'desa' => $ppdd3->ppdd3User->desa,
            'data' => $ppdd3,
        ]);
    }

    public function update(UpdatePPDD3Request $request, PPDD3 $ppdd3)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($ppdd3->$key);
                $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppdd3', $file->hashName());
            }
        }
        PPDD3::where('id', $ppdd3->id)->update($data);
        return redirect(route('ppdd3.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(PPDD3 $ppdd3)
    {
        $this->authorize('pengguna');
        foreach ($ppdd3->only(
            'surat_pengantar_camat',
            'surat_permohonan_penyaluran',
            'lorpdd2',
            'sptjm',
            'pakta_integritas',
        ) as $path) {
            Storage::delete($path);
        }
        PPDD3::destroy($ppdd3->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
