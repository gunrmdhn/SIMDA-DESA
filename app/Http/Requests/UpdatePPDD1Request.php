<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePPDD1Request extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'surat_pengantar_camat' => 'mimes:pdf',
            'surat_permohonan_penyaluran' => 'mimes:pdf',
            'perdes_apbdes_lampiran' => 'mimes:pdf',
            'perkades_penjabaran_apbdes_lampiran' => 'mimes:pdf',
            'berita_acara_keputusan_bpd' => 'mimes:pdf',
            'dpa' => 'mimes:pdf',
            'rak' => 'mimes:pdf',
            'rka' => 'mimes:pdf',
            'sk_ppkd' => 'mimes:pdf',
            'sptjm' => 'mimes:pdf',
            'pakta_integritas' => 'mimes:pdf',
            'fotocopy_buku_rekening' => 'mimes:pdf',
            'laporan_realisasi_dd' => 'mimes:pdf',
            'desain_gambar_rab_teknis' => 'mimes:pdf',
        ];
    }

    public function attributes()
    {
        return [
            'perdes_apbdes_lampiran' => 'perdes apbdes ' . now()->year . ' + lampiran',
            'perkades_penjabaran_apbdes_lampiran' => 'perkades penjabaran apbdes ' . now()->year . ' + lampiran',
            'berita_acara_keputusan_bpd' => 'berita acara + keputusan bpd tentang kesepakatan apbdes',
            'fotocopy_buku_rekening' => 'fotocopy buku rekening desa',
            'laporan_realisasi_dd' => 'laporan realisasi dd t.a ' . now()->year - 1,
            'desain_gambar_rab_teknis' => 'desain gambar dan rab teknis keg. fisik',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }
}
