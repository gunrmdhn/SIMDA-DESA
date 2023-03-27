<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBeritaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar' => 'image',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'judul' => Str::title($this->judul),
            'keterangan' => Str::ucfirst($this->keterangan),
        ]);
    }
}
