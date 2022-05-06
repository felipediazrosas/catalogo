<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => ['required', 'max:255', 'string'],
            'precio' => ['required', 'max:255', 'string'],
            'imagen' => ['file', 'max:1024'],
            'observacion' => ['required', 'max:255', 'string'],
            'allCiudades' => ['array'],
        ];
    }
}
