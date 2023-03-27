<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePPDD3Request extends FormRequest
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
            'lorpdd2' => 'required|mimes:pdf',
            'sptjm' => 'required|mimes:pdf',
            'pakta_integritas' => 'required|mimes:pdf',
        ];
    }

    public function attributes()
    {
        return [
            'lorpdd2' => 'laporan output realisasi penyerapan dana desa tahap II tahun ' . now()->year,
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }
}
