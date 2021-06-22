@extends('layout') 

@section('titulo')
    Registrar-se
@endsection

@section('cabecalho')
    Registro de novo usuário
@endsection

@section('conteudo') 

@if ($errors->any()) 
    <div class="alert alert-danger"> 
        <ul> @foreach ($errors->all() as $error) 
            <li>{{ $error }}</li> 
        @endforeach 
        </ul> 
    </div> 
@endif


<form method="post"> 
    @csrf 
    <div class="form-group"> 
        <label for="name">Nome</label> 
            <input type="text" name="name" id="name" required class="form-control"> 
            </div> 
        <div class="form-group"> 
            <label for="email">E-mail</label> 
            <input type="email" name="email" id="email" required class="form-control"> 
        </div>

    <div class="form-group"> 
        <label for="password">Senha</label> 
        <input type="password" name="password" id="password" required min="1" class="form-control"> 
    </div> 
    <button type="submit" class="btn btn-primary mt-3"> Entrar </button> 
</form>

@endsection
