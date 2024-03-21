<?php

namespace App\Http\Requests;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'celular' => 'required|max:255',
            // 'password' => 'required|max:255|min:8',
            'password' => ['required', 'regex:/^(?=.*[0-9])(?=.*[!@#$%^&*()])(?=.*[A-Z]).{8,}$/'],
            'avatar' => 'file|required',
            'id_grupo' => 'required',
            'matricula' => 'required|unique:users|numeric',
            'cargo' => 'required|max:255',
            'documento' => 'required|max:11|min:11'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Digite um e-mail válido.',
            'email.unique' => 'Esse e-mail já está sendo utilizado.',
            'celular.required' => 'O campo celular é obrigatório.',
            'avatar.required' => 'O campo avatar é obrigatório.',
            'id_grupo.required' => 'O campo grupo é obrigatório.',
            'matricula.required' => 'O campo matricula é obrigatório.',
            'matricula.numeric' => 'A matrícula deve ser numérica.',
            'matricula.unique' => 'Já tem usuário cadastrado com essa matrícula.',
            'cargo.required' => 'O campo cargo é obrigatório.',
            
            'documento.required' => 'O campo documento é obrigatório.',
            'documento.max' => 'O campo documento deve ter 11 caracteres.',
            'documento.min' => 'O campo documento deve ter 11 caracteres.',

            'password' => 'Favor informar a senha. Atente-se aos critérios para a senha.',
            'password.min' => 'Favor informar a senha com pelo menos 8 dígitos.',
        ];
    }
}
