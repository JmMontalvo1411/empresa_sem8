<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cPerApellido' => 'required|string|max:255',
            'cPerNombre' => 'required|string|max:255',
            'cPerDireccion' => 'required|string|max:255',
            'dPerFechaNac' => 'required|date',
            'nPerEdad' => 'required|integer|min:0',
            'nPerSueldo' => 'required|numeric|min:0',
            'nPerEstado' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'cPerApellido.required' => 'El campo Apellido es obligatorio.',
            'cPerNombre.required' => 'El campo Nombre es obligatorio.',
            'cPerDireccion.required' => 'El campo Dirección es obligatorio.',
            'dPerFechaNac.required' => 'El campo Fecha de Nacimiento es obligatorio.',
            'nPerEdad.required' => 'El campo Edad es obligatorio.',
            'nPerSueldo.required' => 'El campo Sueldo es obligatorio.',
            'nPerEstado.required' => 'El campo Estado es obligatorio.',
        ];
    }
}
