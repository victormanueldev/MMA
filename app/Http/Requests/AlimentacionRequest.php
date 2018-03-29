<?php

namespace MundoMascotasApp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlimentacionRequest extends FormRequest
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
            'tipo_alimento' => 'required',
            'marca' => 'required',
            'ultima_compra' => 'required|date',
            'frecuencia_compra' => 'required',
            'cantidad_compra' => 'required'

        ];
    }
}
