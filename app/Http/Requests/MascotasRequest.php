<?php

namespace MundoMascotasApp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MascotasRequest extends FormRequest
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
            'tipo_mascota' => 'required',
            'nombre_mascota' => 'required',
            'sexo_mascota' => 'required',
            'fecha_nacimiento_mascota' => 'required|date',
            'raza' => 'required',
            'color' => 'required',
            'esterilizado' => 'required',
            'peso' => 'required',
            'nombre_ultima_vacuna' => 'required'
        ];
    }
}
