<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRealisasiAPBDesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'jumlah_salur_add' => 'required',
            'realisasi_belanja_add' => 'required',
            'sisa_add' => 'required',
            'jumlah_salur_dana_desa' => 'required',
            'realisasi_belanja_dana_desa' => 'required',
            'sisa_dana_desa' => 'required',
            'baliho' => 'image',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }
}
