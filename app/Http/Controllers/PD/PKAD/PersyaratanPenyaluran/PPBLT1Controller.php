<?php

namespace App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran;

use App\Models\PPBLT1;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePPBLT1Request;
use App\Http\Requests\UpdatePPBLT1Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PPBLT1Controller extends Controller
{
    private $menu = 'Pemerintahan Desa / Administrasi Pemerintahan Desa / Informasi Persyaratan Penyaluran ADD dan Dana Desa';
    private $title = 'Persyaratan Penyaluran BLT Tahap 1';

    public function index()
    {
        return view('pd/pkad/persyaratan-penyaluran/ppblt1/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userPPBLT1 : PPBLT1::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_ppblt1',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pd/pkad/persyaratan-penyaluran/ppblt1/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new PPBLT1(),
        ]);
    }

    public function store(StorePPBLT1Request $request)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppblt1', $file->hashName());
        }
        PPBLT1::create($data);
        return redirect(route('ppblt1.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(PPBLT1 $ppblt1)
    {
        //
    }

    public function edit(PPBLT1 $ppblt1)
    {
        $this->authorize('pengguna');
        return view('pd/pkad/persyaratan-penyaluran/ppblt1/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $ppblt1->kode,
            'kode_kecamatan' => $ppblt1->ppblt1User->kode_kecamatan,
            'kecamatan' => $ppblt1->ppblt1User->kecamatan,
            'kode_desa' => $ppblt1->ppblt1User->kode_desa,
            'desa' => $ppblt1->ppblt1User->desa,
            'data' => $ppblt1,
        ]);
    }

    public function update(UpdatePPBLT1Request $request, PPBLT1 $ppblt1)
    {
        $this->authorize('pengguna');
        $data = $request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($ppblt1->$key);
                $data[$key] = $file->storeAs('pd/pkad/persyaratan-penyaluran/ppblt1', $file->hashName());
            }
        }
        PPBLT1::where('id', $ppblt1->id)->update($data);
        return redirect(route('ppblt1.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(PPBLT1 $ppblt1)
    {
        $this->authorize('pengguna');
        foreach ($ppblt1->only(
            'surat_pengantar_camat',
            'surat_permohonan_penyaluran',
            'perkades',
            'perekaman',
            'perkades_tidak',
        ) as $path) {
            Storage::delete($path);
        }
        ppblt1::destroy($ppblt1->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
