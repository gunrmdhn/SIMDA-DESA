<?php

namespace App\Http\Controllers\PPMD\PUEM;

use App\Models\BUMDes;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBUMDesRequest;
use App\Http\Requests\UpdateBUMDesRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class RegistrasiController extends Controller
{
    private $menu = 'Pembangunan Dan Pemberdayaan Masyarakat Desa / Pengembangan Usaha Ekonomi Masyarakat';
    private $title = 'Registrasi BUMDes';

    public function index()
    {
        return view('ppmd/puem/registrasi/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => auth()->user()->peran === 'Pengguna' ? auth()->user()->userBUMdes : BUMDes::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna');
        $kode = IdGenerator::generate([
            'table' => 'tabel_bumdes',
            'field' => 'kode',
            'length' => 10,
            'prefix' => auth()->user()->kode_kecamatan . auth()->user()->kode_desa . '-',
            'reset_on_prefix_change' => true,
        ]);
        return view('ppmd/puem/registrasi/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'kode_kecamatan' => auth()->user()->kode_kecamatan,
            'kecamatan' => auth()->user()->kecamatan,
            'kode_desa' => auth()->user()->kode_desa,
            'desa' => auth()->user()->desa,
            'data' => new BUMDes(),
            'jenis_kelamin' => ['Laki-Laki', 'Perempuan'],
            'verifikasi' => ['Terverifikasi', 'Tidak Terverifikasi'],
        ]);
    }

    public function store(StoreBUMDesRequest $request)
    {
        $this->authorize('pengguna');
        BUMDes::create($request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa'));
        return redirect(route('registrasi.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(BUMDes $bumdes)
    {
        $this->authorize('pengguna');
        return view('ppmd/puem/registrasi/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $bumdes->kode,
            'kode_kecamatan' => $bumdes->bumdesUser->kode_kecamatan,
            'kecamatan' => $bumdes->bumdesUser->kecamatan,
            'kode_desa' => $bumdes->bumdesUser->kode_desa,
            'desa' => $bumdes->bumdesUser->desa,
            'data' => $bumdes,
        ]);
    }

    public function edit(BUMDes $bumdes)
    {
        $this->authorize('pengguna');
        return view('ppmd/puem/registrasi/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $bumdes->kode,
            'kode_kecamatan' => $bumdes->bumdesUser->kode_kecamatan,
            'kecamatan' => $bumdes->bumdesUser->kecamatan,
            'kode_desa' => $bumdes->bumdesUser->kode_desa,
            'desa' => $bumdes->bumdesUser->desa,
            'data' => $bumdes,
            'jenis_kelamin' => ['Laki-Laki', 'Perempuan'],
            'verifikasi' => ['Terverifikasi', 'Tidak Terverifikasi'],
        ]);
    }

    public function update(UpdateBUMDesRequest $request, BUMDes $bumdes)
    {
        $this->authorize('pengguna');
        BUMDes::where('id', $bumdes->id)->update($request->except('kode_kecamatan', 'kecamatan', 'kode_desa', 'desa', '_token', '_method'));
        return redirect(route('registrasi.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(BUMDes $bumdes)
    {
        $this->authorize('pengguna');
        BUMDes::destroy($bumdes->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
