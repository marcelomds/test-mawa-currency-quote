<?php

namespace App\Http\Requests\Quote;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
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
            'price' => 'required|numeric',
            'currency_from' => 'required',
            'currency_to' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'price.required' => 'O campo Valor é Obrigatório',
          'currency_from.required' => 'O campo Converter de: é Obrigatório',
          'currency_to.required' => 'O campo Para: é Obrigatório',
        ];
    }
}
