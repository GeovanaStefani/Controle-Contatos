<?php

namespace App\Services;

use App\Contato;
use Illuminate\Support\Facades\DB;

class CriadorDeContato
{
    public function criarContato(
        string $nomeContato,
        string $telefoneContato,
        string $cpfContato,
        string $rgContato,
        string $ruaEndereco,
        string $nrEndereco,
        string $complementoEndereco,
        string $bairroEndereco,
        string $cepEndereco,
        string $cidadeEndereco,
        string $estadoEndereco

    ): Contato {
        DB::beginTransaction();
        $contato = Contato::create(['name' => $nomeContato, 'nr_telefone' => $telefoneContato,'cpf' => $cpfContato,'rg' => $rgContato]);
        $this->criaEndereco($ruaEndereco, $nrEndereco, $complementoEndereco, $bairroEndereco, $cepEndereco, $cidadeEndereco, $estadoEndereco, $contato);
        DB::commit();

        return $contato;
    }

    
    public function criaEndereco( string $ruaEndereco, string $nrEndereco, string $complementoEndereco, string $bairroEndereco, string $cepEndereco,string $cidadeEndereco, string $estadoEndereco, Contato $contato): void
    {
        $endereco = $contato->enderecos()->create(['rua'=> $ruaEndereco, 'nr' => $nrEndereco, 'complemento' => $complementoEndereco, 'bairro' => $bairroEndereco, 'cep' => $cepEndereco, 'cidade' => $cidadeEndereco, 'estado' => $estadoEndereco]);

    }
}