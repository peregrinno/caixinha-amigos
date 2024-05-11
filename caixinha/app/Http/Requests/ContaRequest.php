<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // ALTERAR PARA TRUE
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
            'nome' => 'required',
            'valor' => 'required',
            'vencimento' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Campo nome é obrigatório',
            'valor.required' => 'Campo valor é obrigatório',
            'vencimento.required' => 'Campo vencimento é obrigatório',
        ];
    }
}
