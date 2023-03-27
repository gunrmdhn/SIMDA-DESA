<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePPDD2Request extends FormRequest
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
            'lorpdd3' => 'required|mimes:pdf',
            'lorpdd1' => 'required|mimes:pdf',
            'sptjm' => 'required|mimes:pdf',
            'pakta_integritas' => 'required|mimes:pdf',
        ];
    }

    public function attributes()
    {
        return [
            'lorpdd3' => 'laporan output realisasi penyerapan dana desa tahap III tahun ' . now()->year - 1,
            'lorpdd1' => 'laporan output realisasi penyerapan dana desa tahap I tahun ' . now()->year,
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }
}
