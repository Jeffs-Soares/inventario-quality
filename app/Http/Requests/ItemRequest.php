<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
   public function rules(): array
    {
        return [
            'item_descricao' => 'required|string|max:255|min:3'
        ];
    }

    public function messages(): array
    {
        return [
            'item_descricao.required' => 'O campo de descrição é obrigatório.',
            'item_descricao.min' => 'O campo de descrição é precisa ter no mínimo 3 caracteres.',
            'item_descricao.max' => 'O campo de descrição está muito longo.'
        ];
        
    }
}
