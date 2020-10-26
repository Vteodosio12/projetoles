{include file="../../master/header2.tpl"}

{include file="../../master/renderTopBody2.tpl"}

<div class="step">
{foreach $Convenios as $Convenio}{/foreach}

	<h1>Edição de Convênios</h1>
    
	<form method="post" action="{$PATH}/info/cadastros/editaConvenio">
		
		<div class="helper-display-none">
            <input type="text" name="convenioid" class="form-control" value="{$Convenio.ConvenioId}">
        </div>
		
        <div class="form-group">
            <label>Nome do Convênio</label>
            <input type="text" name="nomeconvenio" class="form-control" value="{$Convenio.Descricao}">
        </div>
	
        <button type="submit" class="btn btn-default">Salvar</button>		

    </form>		
</div>

{include file="../../master/renderBottomBody.tpl"}

{include file="../../master/footer.tpl"}