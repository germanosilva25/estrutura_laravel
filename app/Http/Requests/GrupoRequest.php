<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "nome_grupo" => 'required|max:128'
        ];
    }

    public function messages()
    {
        return [
            'nome_grupo.required' => 'O campo nome do grupo é obrigatório.',
            'nome_grupo.max' => 'O campo documento deve ter no máximo 128 caracteres.',
        ];
    }
}
