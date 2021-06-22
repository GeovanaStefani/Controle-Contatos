@extends('layout')

@section('cabecalho')
Dados de {{ $contato->name }}
@endsection

@section('conteudo')

<form method="post">
    @csrf
    <div class="row">


        <label for="name" class="">Nome: </label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $contato->name }}">
        <label for="nr_telefone" class=""> Telefone: </label>
        <input type="text" class="form-control" name="nr_telefone" id="nr_telefone" value="{{$contato->nr_telefone}}">
        <label for="cpf" class="">Cpf: </label>
        <input type="text" class="form-control" name="cpf" id="cpf" value="{{$contato->cpf}}">
        <label for="rg" class="">RG: </label>
        <input type="text" class="form-control" name="rg" id="rg" value="{{$contato->rg}}">

    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-primary mt-3" action="/contatos/{{$contato->id}}/dados">Atualizar</button>
    </div>
</form>

@endsection