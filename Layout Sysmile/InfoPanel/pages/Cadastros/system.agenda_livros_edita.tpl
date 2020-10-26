{include file="../../master/headerEditor.tpl"}

{include file="../../master/renderTopBody2.tpl"}

<div class="step">
	<h1>Edita Cadastro do Livro</h1>
    {foreach $Livros as $Livro}
	<form method="post" action="{$PATH}/info/cadastros/editaLivro">
		
		<div class="helper-display-none">
            <input type="text" name="livroid" class="form-control" value="{$Livro.LivroId}">
        </div>
		
        <div class="form-group">
            <label>Nome do Livro</label>
            <input type="text" name="nomelivro" class="form-control" placeholder="Nome do Livro" value="{$Livro.Descricao}">
        </div>
		
        <button type="submit" class="btn btn-default">Salvar</button>		

    </form>	
	{/foreach}	
</div>

{include file="../../master/renderBottomBody.tpl"}


</body>
</html>