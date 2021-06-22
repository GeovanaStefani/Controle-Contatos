<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatosFormRequest extends FormRequest
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
      return[
            'nome'=> sprintf('required|min:3|max:8', $this->post->nome),
            'nr_telefone' => sprintf('required|min:15|max:15', $this->post->nr_telefone),
            'cpf' => sprintf('required|min:14|max:14', $this->post->cpf),
            'rg' => sprintf('required|min:9|max:9', $this->post->rg),
            'rua' => sprintf('required|min:3|max:200', $this->post->rua),
            'nr' => sprintf('required|min:1|max:5', $this->post->nr),
            'complemento' => sprintf('required|min:0|max:200', $this->post->complemento),
            'bairro' => sprintf('required|min:3|max:200', $this->post->bairro),
            'cep' => sprintf('required|min:9|max:9', $this->post->cep),
            'cidade' => sprintf('required|min:3|max:200', $this->post->cidade),
            'estado'  => sprintf('required|min:3|max:200', $this->post->estado)
      ];
       
    }


    public function messages()
    {
        return[
            'nome.required' => 'O campo nome é obrigatório!',
            'nome.min' => 'O campo nome deve ter pelo menos 3 letras!',
            'nr_telefone.required' => 'O campo número é obrigatório!',
            'nr_telefone.min' => 'O campo do número de telefone deve está: (xx) xxxxx-xxxx',
            'cpf.required' => 'O campo cpf é obrigatório!',
            'cpf.min' => 'O campo do cpf deve está: xxx.xxx.xxx-xx',
            'rg.required' => 'O campo rg é obrigatório!',
            'rg.min' => 'O campo do rg deve está: x.xxx.xxx',
            'rua.required' => 'O campo rua é obrigatório!',
            'rua.min' => 'O campo nome deve ter pelo menos  letras!',
            'nr.required' => 'O campo nr é obrigatório!',
            'nr.min' => 'O campo do número deve ter pelo menos 1 número!',
            'bairro.required' => 'O campo bairro é obrigatório!',
            'bairro.min' => 'O campo nome deve ter pelo menos 3 letras!',
            'cep.required' => 'O campo cep é obrigatório!',
            'cep.min' => 'O campo CEP deve está: xxxxx-xxx',
            'cidade.required' => 'O cidade é obrigatório!',
            'cidade.min' => 'O campo cidade deve ter pelo menos 3 letras!',
            'estado.required' => 'O campo estado é obrigatório!',
            'estado.min' => 'O campo estado deve ter pelo menos 3 letras!'
    
        ];
    }  
}
