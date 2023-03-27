<?php

namespace App\Http\Controllers\SekretariatDPMDP;

use App\Models\SuratMasuk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Requests\StoreSuratMasukRequest;
use App\Http\Requests\UpdateSuratMasukRequest;

class SuratMasukController extends Controller
{
    private $menu = 'Sekretariat DPMPD';
    private $title = 'Surat Masuk Elektronik';

    public function index()
    {
        $this->authorize('sekretariat');
        return view('sekretariat-dpmpd/surat-masuk/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => SuratMasuk::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('sekretariat');
        $kode = IdGenerator::generate([
            'table' => 'tabel_surat_masuk',
            'field' => 'kode',
            'length' => 7,
            'prefix' => 'SM-',
            'reset_on_prefix_change' => true,
        ]);
        return view('sekretariat-dpmpd/surat-masuk/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'bulan_terima' => [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
            ],
            'data' => new SuratMasuk(),
        ]);
    }

    public function store(StoreSuratMasukRequest $request)
    {
        $this->authorize('sekretariat');
        $data = $request->all();
        $data['file_surat_masuk'] = $request->file('file_surat_masuk')->storeAs('sekretariat-dpmpd/surat-masuk', $request->file('file_surat_masuk')->hashName());
        SuratMasuk::create($data);
        return redirect(route('surat-masuk.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(SuratMasuk $suratMasuk)
    {
        //
    }

    public function edit(SuratMasuk $suratMasuk)
    {
        $this->authorize('sekretariat');
        return view('sekretariat-dpmpd/surat-masuk/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $suratMasuk->kode,
            'bulan_terima' => [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
            ],
            'data' => $suratMasuk,
        ]);
    }

    public function update(UpdateSuratMasukRequest $request, SuratMasuk $suratMasuk)
    {
        $this->authorize('sekretariat');
        $data = $request->except('_token', '_method');
        if ($request->file('file_surat_masuk')) {
            Storage::delete($suratMasuk->file_surat_masuk);
            $data['file_surat_masuk'] = $request->file('file_surat_masuk')->storeAs('sekretariat-dpmpd/surat-masuk', $request->file('file_surat_masuk')->hashName());
        }
        SuratMasuk::where('id', $suratMasuk->id)->update($data);
        return redirect(route('surat-masuk.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(SuratMasuk $suratMasuk)
    {
        $this->authorize('sekretariat');
        Storage::delete($suratMasuk->file_surat_masuk);
        SuratMasuk::destroy($suratMasuk->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
