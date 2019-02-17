@extends('layouts.app')

@section('content')
    <pagina tamanho="12">

        @if ($errors->all())
            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @foreach ($errors->all() as $key => $value)
                    <span><strong>{{ $value }}</strong></span>
                @endforeach
            </div>
        @endif

        <painel titulo="Lista de Produtos">
            <migalhas v-bind:lista="{{ $listaMigalhas }}"></migalhas>
                <tabela-lista
                    v-bind:titulos="['#', 'Nome', 'Categoria', 'Quantidade Min.', 'SKU']"
                    v-bind:itens="{{ json_encode($listaProdutos) }}"
                    criar="#criar"
                    detalhe="/admin/produtos/"
                    editar="/admin/produtos/"
                    deletar="/admin/produtos/"
                    token="{{ csrf_token() }}"
                    ordem="asc"
                    ordemcol="2"
                    modal="sim">
                </tabela-lista>
                <div>
                    {{ $listaProdutos->links()}}
                </div>
        </painel>
    </pagina>

    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="formAdicionar" css="" action="{{ route('produtos.store') }}" method="post" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{ old('nome') }}">
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoria</label>
                <input type="number" class="form-control" id="categoria_id" name="categoria_id" placeholder="Categoria" value="{{ old('categoria_id') }}">
            </div>
            <div class="form-group">
                <label for="quantidade_min">Quantidade Mínima</label>
                <input type="number" class="form-control" id="quantidade_min" name="quantidade_min" placeholder="Quantidade Mínima" value="{{ old('quantidade_min') }}">
            </div>
            <div class="form-group">
                <label for="sku">Prefixo SKU</label>
                <input type="text" class="form-control" id="sku" name="sku" placeholder="Prefixo SKU" maxlength="5" value="{{ old('sku') }}">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>

    </modal>

    <modal nome="editar">
        <formulario id="formEditar" css="" v-bind:action="'/admin/produtos/' + $store.state.item.id" method="put" enctype="multipart/form-data" token="{{ csrf_token() }}">
            <div class="form-group">
                    <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" v-model="$store.state.item.nome" name="nome" placeholder="Nome" value="{{ old('nome') }}">
                </div>
                <div class="form-group">
                    <label for="categoria_id">Categoria</label>
                    <input type="number" class="form-control" id="categoria_id" v-model="$store.state.item.categoria_id" name="categoria_id" placeholder="Categoria" value="{{ old('categoria_id') }}">
                </div>
                <div class="form-group">
                    <label for="quantidade_min">Quantidade Mínima</label>
                    <input type="number" class="form-control" id="quantidade_min" v-model="$store.state.item.quantidade_min" name="quantidade_min" placeholder="Quantidade Mínima" value="{{ old('quantidade_min') }}">
                </div>
                <div class="form-group">
                    <label for="sku">Prefixo SKU</label>
                    <input type="text" class="form-control" id="sku" name="sku" v-model="$store.state.item.sku" placeholder="Prefixo SKU" maxlength="5" value="{{ old('sku') }}">
                </div>
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-info">Atualizar</button>
        </span>
    </modal>
    <modal nome="detalhe" titulo="Produto">
        <p>@{{ $store.state.item.nome }} </p>
    </modal>
@endsection
