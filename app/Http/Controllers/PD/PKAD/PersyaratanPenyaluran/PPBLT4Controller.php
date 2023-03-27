<?php

namespace App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran;

use App\Models\PPBLT4;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePPBLT4Request;
use App\Http\Requests\UpdatePPBLT4Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PPBLT4Controller extends Controller
{
    private $menu = 'Pemerintahan Desa / Administrasi Pemerintahan Desa / Informasi Persyaratan Penyaluran ADD dan Dana Desa';
    private $title = 'Persyaratan Penyaluran BLT Tahap 4';

    public function index()
    {
        return view('pd/pkad/persyaratan-penyaluran/ppblt4/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userPPBLT4 : PPBLT4::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_ppblt4',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/pkad/persyaratan-penyaluran/ppblt4/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new PPBLT4(),
        ]);
    }

    public function store(StorePPBLT4Request $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppblt4', $file->hashName());
        }
        PPBLT4::create($data);
        return redirect(route('ppblt4.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(PPBLT4 $ppblt4)
    {
        //
    }

    public function edit(PPBLT4 $ppblt4)
    {
        $this->authorize('pengguna');
        return view('pd/pkad/persyaratan-penyaluran/ppblt4/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $ppblt4->kode,
            'kode_kecamatan' => $ppblt4->ppblt4User->kode_kecamatan,
            'kecamatan' => $ppblt4->ppblt4User->kecamatan,
            'kode_desa' => $ppblt4->ppblt4User->kode_desa,
            'desa' => $ppblt4->ppblt4User->desa,
            'data' => $ppblt4,
        ]);
    }

    public function update(UpdatePPBLT4Request $request, PPBLT4 $ppblt4)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($ppblt4->$key);
                $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppblt4', $file->hashName());
            }
        }
        PPBLT4::where('id', $ppblt4->id)->update($data);
        return redirect(route('ppblt4.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(PPBLT4 $ppblt4)
    {
        $this->authorize('pengguna');
        foreach ($ppblt4->only(
            'surat_pengantar_camat',
            'surat_permohonan_penyaluran',
            'laporan_pembayaran',
        ) as $path) {
            Storage::delete($path);
        }
        ppblt4::destroy($ppblt4->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
