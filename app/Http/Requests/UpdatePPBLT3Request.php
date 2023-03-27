<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePPBLT3Request extends FormRequest
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
            'laporan_pembayaran' => 'mimes:pdf',
        ];
    }

    public function attributes()
    {
        return [
            'surat_permohonan_penyaluran' => 'surat permohonan penyaluran bulan juli/september',
            'laporan_pembayaran' => 'laporan pembayaran blt tahap 2',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }
}
