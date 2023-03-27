<?php

namespace App\Http\Controllers\SekretariatDPMDP;

use App\Models\PegawaiDPMPD;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Requests\StorePegawaiDPMPDRequest;
use App\Http\Requests\UpdatePegawaiDPMPDRequest;

class PegawaiDPMPDController extends Controller
{
    private $menu = 'Sekretariat DPMPD';
    private $title = 'Database Pegawai DPMPD';

    public function index()
    {
        $this->authorize('sekretariat');
        return view('sekretariat-dpmpd/pegawai-dpmpd/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => PegawaiDPMPD::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('sekretariat');
        $kode = IdGenerator::generate([
            'table' => 'tabel_pegawai_dpmpd',
            'field' => 'kode',
            'length' => 11,
            'prefix' => 'PDPMPD-',
            'reset_on_prefix_change' => true,
        ]);
        return view('sekretariat-dpmpd/pegawai-dpmpd/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'jenis_kelamin' => ['Laki-Laki', 'Perempuan'],
            'data' => new PegawaiDPMPD(),
        ]);
    }

    public function store(StorePegawaiDPMPDRequest $request)
    {
        $this->authorize('sekretariat');
        $data = $request->all();
        $data['file_dokumen'] = $request->file('file_dokumen')->storeAs('sekretariat-dpmpd/pegawai-dpmpd', $request->file('file_dokumen')->hashName());
        PegawaiDPMPD::create($data);
        return redirect(route('pegawai-dpmpd.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(PegawaiDPMPD $pegawaiDPMPD)
    {
        //
    }

    public function edit(PegawaiDPMPD $pegawaiDPMPD)
    {
        $this->authorize('sekretariat');
        return view('sekretariat-dpmpd/pegawai-dpmpd/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $pegawaiDPMPD->kode,
            'jenis_kelamin' => ['Laki-Laki', 'Perempuan'],
            'data' => $pegawaiDPMPD,
        ]);
    }

    public function update(UpdatePegawaiDPMPDRequest $request, PegawaiDPMPD $pegawaiDPMPD)
    {
        $this->authorize('sekretariat');
        $data = $request->except('_token', '_method');
        if ($request->file('file_dokumen')) {
            Storage::delete($pegawaiDPMPD->file_dokumen);
            $data['file_dokumen'] = $request->file('file_dokumen')->storeAs('sekretariat-dpmpd/pegawai-dpmpd', $request->file('file_dokumen')->hashName());
        }
        PegawaiDPMPD::where('id', $pegawaiDPMPD->id)->update($data);
        return redirect(route('pegawai-dpmpd.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(PegawaiDPMPD $pegawaiDPMPD)
    {
        $this->authorize('sekretariat');
        Storage::delete($pegawaiDPMPD->file_dokumen);
        PegawaiDPMPD::destroy($pegawaiDPMPD->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
