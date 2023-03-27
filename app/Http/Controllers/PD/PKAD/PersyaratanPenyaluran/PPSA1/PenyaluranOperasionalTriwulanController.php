<?php

namespace App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran\PPSA1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\PenyaluranOperasionalTriwulan;
use App\Http\Requests\StorePenyaluranOperasionalTriwulanRequest;
use App\Http\Requests\UpdatePenyaluranOperasionalTriwulanRequest;

class PenyaluranOperasionalTriwulanController extends Controller
{
    private $menu = 'Pemerintahan Desa / Administrasi Pemerintahan Desa / Informasi Persyaratan Penyaluran ADD dan Dana Desa';
    private $title = 'Permohonan Penyaluran Opresional Triwulan I ';

    public function index()
    {
        return view('pd/pkad/persyaratan-penyaluran/ppsa1/penyaluran-operasional-triwulan/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userPenyaluranOperasionalTriwulan : PenyaluranOperasionalTriwulan::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_penyaluran_operasional_triwulan',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/pkad/persyaratan-penyaluran/ppsa1/penyaluran-operasional-triwulan/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new PenyaluranOperasionalTriwulan(),
        ]);
    }

    public function store(StorePenyaluranOperasionalTriwulanRequest $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppsa1/penyaluran-operasional-triwulan', $file->hashName());
        }
        PenyaluranOperasionalTriwulan::create($data);
        return redirect(route('penyaluran-operasional-triwulan.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(PenyaluranOperasionalTriwulan $penyaluranOperasionalTriwulan)
    {
        //
    }

    public function edit(PenyaluranOperasionalTriwulan $penyaluranOperasionalTriwulan)
    {
        $this->authorize('pengguna');
        return view('pd/pkad/persyaratan-penyaluran/ppsa1/penyaluran-operasional-triwulan/index', [
            'menu' => $this->menu,
            'title' => $this->title . now()->year,
            'kode' => $penyaluranOperasionalTriwulan->kode,
            'kode_kecamatan' => $penyaluranOperasionalTriwulan->penyaluranOperasionalTriwulanUser->kode_kecamatan,
            'kecamatan' => $penyaluranOperasionalTriwulan->penyaluranOperasionalTriwulanUser->kecamatan,
            'kode_desa' => $penyaluranOperasionalTriwulan->penyaluranOperasionalTriwulanUser->kode_desa,
            'desa' => $penyaluranOperasionalTriwulan->penyaluranOperasionalTriwulanUser->desa,
            'data' => $penyaluranOperasionalTriwulan,
        ]);
    }

    public function update(UpdatePenyaluranOperasionalTriwulanRequest $request, PenyaluranOperasionalTriwulan $penyaluranOperasionalTriwulan)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($penyaluranOperasionalTriwulan->$key);
                $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppsa1/penyaluran-operasional-triwulan', $file->hashName());
            }
        }
        PenyaluranOperasionalTriwulan::where('id', $penyaluranOperasionalTriwulan->id)->update($data);
        return redirect(route('penyaluran-operasional-triwulan.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(PenyaluranOperasionalTriwulan $penyaluranOperasionalTriwulan)
    {
        $this->authorize('pengguna');
        foreach ($penyaluranOperasionalTriwulan->only(
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
            'daftar_kp_bpjs',
            'laporan_realisasi_add',
            'daftar_pagu_siltap_tunjangan',
        ) as $path) {
            Storage::delete($path);
        }
        PenyaluranOperasionalTriwulan::destroy($penyaluranOperasionalTriwulan->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
