<?php

namespace App\Http\Controllers;

use App\Contato;
use App\Models\Endereco;
use App\Services\CriadorDeContato;
use Illuminate\Http\Request;

class EnderecosController extends Controller
{
    public function index(int $contatoId)
    {
        $contato = Contato::find($contatoId);
        $enderecos = $contato->enderecos;

        return view(
            'enderecos.index',
            ['contato' => $contato],
            ['enderecos' => $enderecos]
        );
    }

    public function exibir(int $idEndereco)
    {
        $endereco = Endereco::find($idEndereco);
    
        return view(
            'enderecos.exibir',
            ['endereco' => $endereco]
        );
        
    }
    public function cadastrar(int $contatoId)
    {
        $contato = Contato::find($contatoId);
        $enderecos = $contato->enderecos;
    
        return view(
            'enderecos.create',
            ['contato' => $contato],
            ['enderecos' => $enderecos]
        );
        
    }
    public function salvar(int $contatoId, Request $request, CriadorDeContato $criadorDeContato)
    {
        $contato = Contato::find($contatoId);
        $enderecos = $contato->enderecos;
        $criadorDeContato ->criaEndereco($request->rua, $request->nr,  $request->complemento, $request->bairro, $request->cep, $request->cidade, $request->estado, $contato);
    
        return view(
            'enderecos.index',
            ['contato' => $contato],
            ['enderecos' => $enderecos]
        );
        
    }

    public function destroy(Request $request)
    {
        $endereco = Endereco::find($request->id);
        $contatoId = $endereco->contato_id;

        $endereco->delete();

        $request->session()
            ->flash(
                'mensagem',
                "Endereço removido com sucesso"
            );
        return redirect()->route('listar_enderecos', ['contatoId' => $contatoId]);
    }

    

    
}
