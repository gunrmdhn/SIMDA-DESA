<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePPA3Request extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'surat_pengantar_camat' => 'required|mimes:pdf',
            'surat_permohonan_penyaluran' => 'required|mimes:pdf',
            'laporan_realisasi_bulan' => 'required|mimes:pdf',
            'laporan_realisasi_triwulan' => 'required|mimes:pdf',
            'laporan_realisasi_semester' => 'required|mimes:pdf',
            'presentase_bayar' => 'required|mimes:pdf',
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
