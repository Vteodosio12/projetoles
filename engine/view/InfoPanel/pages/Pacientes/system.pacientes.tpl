{include file="../../master/header2.tpl"}

{include file="../../master/renderTopBody2.tpl"}

{if $status == 1}<div class="alert alert-success" role="alert">Paciente excluído com sucesso!</div>{/if}
{if $status == 2}<div class="alert alert-danger" role="alert">Paciente não pode ser excluído pois possui agendamentos cadastrados!</div>{/if}

<div class="step">
	<h1>Cadastro de Pacientes</h1>
	
	<a href="/info/pacientes/paciente_novo" class="btn btn-sm btn-primary">Novo Paciente</a>
	<br>
	<br>
	
	<table id="tabelaPaciente" class="table table-hover table-stripped">
        <thead>
		<tr>
            <th>Id</th>
            <th>Nome</th>
			<th>Data de Nascimento</th>
			<th>Acessar</th>
			<th>Excluir</th>
        </tr>
		</thead>
        {foreach $Pacientes as $Paciente}
        <tr>
            <td>{$Paciente.PacienteId}</td>
            <td>{$Paciente.NomePaciente}</td>
			<td>{$Paciente.DataNasc|date_format:"%d/%m/%Y"}</td>
			<td><a href="/info/pacientes/pacientes_ficha/{$Paciente.PacienteId}" class="btn btn-sm btn-primary">Acessar</a></td>
			<td><a href="/info/pacientes/paciente_excluir/{$Paciente.PacienteId}" class="btn btn-sm btn-danger">Excluir</a></td>
        </tr>
		
		<div class="modal fade" id="myModal{$Paciente.PacienteId}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Confirma Exclusão</h4>
			  </div>
			  <div class="modal-body">
					<label>Confirma Exclusão do Paciente <b>{$Paciente.NomePaciente}</b>?
			  </div>
			  <div class="modal-footer">
				<a href="/info/pacientes/paciente_excluir/{$Paciente.PacienteId}" class="btn btn-sm btn-danger">Excluir</a>
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