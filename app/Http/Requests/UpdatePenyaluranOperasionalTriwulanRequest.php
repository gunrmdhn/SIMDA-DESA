<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePenyaluranOperasionalTriwulanRequest extends FormRequest
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
            'daftar_kp_bpjs' => 'mimes:pdf',
            'laporan_realisasi_add' => 'mimes:pdf',
            'daftar_pagu_siltap_tunjangan' => 'mimes:pdf',
        ];
    }

    public function attributes()
    {
        return [
            'perdes_apbdes_lampiran' => 'perdes apbdes ' . now()->year . ' + lampiran',
            'perkades_penjabaran_apbdes_lampiran' => 'perkades penjabaran apbdes ' . now()->year . ' + lampiran',
            'berita_acara_keputusan_bpd' => 'berita acara + keputusan bpd tentang kesepakatan apbdes',
            'daftar_kp_bpjs' => 'daftar kp bpjs nakes dan naker',
            'laporan_realisasi_add' => 'laporan realisasi add t.a ' . now()->year - 1,
            'daftar_pagu_siltap_tunjangan' => 'daftar pagu siltap tunjangan 1 tahun',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }
}
