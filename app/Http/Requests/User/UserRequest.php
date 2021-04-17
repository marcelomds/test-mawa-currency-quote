<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'  => 'required|min:3|string',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'É obrigatório informar um Nome',
            'name.min:3' => 'O nome não pode ser menos que 3 letras',
            'email.required' => 'É obrigatório informar um E-mail',
            'email.email' => 'E e-mail está em um formato inválido'
        ];
    }
}
