<?php
namespace App\Services;
use App\Contato;
use App\Models\Endereco;
use Illuminate\Support\Facades\DB;

class RemovedorDeContato
{
    public function removerContato(int $contatoId): string
    {
        $nomeContato = '';
        DB::transaction(function () use ($contatoId, &$nomeContato) {
            $contato = Contato::find($contatoId);
            $nomeContato = $contato->name;

            $this->removerEndereco($contato);
            $contato->delete();
        });

        return $nomeContato;
    }

    /**
     * @param $contato
     */
    private function removerEndereco(Contato $contato): void
    {
        $contato->endereco->each(function (Endereco $endereco) {
            $endereco->delete();
        });
    }

    /**
     * @param Endereco $endereco
     */
}