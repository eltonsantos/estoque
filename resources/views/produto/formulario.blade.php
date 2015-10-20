@extends("layout.principal")

@section("conteudo")

    <h1>Novo produto</h1>

    <form action="/produtos/adiciona" method="post">

        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <div class="form-group">
            <label>Nome</label>
            <input name="nome" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <input name="descricao" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Valor</label>
            <input name="valor" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Quantidade</label>
            <input name="quantidade" type="number" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>

    </form>

@stop