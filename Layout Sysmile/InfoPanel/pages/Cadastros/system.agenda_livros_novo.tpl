{include file="../../master/headerEditor.tpl"}

{include file="../../master/renderTopBody2.tpl"}

<div class="step">
	<h1>Cadastro de Livros</h1>
    
	<form method="post" action="{$PATH}/info/cadastros/novoLivro">
		
        <div class="form-group">
            <label>Nome do Livro</label>
            <input type="text" name="nomelivro" class="form-control" placeholder="Nome do Livro">
        </div>
		
		<button type="submit" class="btn btn-default">Salvar</button>		

    </form>		
</div>

{include file="../../master/renderBottomBody.tpl"}

</body>
</html>