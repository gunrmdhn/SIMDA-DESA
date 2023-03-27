<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAPBDesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'pagu_add' => 'required',
            'jumlah_belanja_add' => 'required',
            'jumlah_salur_dana_desa' => 'required',
            'jumlah_belanja_dana_desa' => 'required',
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
