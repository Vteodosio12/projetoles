{include file="../../master/header2.tpl"}

{include file="../../master/renderTopBody2.tpl"}

<div class="step">
	<h1>Cadastro de Convênios</h1>
    
	<form method="post" action="{$PATH}/info/cadastros/novoConvenio">
		
        <div class="form-group">
            <label>Nome do Convênio</label>
            <input type="text" name="nomeconvenio" class="form-control" placeholder="Nome do Convênio">
        </div>
	
        <button type="submit" class="btn btn-default">Salvar</button>		

    </form>		
</div>

{include file="../../master/renderBottomBody.tpl"}

{include file="../../master/footer.tpl"}