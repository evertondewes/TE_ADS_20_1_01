<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'text' => 'required|max:150'
        ];
    }

    public function messages()
    {
        return [
            'text.required' => 'Obrigatório!',
            'text.max' => 'Tamanho máximo 150 caracteres!'
        ];
    }

}
