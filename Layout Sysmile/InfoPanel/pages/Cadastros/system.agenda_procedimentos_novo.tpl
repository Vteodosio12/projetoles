{include file="../../master/headerEditor.tpl"}

{include file="../../master/renderTopBody2.tpl"}

<div class="step">
	<h1>Cadastro de Procedimento</h1>
    
	<form method="post" action="{$PATH}/info/cadastros/novoProcedimento">
		
        <div class="form-group">
            <label>Nome do Procedimento</label>
            <input type="text" name="nomeprocedimento" class="form-control" placeholder="Nome do Procedimento">
        </div>
		
		<br>
		
        <button type="submit" class="btn btn-default">Salvar</button>		

    </form>		
</div>

{include file="../../master/renderBottomBody.tpl"}


</body>
</html>