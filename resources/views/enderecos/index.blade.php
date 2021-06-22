@extends('layout')

@section('cabecalho')
Endereços de {{ $contato->name }}
@endsection

@section('conteudo')
<a href="/contato/{{$contato->id}}/CadastrarEndereco" class="btn btn-dark mb-2"> Adicionar </a>
<ul class="list-group">
    <?php $cont = 0; ?>
    @foreach($enderecos as $endereco)
    <?php $cont += 1 ?>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span id="numero-endereco-{{ $endereco->id }}"> Endereço {{$cont}}</span>

        <span class="d-flex">
            <a href="/enderecos/{{$endereco->id}}" class="btn btn-secondary btn-sm mr-1">
                <i class="fas fa-home"></i>
            </a>
            <form method="post" action="/enderecos/remover/{{ $endereco->id }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-dark btn-sm">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
        </span>
    </li>
    @endforeach
</ul>

@endsection