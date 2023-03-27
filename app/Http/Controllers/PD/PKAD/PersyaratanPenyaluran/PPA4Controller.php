<?php

namespace App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran;

use App\Models\PPA4;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePPA4Request;
use App\Http\Requests\UpdatePPA4Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PPA4Controller extends Controller
{
    private $menu = 'Pemerintahan Desa / Administrasi Pemerintahan Desa / Informasi Persyaratan Penyaluran ADD dan Dana Desa';
    private $title = 'Persyaratan Penyaluran ADD Tahap 4';

    public function index()
    {
        return view('pd/pkad/persyaratan-penyaluran/ppa4/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userPPA4 : PPA4::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_ppa4',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/pkad/persyaratan-penyaluran/ppa4/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new PPA4(),
        ]);
    }

    public function store(StorePPA4Request $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppa4', $file->hashName());
        }
        PPA4::create($data);
        return redirect(route('ppa4.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(PPA4 $ppa4)
    {
        //
    }

    public function edit(PPA4 $ppa4)
    {
        $this->authorize('pengguna');
        return view('pd/pkad/persyaratan-penyaluran/ppa4/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $ppa4->kode,
            'kode_kecamatan' => $ppa4->ppa4User->kode_kecamatan,
            'kecamatan' => $ppa4->ppa4User->kecamatan,
            'kode_desa' => $ppa4->ppa4User->kode_desa,
            'desa' => $ppa4->ppa4User->desa,
            'data' => $ppa4,
        ]);
    }

    public function update(UpdatePPA4Request $request, PPA4 $ppa4)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($ppa4->$key);
                $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppa4', $file->hashName());
            }
        }
        PPA4::where('id', $ppa4->id)->update($data);
        return redirect(route('ppa4.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(PPA4 $ppa4)
    {
        $this->authorize('pengguna');
        foreach ($ppa4->only(
            'surat_pengantar_camat',
            'surat_permohonan_penyaluran',
            'laporan_realisasi_bulan',
            'laporan_realisasi_triwulan',
            'laporan_realisasi_semester',
            'presentase_bayar',
        ) as $path) {
            Storage::delete($path);
        }
        PPA4::destroy($ppa4->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
