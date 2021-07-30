<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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
            "name"=>"required",
            "birthdate"=>"required|date|before:today",
            "cpf"=>"required_if:foreign,0",
            "state"=>"required_if:foreign,0",
            "birthcity"=>"required_if:foreign,0",
        ];
    }

    public function messages()
    {
        return [
            "cpf.required_if"=>"O campo CPF é obrigatório para Brasileiros",
            "birthcity.required_if"=>"O campo Município de Nascimento é obrigatório para Brasileiros",
            "state.required_if"=>"O campo UF de Nascimento é obrigatório para Brasileiros",
            "state.max"=>"Valor inválido para  UF",
            "state.min"=>"Valor inválido para  UF"
        ];
    }
}
