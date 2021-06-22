@extends('layout')

@section('titulo')
Cadastro de Contato
@endsection

@section('cabecalho')
Cadastro de Contato
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
    <div class="row">

        <div class="col">
            <h3> Dados de Contato</h3>
            <label for="nome" class="">Nome: </label>
            <input type="text" class="form-control" placeholder="Ex.: Luiz Augusto" name="nome" id="nome" required>
            <label for="nr_telefone" class=""> Telefone: </label>
            <input type="text" class="form-control cel-sp-mask" placeholder="Ex.: (00) 00000-0000" name="nr_telefone" id="nr_telefone" required>
            <label for="cpf" class="">Cpf: </label>
            <input type="text" class="form-control cpf-mask" placeholder="Ex.: 000.000.000-00" name="cpf" id="cpf" required>
            <label for="rg" class="">RG: </label>
            <input type="text" class="form-control" placeholder="Ex.: 456898" name="rg" id="rg" required>
        </div>
        <div class="col">
            <h3> Dados de Endereço</h3>
            <label for="rua" class="">Rua: </label>
            <input type="text" class="form-control" placeholder="Ex.: Rua dos Diamantes" name="rua" id="rua" required>
            <label for="nr" class="">Nr: </label>
            <input type="text" class="form-control" placeholder="Ex.: 87" name="nr" id="nr" required>
            <label for="complemento" class="">Complemento: </label>
            <input type="text" class="form-control" placeholder="Ex.: 1° Andar" name="complemento" id="complemento" required>
            <label for="bairro" class="">Bairro: </label>
            <input type="text" class="form-control"  placeholder="Ex.: Bairro do Arco-íris"name="bairro" id="bairro" required>
            <label for="cep" class="">CEP: </label>
            <input type="text" class="form-control cep-mask" placeholder="Ex.: 00000-000" name="cep" id="cep" required>
            <label for="cidade" class="">Cidade: </label>
            <input type="text" class="form-control" placeholder="Ex.: Cidade da Luz" name="cidade" id="cidade" required>
            <label for="estado" class="form-label">Estado: </label>
            <select type="text" name="estado" id="estado" class="form-select" required>
                <option selected>Escolha...</option>
                <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AP">AP</option>
                <option value="AM">AM</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MT">MT</option>
                <option value="MS">MS</option>
                <option value="MG">MG</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PR">PR</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="SC">SC</option>
                <option value="SP">SP</option>
                <option value="SE">SE</option>
                <option value="TO">TO</option>

            </select>
            
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary mt-3">Cadastro</button>
        </div>
    </div>


</form>
@endsection