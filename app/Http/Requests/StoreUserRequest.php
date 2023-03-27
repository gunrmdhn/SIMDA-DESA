<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_pengguna' => 'required|alpha_dash|unique:users,nama_pengguna',
            'peran' => 'required',
            'kode_kecamatan' => 'required_if:peran,Akun Desa|prohibited_if:peran,Admin,Sekretariat,Kepala Bidang,BPD,Bappeda,Inspektorat|max:2',
            'kecamatan' => 'required_if:peran,Akun Desa|prohibited_if:peran,Admin,Sekretariat,Kepala Bidang,BPD,Bappeda,Inspektorat|'
                . Rule::unique('users')
                ->where(fn ($query) => $query
                    ->where('kecamatan', $this->kecamatan))
                ->where('desa', $this->desa),
            'kode_desa' => 'required_if:peran,Akun Desa|prohibited_if:peran,Admin,Sekretariat,Kepala Bidang,BPD,Bappeda,Inspektorat|max:4',
            'desa' => 'required_if:peran,Akun Desa|prohibited_if:peran,Admin,Sekretariat,Kepala Bidang,BPD,Bappeda,Inspektorat|'
                . Rule::unique('users')
                ->where(fn ($query) => $query
                    ->where('kecamatan', $this->kecamatan))
                ->where('desa', $this->desa),
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'kata sandi',
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
