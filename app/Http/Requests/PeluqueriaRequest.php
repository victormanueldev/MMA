<?php

namespace MundoMascotasApp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeluqueriaRequest extends FormRequest
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
            'servicio' => 'required',
            'especificacion_corte' => 'max: 60|required',
            'fecha_peluqueria' => 'required|date',
            'hora_peluqueria' => 'required'
        ];
    }
}
