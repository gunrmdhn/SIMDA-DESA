<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIDMRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'status_dm_sebelum' => 'required',
            'status_dm_sesudah' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'status_dm_sebelum' => 'status dm ' . now()->year - 1,
            'status_dm_sesudah' => 'status dm ' . now()->year,
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }
}
