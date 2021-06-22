<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatosFormRequest;
use Illuminate\Http\Request;
use App\Contato;
use App\Models\Endereco;
use App\Models\Dados;
use App\Services\CriadorDeContato; 


class ContatosController extends Controller
{

   public function index(Request $request){
        $contatos = Contato::query()->orderBy('name')->get();
        $mensagem = $request->session()->get('mensagem');
        return view ('contatos.index', ['contatos' => $contatos], 
        ['mensagem' => $mensagem]);

    }

    public function create(){
        return view ('contatos.create');
    }


    public function store(
        Request $request,
        CriadorDeContato $criadorDeContato
    ) {
        $contato = $criadorDeContato->criarContato(
            $request->nome,
            $request->nr_telefone, 
            $request->cpf,
            $request->rg,
            $request->rua,
            $request->nr,
            $request->complemento,
            $request->bairro,
            $request->cep,
            $request->cidade,
            $request->estado
            //olhar se der erro
        );
    
        $request->session()
            ->flash(
                'mensagem',
                "Contato de {$contato->name} criado com sucesso."
            );
    
        return redirect()->route('listar_contatos');
    }

    public function destroy(Request $request)
    {
    
        $contato = Contato::find($request->id);
        $nomeContato = $contato->name;
        $contato->enderecos->each(function (Endereco $endereco) {
            $endereco->delete();
    
        });
        $contato->delete();
    
        Contato::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Contato $nomeContato removida com sucesso"
            );
        return redirect()->route('listar_contatos');
    }

    //arrumar essa função quando for editar todos os dados
    public function editar(int $id, Request $request)
    {
        $novoNome = $request->name;
        $novoTelefone = $request->nr_telefone;
        $novoCpf = $request->cpf;
        $novoRg = $request->rg;

        $contato = Contato::find($id);

        $contato->name = $novoNome;
        $contato->nr_telefone = $novoTelefone;
        $contato->cpf = $novoCpf;
        $contato->rg = $novoRg;
    
        $contato->save();
        return redirect()->route('listar_contatos');
    }


}