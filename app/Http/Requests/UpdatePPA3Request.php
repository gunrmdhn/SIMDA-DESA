<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePPA3Request extends FormRequest
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
            'laporan_realisasi_bulan' => 'mimes:pdf',
            'laporan_realisasi_triwulan' => 'mimes:pdf',
            'laporan_realisasi_semester' => 'mimes:pdf',
            'presentase_bayar' => 'mimes:pdf',
        ];
    }

    public function attributes()
    {
        return [
            'laporan_realisasi_bulan' => 'laporan realisasi add per bulan',
            'laporan_realisasi_triwulan' => 'laporan realisasi add per triwulan',
            'laporan_realisasi_semester' => 'laporan realisasi add per semester',
            'presentase_bayar' => 'presentase bayar pbb diatas 50%',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }
}
