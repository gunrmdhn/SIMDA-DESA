<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        $pd = collect([
            'PD' => [
                'apd' => 'Administrasi Pemerintahan Desa',
                'pkad' => 'Pengelolaan Keuangan Dan Aset Desa',
            ],
        ]);
        $kmd = collect([
            'KMD' => [
                'kd' => 'Kelembagaan Desa',
                'diepd' => 'Data Informasi Dan Evaluasi Perkembangan Desa',
            ],
        ]);
        $ppmd = collect([
            'PPMD' => [
                'puem' => 'Pengembangan Usaha Ekonomi Masyarakat',
                // 'psdattg' => 'Pemberdayaan Sumber Daya Alam Dan Teknologi Tepat Guna',
                '#' => 'Pemberdayaan Sumber Daya Alam Dan Teknologi Tepat Guna',
            ],
        ]);
        $pkp = collect([
            'PKP' => [
                'pspkp' => 'Pengembangan Sarana Dan Prasaranan Kawasan Perdesaan',
                'ppkp' => 'Perencanaan Pembangunan Kawasan Perdesaan',
            ],
        ]);
        $sekretariat = collect([
            'Sekretariat DPMPD' => [
                'pegawai-dpmpd.index' => 'Database Pegawai DPMPD',
                'surat-masuk.index' => 'Surat Masuk Elektronik',
            ],
        ]);
        $lock = collect([
            'Data Kenaikan Pangkat Dan Berskala ASN DPMPD',
            'Dokumentasi Arsip SKP ASN DPMPD',
            'Surat Keluar Elektronik Per Kecamatan',
            'Surat Edaran',
        ]);
        return view('components.header', [
            'pd' => $pd,
            'kmd' => $kmd,
            'ppmd' => $ppmd,
            'pkp' => $pkp,
            'sekretariat' => $sekretariat,
            'lock' => $lock,
        ]);
    }
}
