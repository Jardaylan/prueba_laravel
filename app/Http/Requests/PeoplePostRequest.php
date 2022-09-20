<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeoplePostRequest extends FormRequest
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
            'name' => 'required',
            'last_name'=> 'required',
            'document'=> 'required',
            'departament'=> 'required',
            'city'=> 'required',
            'mobile'=> 'required',
            'email'=> 'required|email',
            'habeas_data'=> 'accepted'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio.',
            'last_name.required' => 'El :attribute es obligatorio.',
            'document.required' => 'La :attribute es obligatoria.',
            'city.required' => 'El :attribute es obligatorio.',
            'mobile.required' => 'El :attribute es obligatorio.',
            'email.required' => 'El :attribute es obligatorio.',
            'departament.required' => 'El :attribute es obligatorio.',
            'habeas_data.accepted' => 'El :attribute es obligatorio.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'last_name' => 'Apellido',
            'document' => 'Documento',
            'city' => 'Ciudad',
            'email' => 'Correo electonico',
            'departament' => 'Departemento',
            'habeas_data' => 'Habeas Data',
            'mobile' => 'Numero de Telefóno',
        ];
    }
}
