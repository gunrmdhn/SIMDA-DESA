<?php

namespace App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran;

use App\Models\PPDD1;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePPDD1Request;
use App\Http\Requests\UpdatePPDD1Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PPDD1Controller extends Controller
{
    private $menu = 'Pemerintahan Desa / Administrasi Pemerintahan Desa / Informasi Persyaratan Penyaluran ADD dan Dana Desa';
    private $title = 'Persyaratan Penyaluran Dana Desa Tahap 1';

    public function index()
    {
        return view('pd/pkad/persyaratan-penyaluran/ppdd1/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userPPDD1 : PPDD1::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_ppdd1',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/pkad/persyaratan-penyaluran/ppdd1/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new PPDD1(),
        ]);
    }

    public function store(StorePPDD1Request $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppdd1', $file->hashName());
        }
        PPDD1::create($data);
        return redirect(route('ppdd1.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(PPDD1 $ppdd1)
    {
        //
    }

    public function edit(PPDD1 $ppdd1)
    {
        $this->authorize('pengguna');
        return view('pd/pkad/persyaratan-penyaluran/ppdd1/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $ppdd1->kode,
            'kode_kecamatan' => $ppdd1->ppdd1User->kode_kecamatan,
            'kecamatan' => $ppdd1->ppdd1User->kecamatan,
            'kode_desa' => $ppdd1->ppdd1User->kode_desa,
            'desa' => $ppdd1->ppdd1User->desa,
            'data' => $ppdd1,
        ]);
    }

    public function update(UpdatePPDD1Request $request, PPDD1 $ppdd1)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($ppdd1->$key);
                $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppdd1', $file->hashName());
            }
        }
        PPDD1::where('id', $ppdd1->id)->update($data);
        return redirect(route('ppdd1.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(PPDD1 $ppdd1)
    {
        $this->authorize('pengguna');
        foreach ($ppdd1->only(
            'surat_pengantar_camat',
            'surat_permohonan_penyaluran',
            'perdes_apbdes_lampiran',
            'perkades_penjabaran_apbdes_lampiran',
            'berita_acara_keputusan_bpd',
            'dpa',
            'rak',
            'rka',
            'sk_ppkd',
            'sptjm',
            'pakta_integritas',
            'fotocopy_buku_rekening',
            'laporan_realisasi_dd',
            'desain_gambar_rab_teknis',
        ) as $path) {
            Storage::delete($path);
        }
        PPDD1::destroy($ppdd1->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
