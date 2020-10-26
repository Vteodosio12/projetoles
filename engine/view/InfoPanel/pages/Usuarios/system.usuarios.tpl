{include file="../../master/header2.tpl"}

{include file="../../master/renderTopBody2.tpl"}

{if $status == 1}<div class="alert alert-success" role="alert">Usuário Incluído com sucesso!</div>{/if}

<div class="step">
	<h1>Usuários</h1>
	<div><a href="/info/usuarios/usuarios_novo" class="btn btn-sm btn-primary">Novo Usuario</a></div>
	
	<table id="tabelaUsuario" class="table table-hover table-stripped">
		<thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
			<th>Login</th>
			<th>Status</th>
			<th>Acessar</th>
        </tr>
		</thead>
        {foreach $usuarios as $usu}
        <tr>
            <td>{$usu.userid}</td>
            <td>{$usu.nome}</td>
			<td>{$usu.LOGIN}</td>
			<td>{if $usu.inativo == 'F'}ATIVO{Else}DESATIVADO{/if}</td>
			<td><a href="/info/usuarios/usuarios_ficha/{$usu.userid}" class="btn btn-sm btn-primary">Acessar</a></td>
        </tr>
        {/foreach}
    </table>
</div>

{include file="../../master/renderBottomBody.tpl"}

{include file="../../master/footer.tpl"}