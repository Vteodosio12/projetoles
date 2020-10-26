{include file="../../master/header2.tpl"}

{include file="../../master/renderTopBody2.tpl"}
		
<div class="step">
    <h1>Novo Usuário</h1>
    <br />
	
	<form method="post" action="{$PATH}/info/usuarios/usuarioNovo">
		<label>Nome do Usuário</label>
		<input type="text" name="usuario" class="form-control">
		
		<label>Login</label>
		<input type="text" name="login" class="form-control">
		
		<label>Senha</label>
		<input type="password" name="senha" class="form-control">
		
		<br>
		<div>
		<button type="submit" class="btn btn-default">Salvar</button>
		</div>
		</form>
</div>

{include file="../../master/renderBottomBody.tpl"}

{include file="../../master/footer.tpl"}