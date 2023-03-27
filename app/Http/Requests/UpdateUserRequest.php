<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_pengguna' => 'required|alpha_dash|unique:users,nama_pengguna,' . $this->id,
            'peran' => 'required',
            'kode_kecamatan' => 'required_if:peran,Akun Desa|prohibited_if:peran,Admin,Sekretariat,Kepala Bidang,BPD,Bappeda,Inspektorat',
            'kecamatan' => 'required_if:peran,Akun Desa|prohibited_if:peran,Admin,Sekretariat,Kepala Bidang,BPD,Bappeda,Inspektorat|'
                . Rule::unique('users')
                ->ignore($this->id)
                ->where(fn ($query) => $query
                    ->where('kecamatan', $this->kecamatan))
                ->where('desa', $this->desa),
            'kode_desa' => 'required_if:peran,Akun Desa|prohibited_if:peran,Admin,Sekretariat,Kepala Bidang,BPD,Bappeda,Inspektorat',
            'desa' => 'required_if:peran,Akun Desa|prohibited_if:peran,Admin,Sekretariat,Kepala Bidang,BPD,Bappeda,Inspektorat|'
                . Rule::unique('users')
                ->ignore($this->id)
                ->where(fn ($query) => $query
                    ->where('kecamatan', $this->kecamatan))
                ->where('desa', $this->desa),
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'kecamatan' =>  Str::upper($this->kecamatan),
            'desa' =>  Str::upper($this->desa),
        ]);
    }
}
