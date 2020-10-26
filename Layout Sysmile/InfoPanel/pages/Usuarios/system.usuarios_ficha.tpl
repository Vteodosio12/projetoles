{include file="../../master/header2.tpl"}

{include file="../../master/renderTopBody2.tpl"}

{if $status == 1}<div class="alert alert-success" role="alert">Usuário Editado com sucesso!</div>{/if}
{if $status == 4}<div class="alert alert-success" role="alert">Usuário Incluido com sucesso!</div>{/if}

<div class="step">
	<h1>Ficha Cadastral</h1>
	
	{foreach $usuarios as $usu}
	<div><a href="/info/usuarios/usuarios_edita/{$usu.userid}" class="btn btn-sm btn-primary">Editar Dados da Conta</a> </div>

	<div class="row">
		<div class="col-md-1">
			<h3>Id</h3>
			<label>{$usu.userid}</label>
		</div>

		<div class="col-md-6">
			<h3>Nome</h3>
			<label>{$usu.nome}</label>
		</div>

		<div class="col-md-5">
			<h3>Status</h3>
			<label>{if $usu.inativo == "T"}DESATIVADO{else}ATIVO{/if}</label>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-2">
			<h3>Login</h3>
			<label>{$usu.LOGIN}</label>
		</div>
	</div>
	
	
	{/foreach}
	
</div>
	
{include file="../../master/renderBottomBody.tpl"}

{include file="../../master/footer.tpl"}