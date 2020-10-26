{include file="../../master/header2.tpl"}

{include file="../../master/renderTopBody2.tpl"}

{if $status == 1}<div class="alert alert-success" role="alert">Horários Gerados com sucesso!</div>{/if}
{if $status == 2}<div class="alert alert-success" role="alert">Horários Bloqueados com sucesso!</div>{/if}
{if $status == 3}<div class="alert alert-success" role="alert">Novo Convênio Cadastrado com Sucesso!</div>{/if}
{if $status == 4}<div class="alert alert-success" role="alert">Convênio Editado com Sucesso!</div>{/if}
{if $status == 5}<div class="alert alert-success" role="alert">Convênio Excluido com Sucesso!</div>{/if}
{if $status == 6}<div class="alert alert-success" role="alert">Convênios Vinculados com Sucesso!</div>{/if}
{if $status == 7}<div class="alert alert-success" role="alert">Novo Procedimento Cadastrado com Sucesso!</div>{/if}
{if $status == 8}<div class="alert alert-success" role="alert">Procedimento Editado com Sucesso!</div>{/if}
{if $status == 9}<div class="alert alert-success" role="alert">Procedimento Excluido com Sucesso!</div>{/if}
{if $status == 10}<div class="alert alert-success" role="alert">Procedimentos Vinculados com Sucesso!</div>{/if}
{if $status == 11}<div class="alert alert-success" role="alert">Livro Inativado com Sucesso!</div>{/if}

<div class="step">
	<h1>Livros</h1>
	<a href="/info/cadastros/agenda_livros_novo" class="btn btn-sm btn-primary">Novo Livro</a>
	
	<table class="sortable table table-hover table-stripped">
		<thead>
        <tr>
            <th>Código</th>
			<th>Descrição</th>
			<th>Ações</th>
			<th></th>
        </tr>
		</thead>
		{foreach $Livros as $Livro}
        <tr>
            <td>{$Livro.LivroId}</td>
			<td>{$Livro.Descricao}</td>
			<td><a href="/info/cadastros/agenda_livros_edita/{$Livro.LivroId}" class="btn btn-sm btn-primary">Editar</a></td>
			<td><a href="/info/cadastros/agenda_livros_exclui/{$Livro.LivroId}" class="btn btn-sm btn-danger">Excluir</a></td>
        </tr>
		{/foreach}
    </table>
	
	<hr />
	
	<h1>Convênios</h1>
	<a href="/info/cadastros/agenda_convenios_novo" class="btn btn-sm btn-primary">Novo Convênio</a>
	
	<table class="sortable table table-hover table-stripped">
		<thead>
        <tr>
            <th>Código</th>
			<th>Descrição</th>
			<th>Ações</th>
			<th></th>
        </tr>
		</thead>
		{foreach $Convenios as $Convenio}
        <tr>
            <td>{$Convenio.ConvenioId}</td>
			<td>{$Convenio.Descricao}</td>
			<td><a href="/info/cadastros/agenda_convenios_edita/{$Convenio.ConvenioId}" class="btn btn-sm btn-primary">Editar</a></td>
			<td><a data-toggle="modal" data-target="#myCancelar{$Convenio.ConvenioId}" href="" class="btn btn-sm btn-danger" data-dismiss="modal">Excluir</a></td>
        </tr>
		
		<div class="modal fade" id="myCancelar{$Convenio.ConvenioId}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<div class="row">
							<div class="col-md-12">
								<h3>Confirmação de Exclusão</h3>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<label>Você confirma a exclusão do Convênio <b>{$Convenio.Descricao}</b>?</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<a class="btn btn-danger" href="/info/cadastros/agenda_convenios_exclui/{$Convenio.ConvenioId}">Excluir</a>
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
		{/foreach}
    </table>
	
	<hr />
	
	<h1>Procedimentos</h1>
	<a href="/info/cadastros/agenda_procedimentos_novo" class="btn btn-sm btn-primary">Novo Procedimento</a>
	
	<table class="sortable table table-hover table-stripped">
		<thead>
        <tr>
            <th>Código</th>
			<th>Descrição</th>
			<th>Ações</th>
			<th></th>
        </tr>
		</thead>
		{foreach $Procedimentos as $Procedimento}
        <tr>
            <td>{$Procedimento.ProcedimentoId}</td>
			<td>{$Procedimento.Descricao}</td>
			<td><a href="/info/cadastros/agenda_procedimentos_edita/{$Procedimento.ProcedimentoId}" class="btn btn-sm btn-primary">Editar</a></td>
			<td><a data-toggle="modal" data-target="#myCancelarProc{$Procedimento.ProcedimentoId}" href="" class="btn btn-sm btn-danger" data-dismiss="modal">Excluir</a></td>
        </tr>
		
		<div class="modal fade" id="myCancelarProc{$Procedimento.ProcedimentoId}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<div class="row">
							<div class="col-md-12">
								<h3>Confirmação de Exclusão</h3>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<label>Você confirma a exclusão do Procedimento <b>{$Procedimento.Descricao}</b>?</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<a class="btn btn-danger" href="/info/cadastros/agenda_procedimentos_exclui/{$Procedimento.ProcedimentoId}">Excluir</a>
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
		{/foreach}
    </table>
	
</div>
	
{include file="../../master/renderBottomBody.tpl"}

{include file="../../master/footer.tpl"}