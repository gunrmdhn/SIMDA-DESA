<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePPDD3Request extends FormRequest
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
            'lorpdd2' => 'mimes:pdf',
            'sptjm' => 'mimes:pdf',
            'pakta_integritas' => 'mimes:pdf',
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
