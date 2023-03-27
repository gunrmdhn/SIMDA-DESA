<?php

namespace App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran;

use App\Models\PPA3;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePPA3Request;
use App\Http\Requests\UpdatePPA3Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PPA3Controller extends Controller
{
    private $menu = 'Pemerintahan Desa / Administrasi Pemerintahan Desa / Informasi Persyaratan Penyaluran ADD dan Dana Desa';
    private $title = 'Persyaratan Penyaluran ADD Tahap 3';

    public function index()
    {
        return view('pd/pkad/persyaratan-penyaluran/ppa3/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userPPA3 : PPA3::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_ppa3',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/pkad/persyaratan-penyaluran/ppa3/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new PPA3(),
        ]);
    }

    public function store(StorePPA3Request $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppa3', $file->hashName());
        }
        PPA3::create($data);
        return redirect(route('ppa3.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(PPA3 $ppa3)
    {
        //
    }

    public function edit(PPA3 $ppa3)
    {
        $this->authorize('pengguna');
        return view('pd/pkad/persyaratan-penyaluran/ppa3/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $ppa3->kode,
            'kode_kecamatan' => $ppa3->ppa3User->kode_kecamatan,
            'kecamatan' => $ppa3->ppa3User->kecamatan,
            'kode_desa' => $ppa3->ppa3User->kode_desa,
            'desa' => $ppa3->ppa3User->desa,
            'data' => $ppa3,
        ]);
    }

    public function update(UpdatePPA3Request $request, PPA3 $ppa3)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($ppa3->$key);
                $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppa3', $file->hashName());
            }
        }
        PPA3::where('id', $ppa3->id)->update($data);
        return redirect(route('ppa3.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(PPA3 $ppa3)
    {
        $this->authorize('pengguna');
        foreach ($ppa3->only(
            'surat_pengantar_camat',
            'surat_permohonan_penyaluran',
            'laporan_realisasi_bulan',
            'laporan_realisasi_triwulan',
            'laporan_realisasi_semester',
            'presentase_bayar',
        ) as $path) {
            Storage::delete($path);
        }
        PPA3::destroy($ppa3->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
