<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePPDD2Request extends FormRequest
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
            'lorpdd3' => 'mimes:pdf',
            'lorpdd1' => 'mimes:pdf',
            'sptjm' => 'mimes:pdf',
            'pakta_integritas' => 'mimes:pdf',
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
