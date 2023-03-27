<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBUMDesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_bumdes' => 'required',
            'tahun_pembentukan' => 'required',
            'npp' => 'required',
            'nkkpp' => 'required',
            'nama_ketua' => 'required',
            'alamat' => 'required',
            'jumlah_pengurus' => 'required',
            'jumlah_unit_usaha' => 'required',
            'jumlah_omzet' => 'required',
            'jumlah_total_pmd' => 'required',
            'jumlah_total_pmsl' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'npp' => 'nomor perdes pembentukan',
            'nkkpp' => 'nomor keputusan kades pengangkatan pengurus',
            'jumlah_omzet' => 'jumlah omzet tahun ' . now()->year - 1,
            'jumlah_total_pmd' => 'jumlah total penyertaan modal desa',
            'jumlah_total_pmsl' => 'jumlah total penyertaan modal desa',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id,
            'nama_bumdes' => Str::title($this->nama_bumdes),
            'nama_ketua' => Str::title($this->nama_ketua),
            'alamat' =>  Str::upper($this->alamat),
        ]);
    }
}
