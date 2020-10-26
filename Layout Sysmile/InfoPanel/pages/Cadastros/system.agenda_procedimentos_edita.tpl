{include file="../../master/headerEditor.tpl"}

{include file="../../master/renderTopBody2.tpl"}

<div class="step">
{foreach $Procedimentos as $Procedimento}{/foreach}

	<h1>Edição de Procedimento</h1>
    
	<form method="post" action="{$PATH}/info/cadastros/editaProcedimento">
		
		<div class="helper-display-none">
            <input type="text" name="procedimentoid" class="form-control" value="{$Procedimento.ProcedimentoId}">
        </div>
		
        <div class="form-group">
            <label>Nome do Procedimento</label>
            <input type="text" name="nomeprocedimento" class="form-control" value="{$Procedimento.Descricao}">
        </div>
	
		</br>
		
		<button type="submit" class="btn btn-default">Salvar</button>		

    </form>		
</div>

{include file="../../master/renderBottomBody.tpl"}


</body>
</html>