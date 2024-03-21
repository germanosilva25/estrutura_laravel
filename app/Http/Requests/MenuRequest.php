<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            "icone" => 'required|max:255',
            "chave" => 'required',
            "valor" => 'required',
            "numero_ordenacao" => 'required',
            "submenu" => 'required',
            "submenugroup" => 'required',
            "issubmenu" => 'required',
            "visible" => 'required',
            "global" => 'required',
        
        ];
    }

    public function messages()
    {
        return [
            'icone.required' => ('O campo icone é obrigatório.'),
            'chave.required' => ('A rota do menu é obrigatória.'),
            'valor.required' => ('A descrição do menu obrigatória.'),
            'numero_ordenacao.required' => ('A ordenação do menu é obrigatória.'),
            'submenu.required' => ('É obrigatório informar se haverá submenu.'),
            'submenugroup.required' => ('É obrigatório informar se o menu pertence a algum grupo.'),
            'issubmenu.required' => ('É obrigatório informar se será um submenu.'),
            'visible.required' => ('É obrigatório informar se o menu será visível na barra de menu.'),
            'global.required' => ('É obrigatório informar se será visível para todos.'),
        ];
    }
}
