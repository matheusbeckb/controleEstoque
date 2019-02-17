@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de Produtos">
            <migalhas v-bind:lista="{{ $listaMigalhas }}"></migalhas>
                <tabela-lista
                    v-bind:titulos="['#', 'Nome', 'Categoria', 'Quantidade Min.', 'SKU']"
                    v-bind:itens="{{ $listaProdutos }}"
                    criar="#criar"
                    detalhe="#detalhe"
                    editar="#editar"
                    deletar="#deletar"
                    token="84654654"
                    ordem="asc"
                    ordemcol="2"
                    modal="sim">
                </tabela-lista>

        </painel>
    </pagina>

    <modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{ route('produtos.store') }}" method="post" enctype="" token="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="categoria_id">Categoria</label>
                    <input type="number" class="form-control" id="categoria_id" name="categoria_id" placeholder="Categoria">
                </div>
                <div class="form-group">
                    <label for="quantidade_min">Quantidade Mínima</label>
                    <input type="number" class="form-control" id="quantidade_min" name="quantidade_min" placeholder="Quantidade Mínima">
                </div>
                <div class="form-group">
                    <label for="sku">Prefixo SKU</label>
                    <input type="text" class="form-control" id="sku" name="sku" placeholder="Prefixo SKU" maxlength="5">
                </div>
        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>

    </modal>

    <modal nome="editar">
        <formulario id="formEditar" css="" action="#" method="put" enctype="multipart/form-data" token="12345">
            <form>
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" v-model="$store.state.item.titulo" name="titulo" placeholder="Título">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" v-model="$store.state.item.descricao" name="descricao" placeholder="Descrição">
                </div>
            </form>
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-info">Atualizar</button>
        </span>
    </modal>
    <modal nome="detalhe" titulo="Produto">
        <p>@{{ $store.state.item.nome }} </p>
    </modal>
@endsection
