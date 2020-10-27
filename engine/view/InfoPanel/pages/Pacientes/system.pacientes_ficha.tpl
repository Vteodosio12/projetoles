{include file="../../master/header2.tpl"}

{include file="../../master/renderTopBody2.tpl"}

{if $status == 1}<div class="alert alert-success" role="alert">Paciente Incluído com sucesso!</div>{/if}
{if $status == 2}<div class="alert alert-success" role="alert">Paciente Editado com sucesso</div>{/if}
{if $status == 3}<div class="alert alert-warning" role="alert">{/if}
{if $status == 4}<div class="alert alert-success" role="alert">Agendamento realizado com sucesso</div>{/if}
{if $status == 5}<div class="alert alert-success" role="alert">Agendamento Cancelado com sucesso</div>{/if}

<div class="step">
	<h1>Ficha Cadastral</h1>
	
	{foreach $Pacientes as $Paciente}
	<div><a href="/info/pacientes/pacientes_editar/{$Paciente.PacienteId}" class="btn btn-sm btn-primary">Editar Dados do Paciente</a></div>

	<div class="row">
		<div class="col-md-9">
			<h3>Nome</h3>
			<label>{$Paciente.NomePaciente} {if $Paciente.Cadeirante == "Sim"}<img src="/styles/images/deficiente.png" alt="alternative text" title="Paciente Deficiente"/>{/if}</label>
		</div>

		<div class="col-md-3">
			<h3>Data de Nascimento</h3>
			<label></label>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<h3>Sexo</h3>
			<label>{$Paciente.Sexo}</label>
		</div>
		
		<div class="col-md-4">
			<h3>Documento</h3>
			<label>{$Paciente.Tipo} - {$Paciente.Documento}</label>
		</div>
		
		<div class="col-md-4">
			<h3>Estado Civil</h3>
			<label>{$Paciente.EstadoCivil}</label>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h3>Endereço</h3>
			<label>{$Paciente.Endereco}</label>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h3>Bairro</h3>
			<label>{$Paciente.Bairro}</label>
		</div>

		<div class="col-md-3">
			<h3>Cidade</h3>
			<label>{$Paciente.Cidade}</label>
		</div>

		<div class="col-md-2">
			<h3>Estado</h3>
			<label>{$Paciente.Estado}</label>
		</div>

		<div class="col-md-3">
			<h3>CEP</h3>
			<label>{$Paciente.CEP}</label>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6">
			<h3>Email</h3>
			<label>{$Paciente.Email}</label>
		</div>

		<div class="col-md-3">
			<h3>Telefone</h3>
			<label>{$Paciente.Telefone}</label>
		</div>

		<div class="col-md-3">
			<h3>Celular</h3>
			<label>{$Paciente.Celular}</label>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<h3>Convênio</h3>
			<label>{$Paciente.Descricao}</label>
		</div>
		<div class="col-md-4">
			<h3>Número da Carteirinha</h3>
			<label>{$Paciente.Carteirinha}</label>
		</div>
		{If $inf->name == "MARTINSRAMOS"}
		<div class="col-md-4">
			<h3>Número de Filhos</h3>
			<label>{$Paciente.Filhos}</label>
		</div>
		{/if}
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<h3>Observação</h3>
			<label>{$Paciente.Observacao}</label>
		</div>
	</div>
	
	{/foreach}
	
	<hr />
	
	<h1>Agendamentos</h1>
	<div><a href="/info/pacientes/pacientes_novo_agendamento/{$Paciente.PacienteId}" class="btn btn-sm btn-primary">Novo Agendamento</a>
	
	<table class="table table-hover table-stripped">
		<thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
			<th>Hora</th>
			<th>Livro</th>
			<th>Procedimento</th>
			<th>Status</th>
			<th>Opções</th>
        </tr>
		</thead>
		{foreach $Agendas as $Agenda}
		<tr>
			<td>{if $Agenda.Status == 4}<font color="#04B486">{/if}{if $Agenda.Status == 5}<font color="#F78181">{/if}{if $Agenda.Status == 6}<font color="#FF5722">{/if}{$Agenda.Id}{if $Agenda.Status == 4 OR $Agenda.Status == 5 OR $Agenda.Status == 6}</font>{/if}</td>
			<td>{if $Agenda.Status == 4}<font color="#04B486">{/if}{if $Agenda.Status == 5}<font color="#F78181">{/if}{if $Agenda.Status == 6}<font color="#FF5722">{/if}{$Agenda.Data|date_format:"%d/%m/%Y"}{if $Agenda.Status == 4 OR $Agenda.Status == 5 OR $Agenda.Status == 6}</font>{/if}</td>
			<td>{if $Agenda.Status == 4}<font color="#04B486">{/if}{if $Agenda.Status == 5}<font color="#F78181">{/if}{if $Agenda.Status == 6}<font color="#FF5722">{/if}{$Agenda.Hora}{if $Agenda.Status == 4 OR $Agenda.Status == 5 OR $Agenda.Status == 6}</font>{/if}</td>
			<td>{if $Agenda.Status == 4}<font color="#04B486">{/if}{if $Agenda.Status == 5}<font color="#F78181">{/if}{if $Agenda.Status == 6}<font color="#FF5722">{/if}{$Agenda.Livro}{if $Agenda.Status == 4 OR $Agenda.Status == 5 OR $Agenda.Status == 6}</font>{/if}</td>
			<td>{if $Agenda.Status == 4}<font color="#04B486">{/if}{if $Agenda.Status == 5}<font color="#F78181">{/if}{if $Agenda.Status == 6}<font color="#FF5722">{/if}{$Agenda.Procedimento}{if $Agenda.TipoLivro == 2} ({$Agenda.SessaoId}ª SESSAO){/if}{if $Agenda.Status == 4 OR $Agenda.Status == 5 OR $Agenda.Status == 6}</font>{/if}</td>
			<td>{if $Agenda.Status == 4}<font color="#04B486">{/if}{if $Agenda.Status == 5}<font color="#F78181">{/if}{if $Agenda.Status == 6}<font color="#FF5722">{/if}{if $Agenda.Status == 1}Agendado{elseif $Agenda.Status == 4}Compareceu{elseif $Agenda.Status == 5}Faltou{elseif $Agenda.Status == 6}Cancelou{/if}{if $Agenda.Status == 4 OR $Agenda.Status == 5 OR $Agenda.Status == 6}</font>{/if}</td>
			<td><div class="dropdown">
						  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Opções
							<span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a href="/info/pacientes/cancelar_agendamento/{$Paciente.PacienteId}/{$Agenda.Id}">Cancelar</a></li>
							<li><a href="/info/pacientes/duplicar_agendamento/{$Paciente.PacienteId}/{$Agenda.Id}">Duplicar</a></li>
							<li><a href="/info/pacientes/transferir_agendamento/{$Paciente.PacienteId}/{$Agenda.Id}">Transferir</a></li>
						  </ul>
						</div>
					</td>
		</tr>
		{/foreach}
	</table>
	
</div>
	
{include file="../../master/renderBottomBody.tpl"}

{include file="../../master/footer.tpl"}