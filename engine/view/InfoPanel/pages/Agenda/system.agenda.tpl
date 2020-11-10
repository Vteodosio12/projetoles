<!DOCTYPE HTML>
<html>
<head>
    <title>Painel Administrativo</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
	<link rel="stylesheet" href="/styles/css/loading-bar.css">
    <link rel="stylesheet" href="/styles/bootstrap/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="/styles/css/medicPanel.css">
	
</head>
<body> 

{include file="../../master/renderTopBody2.tpl"}

<div class="row">
	<div class="col-md-7">
		<div class="step">
			<h3>Agenda{foreach $Livros as $Liv}{If $livroid == $Liv.LivroId} - {$Liv.Descricao} {$livrotipo = $Liv.Tipo}{/if}{/foreach}</h3>
		</div>
		
		<form method="post" action="{$PATH}/info/agenda/agenda_ir/{$dia}/{$mes}/{$ano}">
		<div class="step">
			<label>Médico</label>
			<div class="row">
				<div class="col-md-10">
					<select name="livroid" class="form-control">
						{foreach $Livros as $Liv}
							<option value="{$Liv.LivroId}" {If $livroid == $Liv.LivroId}selected{/if}>{$Liv.Descricao}</option>
						{/foreach}
					</select>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-default">Ir</button>		
				</div>
			</div>
		</form>		
			
		<br>
			<label>Pesquisar</label>
			<div class="row">
				<form method="post" data-toggle="validator" action="{$PATH}/info/agenda/agenda_buscar/{$livroid}">
					<div class="col-md-10">
						<input type="text" name="Busca" class="form-control" data-error="Informe um nome válido de Paciente." required>
						<div class="help-block with-errors"></div>
					</div>
					<div class="col-md-2">
						<button name="btn" type="submit" class="btn btn-default">Buscar</button>
					</div>
				</form>
			</div>			
		</div>
	</div>
	
	<div class="col-md-5">
		<div class="step">
			<div id="dncalendar-container">
			</div>
		
		

		</div>
	</div>
	</div>
	
	<div  class="col-md-12">
				<div class="step">
					<table class="table table-hover table-stripped">
						<thead>
						<tr>
							<th>Id</th>
							<th>Data</th>
							<th>Hora</th>
							<th>Paciente</th>
							<th>Telefone</th>
							<th>Procedimento</th>
							<th>Convênio</th>
							<th>Opções</th>
						</tr>
						</thead>
						{foreach $Horarios as $Hor}
						<tr>
							<td>{$Hor.Id}</td>
							<td>{$Hor.Data|date_format:"%d/%m/%Y"}</td>
							<td>{$Hor.Hora}</td>
							<td>{$Hor.NomePaciente}</td>
							<td>{if $Hor.Celular != " " And $Hor.Celular != ""}{$Hor.Celular}{else}{$Hor.Telefone}{/if}</td>
							<td>{$Hor.Exame}</td>
							<td>{$Hor.Convenio}</td>
							<td><div class="dropdown">
								<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									Opções
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									{if $Hor.Status == NULL}<li><a href="/info/agenda/agendar/{$Hor.Id}/{$dia}/{$mes}/{$ano}/{$Hor.LivroId}">Agendar</a></li>{/if}
									{if $Hor.Status == "1"}<li><a href="/info/agenda/cancelar/{$Hor.Id}/{$dia}/{$mes}/{$ano}/{$Hor.LivroId}">Cancelar</a></li>{/if}
									{if $Hor.Status == "1"}<li role="separator" class="divider"></li>{/if}
									{if $Hor.Status == "1"}<li><a data-toggle="modal" data-target="#myModal{$Hor.Id}" href="">Visualizar</a></li>{/if}
									{if $Hor.Status == "1"}<li><a href="/info/agenda/editahorario/{$Hor.Id}/{$Hor.Data|date_format:"%d/%m/%Y"}/{$Hor.LivroId}">Editar Agendamento</a></li>{/if}
									{if $Hor.Status == "1"}<li><a href="/info/pacientes/pacientes_ficha/{$Hor.PacienteId}">Ficha do Paciente</a></li>{/if}
								</ul>
								</div>
							</td>
						</tr>

						<div class="modal fade" id="myModal{$Hor.Id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Dados do Agendamento</h4>
								</div>
								<div class="modal-body">
															<div class="row">
																<div class="col-md-7">
																	<h4>Agenda</h4>
																	<label>{$Hor.Descricao|utf8_encode}</label>
																</div>
																<div class="col-md-3">
																	<h4>Data</h4>
																	<label>{$Hor.Data|date_format:"%d/%m/%Y"}</label>
																</div>
																<div class="col-md-2">
																	<h4>Hora</h4>
																	<label>{$Hor.Hora}</label>
																</div>
															</div>
															
															<div class="row">
																<div class="col-md-12">
																	<h4>Nome do Paciente</h4>
																	<label>{$Hor.NomePaciente}</label>
																</div>
															</div>
															<div class="row">
																<div class="col-md-5">
																	<h4>Data de Nascimento</h4>
																	<label>{$Hor.DataNasc|date_format:"%d/%m/%Y"}</label>
																</div>
																<div class="col-md-4">
																	<h4>Telefone</h4>
																	<label>{$Hor.Telefone}</label>
																</div>
																<div class="col-md-3">
																	<h4>Celular</h4>
																	<label>{$Hor.Celular}</label>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<h4>Procedimento</h4>
																	<label>{$Hor.Exame}{if $livrotipo == 2 AND $Hor.Exame != ""} ({$Hor.SessaoId}ª SESSAO){/if}</label>
																</div>
																<div class="col-md-6">
																	<h4>Convênio</h4>
																	<label>{$Hor.Convenio}</label>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<h4>Observações</h4>
																	<label>{$Hor.Observacoes}</label>
																</div>
															</div>
															
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
								</div>
								</div>
							</div>
							</div>
						{/foreach}


{include file="../../master/renderBottomBody.tpl"}

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="/styles/js/dncalendar.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			var my_calendar = $("#dncalendar-container").dnCalendar({
				minDate: "2020-01-01",
				maxDate: "2049-12-31",
				defaultDate: "{$atual}",
				monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ], 
				monthNamesShort: [ 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' ],
				dayNames: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                dayNamesShort: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab' ],
                dataTitles: { defaultDate: '', today : 'Hoje' },
                notes: [],
				dias_livres: [],
				dias_ocupados: [],
                showNotes: true,
                startWeek: 'sunday',
                dayClick: function(date, view) {
					window.location = '/info/agenda/' + date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear() + '/' + {$livroid};
                }
			});

			// init calendar
			my_calendar.build();

			// update calendar
			// my_calendar.update({
			// 	minDate: "2016-01-05",
			// 	defaultDate: "2016-05-04"
			// });
		});
		</script>
		

<link rel="stylesheet" href="/styles/css/dncalendar-skin.css">
<script src="/styles/bootstrap/js/bootstrap.js"></script>

<script src="/styles/js/validator.min.js"></script>



</body>
</html>