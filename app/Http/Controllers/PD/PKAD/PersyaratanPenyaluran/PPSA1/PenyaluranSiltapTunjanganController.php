<?php

namespace App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran\PPSA1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\PenyaluranSiltapTunjangan;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Requests\StorePenyaluranSiltapTunjanganRequest;
use App\Http\Requests\UpdatePenyaluranSiltapTunjanganRequest;

class PenyaluranSiltapTunjanganController extends Controller
{
    private $menu = 'Pemerintahan Desa / Administrasi Pemerintahan Desa / Informasi Persyaratan Penyaluran ADD dan Dana Desa';
    private $title = 'Permohonan Penyaluran Siltap dan Tunjangan';

    public function index()
    {
        return view('pd/pkad/persyaratan-penyaluran/ppsa1/penyaluran-siltap-tunjangan/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userPenyaluranSiltapTunjangan : PenyaluranSiltapTunjangan::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_penyaluran_siltap_tunjangan',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/pkad/persyaratan-penyaluran/ppsa1/penyaluran-siltap-tunjangan/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new PenyaluranSiltapTunjangan(),
        ]);
    }

    public function store(StorePenyaluranSiltapTunjanganRequest $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppsa1/penyaluran-siltap-tunjangan', $file->hashName());
        }
        PenyaluranSiltapTunjangan::create($data);
        return redirect(route('penyaluran-siltap-tunjangan.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(PenyaluranSiltapTunjangan $penyaluranSiltapTunjangan)
    {
        //
    }

    public function edit(PenyaluranSiltapTunjangan $penyaluranSiltapTunjangan)
    {
        $this->authorize('pengguna');
        return view('pd/pkad/persyaratan-penyaluran/ppsa1/penyaluran-siltap-tunjangan/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $penyaluranSiltapTunjangan->kode,
            'kode_kecamatan' => $penyaluranSiltapTunjangan->penyaluranSiltapTunjanganUser->kode_kecamatan,
            'kecamatan' => $penyaluranSiltapTunjangan->penyaluranSiltapTunjanganUser->kecamatan,
            'kode_desa' => $penyaluranSiltapTunjangan->penyaluranSiltapTunjanganUser->kode_desa,
            'desa' => $penyaluranSiltapTunjangan->penyaluranSiltapTunjanganUser->desa,
            'data' => $penyaluranSiltapTunjangan,
        ]);
    }

    public function update(UpdatePenyaluranSiltapTunjanganRequest $request, PenyaluranSiltapTunjangan $penyaluranSiltapTunjangan)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($penyaluranSiltapTunjangan->$key);
                $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppsa1/penyaluran-siltap-tunjangan', $file->hashName());
            }
        }
        PenyaluranSiltapTunjangan::where('id', $penyaluranSiltapTunjangan->id)->update($data);
        return redirect(route('penyaluran-siltap-tunjangan.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(PenyaluranSiltapTunjangan $penyaluranSiltapTunjangan)
    {
        $this->authorize('pengguna');
        foreach ($penyaluranSiltapTunjangan->only('surat_pengantar_camat', 'surat_permohonan_penyaluran') as $path) {
            Storage::delete($path);
        }
        PenyaluranSiltapTunjangan::destroy($penyaluranSiltapTunjangan->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
