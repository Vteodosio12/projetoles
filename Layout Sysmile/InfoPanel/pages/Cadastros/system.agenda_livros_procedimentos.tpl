{include file="../../master/header2.tpl"}

{include file="../../master/renderTopBody2.tpl"}

{foreach $Livros as $livro}{/foreach}

<div class="step">
	<h1>Procedimentos do Livro - {$livro.Descricao}</h1>
	
	<label>Selecione os Procedimentos realizados por este livro:</label>
	
	<form method="post" action="{$PATH}/info/agenda/vinculoLivroProcedimento">
	
	<div class="helper-display-none">
		<input type="text" name="livroid" class="form-control" value="{$livroid}">
	</div>
		
	<div class="row">
		{foreach $Procedimentos as $Proc}
				<div class="col-md-6">
					<label><input type="checkbox" name="option[{$Proc.ProcedimentoId}]" value="{$Proc.ProcedimentoId}" {if $Proc.Id !=NULL}checked{/if}> {$Proc.Descricao}</label>
				</div>
		{/foreach}
    </div>
	
	<br>
	
	<button type="submit" class="btn btn-default">Salvar</button>

    </form>		
</div>
	
{include file="../../master/renderBottomBody.tpl"}

{include file="../../master/footer.tpl"}