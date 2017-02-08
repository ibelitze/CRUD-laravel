<?php

namespace App\Http\Requests\CRUD;

use Illuminate\Foundation\Http\FormRequest;

class productosUpdateRequest extends FormRequest
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
        'nombre' => 'required|max:50',
        'precio' => 'required',
        'marca_id' => 'required|not_in:0'
      ];
    }


    public function messages()
    {
        return [
            'nombre.required' => 'Debe escribir el nombre del producto',
            'precio.required'  => 'Es necesario ponerle un precio al producto',
            'marca_id.required'  => 'Es necesario escogerle una marca al producto'
        ];
    }
}
