<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class StoreKadesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required',
            'nomor_sk' => 'required',
            'tanggal_sk' => 'required',
            'tanggal_pelantikan' => 'required',
            'periode_jabatan' => 'required|regex:/^[0-9.\-_]+$/',
            'file_sk' => 'required|mimes:pdf',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id,
            'nama' => Str::title($this->nama),
        ]);
    }
}
