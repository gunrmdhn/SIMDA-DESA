<?php

namespace App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran;

use App\Models\PPA2;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePPA2Request;
use App\Http\Requests\UpdatePPA2Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PPA2Controller extends Controller
{
    private $menu = 'Pemerintahan Desa / Administrasi Pemerintahan Desa / Informasi Persyaratan Penyaluran ADD dan Dana Desa';
    private $title = 'Persyaratan Penyaluran ADD Tahap 2';

    public function index()
    {
        return view('pd/pkad/persyaratan-penyaluran/ppa2/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userPPA2 : PPA2::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_ppa2',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/pkad/persyaratan-penyaluran/ppa2/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new PPA2(),
        ]);
    }

    public function store(StorePPA2Request $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppa2', $file->hashName());
        }
        PPA2::create($data);
        return redirect(route('ppa2.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(PPA2 $ppa2)
    {
        //
    }

    public function edit(PPA2 $ppa2)
    {
        $this->authorize('pengguna');
        return view('pd/pkad/persyaratan-penyaluran/ppa2/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $ppa2->kode,
            'kode_kecamatan' => $ppa2->ppa2User->kode_kecamatan,
            'kecamatan' => $ppa2->ppa2User->kecamatan,
            'kode_desa' => $ppa2->ppa2User->kode_desa,
            'desa' => $ppa2->ppa2User->desa,
            'data' => $ppa2,
        ]);
    }

    public function update(UpdatePPA2Request $request, PPA2 $ppa2)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($ppa2->$key);
                $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppa2', $file->hashName());
            }
        }
        PPA2::where('id', $ppa2->id)->update($data);
        return redirect(route('ppa2.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(PPA2 $ppa2)
    {
        $this->authorize('pengguna');
        foreach ($ppa2->only(
            'surat_pengantar_camat',
            'surat_permohonan_penyaluran',
            'laporan_realisasi_bulan',
            'laporan_realisasi_triwulan',
            'laporan_realisasi_semester',
            'presentase_bayar',
        ) as $path) {
            Storage::delete($path);
        }
        PPA2::destroy($ppa2->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
