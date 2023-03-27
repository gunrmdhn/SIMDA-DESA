<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePPBLT1Request extends FormRequest
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
            'perkades' => 'required|mimes:pdf',
            'perekaman' => 'required|mimes:pdf',
            'perkades_tidak' => 'required|mimes:pdf',
        ];
    }

    public function attributes()
    {
        return [
            'surat_permohonan_penyaluran' => 'surat permohonan penyaluran bulan januari/maret',
            'perkades' => 'perkades daftar kpm penerima blt ' . now()->year,
            'perekaman' => 'perekaman blt sampai dengan bulan desember ' . now()->year - 1,
            'perkades_tidak' => 'perkades tidak cukup anggaran/perkades tidak tersedia penerima blt',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }
}
