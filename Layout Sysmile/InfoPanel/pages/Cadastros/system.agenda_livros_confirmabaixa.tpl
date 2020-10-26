{include file="../../master/header2.tpl"}

{include file="../../master/renderTopBody2.tpl"}
		
<div class="step">
    <h1>Confirma Baixa do Livro</h1>
    <br>
	
	{foreach $Livros as $Livro}
	<form method="post" action="{$PATH}/info/cadastros/baixaLivro">

	<div>
		<label>Confirma Baixa do Livro {$Livro.Descricao}?</label>
	</div>
	
	<div class="helper-display-none">
	<input type="text" name="livroid" class="form-control" value="{$Livro.LivroId}">
	</div>
	
	<div>
	<button type="submit" class="btn btn-default">Excluir</button>
	<input type="button" value="Cancelar" onclick="window.history.go(-1)" class="btn btn-default">
	</div>
	
	</form>
	{/foreach}
</div>

{include file="../../master/renderBottomBody.tpl"}

{include file="../../master/footer.tpl"}