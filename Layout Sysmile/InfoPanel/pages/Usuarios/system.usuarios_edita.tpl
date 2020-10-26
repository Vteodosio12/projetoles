{include file="../../master/header2.tpl"}

{include file="../../master/renderTopBody2.tpl"}
		
<div class="step">
    <h1>Edição de Usuário</h1>
    <br />
	
	{foreach $usuarios as $usu}
	<form method="post" action="{$PATH}/info/usuarios/usuarioEdita">
	
	<div class="helper-display-none">
		<input type="text" name="userid" class="form-control" value="{$usu.userid}">
	</div>
	
		<label>Nome do Usuário</label>
		<input type="text" name="usuario" class="form-control" value="{$usu.nome}">
		
		<label>Login</label>
		<input type="text" name="login" class="form-control" value="{$usu.LOGIN}">
		
		<label>Senha</label>
		<input type="password" name="senha" class="form-control">
		
		<label>Status</label>
		<select name="status" class="form-control">
			<option value="F" {if $usu.inativo eq "F"}selected{/if}>ATIVO</option>
			<option value="T" {if $usu.inativo eq "T"}selected{/if}>DESATIVADO</option>
		</select>
		
		
		
		<br>
		<div>
		<button type="submit" class="btn btn-default">Salvar</button>
		</div>
	</form>
	{/foreach}	
</div>

{include file="../../master/renderBottomBody.tpl"}

{include file="../../master/footer.tpl"}