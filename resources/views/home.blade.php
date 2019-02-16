@extends('layouts.app')

@section('content')
<pagina tamanho="10">
    <painel titulo="Dashboard">
        <migalhas v-bind:lista="{{ $listaMigalhas }}"></migalhas>
        <div class="row">
            <div class="col-md-4">
                <caixa quantidade="80" titulo="Artigos" url="{{ route('artigos.index') }}" cor="orange" icone="fa fa-shopping-cart"></caixa>
            </div>
            <div class="col-md-4">
                <caixa quantidade="1500" titulo="Usuários" url="#" cor="blue" icone="ion-person-stalker"></caixa>
            </div>
            <div class="col-md-4">
                <caixa quantidade="25" titulo="Autores" url="#" cor="red" icone="ion-person"></caixa>
            </div>
        </div>
    </painel>
</pagina>
@endsection
