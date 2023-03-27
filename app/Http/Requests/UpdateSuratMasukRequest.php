<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSuratMasukRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tahun_terima' => 'required',
            'tanggal_terima' => 'required',
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required',
            'asal_surat' => 'required',
            'tujuan_surat' => 'required',
            'perihal_surat' => 'required',
            'file_surat_masuk' => 'mimes:pdf',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'asal_surat' =>  Str::title($this->asal_surat),
            'tujuan_surat' =>  Str::title($this->tujuan_surat),
            'perihal_surat' =>  Str::title($this->perihal_surat),
        ]);
    }
}
