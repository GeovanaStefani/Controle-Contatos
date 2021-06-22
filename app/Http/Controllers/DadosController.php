<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;

class DadosController extends Controller
{
    public function index(int $contatoId)
    {
        $contato = Contato::find($contatoId);
        

        return view(
            'dados.index',
            ['contato' => $contato]
   
        );
    }


    
}
