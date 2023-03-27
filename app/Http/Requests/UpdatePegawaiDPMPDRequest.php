<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePegawaiDPMPDRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_pegawai' => 'required',
            'alamat' => 'required',
            'nomor_ktp' => 'required',
            'nomor_sk_jabatan' => 'required',
            'tmt_pelantikan' => 'required',
            'tmt' => 'required',
            'nomor_sk' => 'required',
            'npwp' => 'required',
            'file_dokumen' => 'mimes:pdf',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'nama_pegawai' =>  Str::title($this->alamat),
            'alamat' =>  Str::upper($this->alamat),
        ]);
    }
}
