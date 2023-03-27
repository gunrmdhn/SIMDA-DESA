<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePenyaluranSiltapTunjanganRequest extends FormRequest
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
        ];
    }

    public function attributes()
    {
        return [
            'surat_pengantar_camat' => 'surat pengantar camat permohonan salur siltap',
            'surat_permohonan_penyaluran' => 'surat permohonan penyaluran oleh kepala desa permohonan salur siltap',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }
}
