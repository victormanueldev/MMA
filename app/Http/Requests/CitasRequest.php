<?php

namespace MundoMascotasApp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitasRequest extends FormRequest
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
            'motivo' => 'required|string|max:60',
            'fecha_cita' => 'required|date',
            'fecha_sintomas' => 'required|date',
            'hora_cita' => 'required'
        ];
    }
}
