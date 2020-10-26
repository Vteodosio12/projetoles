{include file="../../master/header2.tpl"}

{include file="../../master/renderTopBody2.tpl"}

{foreach $Livros as $livro}{/foreach}

<div class="step">
	<h1>Convênios do Livro - {$livro.Descricao}</h1>
	
	<label>Selecione os Convênios aceitos por este livro:</label>
	
	<form method="post" action="{$PATH}/info/agenda/vinculoLivroConvenio">
	
	<div class="helper-display-none">
		<input type="text" name="livroid" class="form-control" value="{$livroid}">
	</div>
		
	<div class="row">
		{foreach $Convenios as $Conv}
				<div class="col-md-6">
					<input type="checkbox" name="option[{$Conv.ConvenioId}]" value="{$Conv.ConvenioId}" {if $Conv.Id !=NULL}checked{/if}>
					<label>{$Conv.Descricao}</label>
				</div>
		{/foreach}
    </div>
	
	<br>
	
	<button type="submit" class="btn btn-default">Salvar</button>

    </form>		
</div>
	
{include file="../../master/renderBottomBody.tpl"}

{include file="../../master/footer.tpl"}