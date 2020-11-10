<?php /* Smarty version Smarty-3.1.13, created on 2020-11-10 17:06:31
         compiled from "engine\view\InfoPanel\pages\Agenda\system.agenda.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61785cce7726991fb0-11616126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2884816d9eecc571d5f54062309a21cd099cd5f9' => 
    array (
      0 => 'engine\\view\\InfoPanel\\pages\\Agenda\\system.agenda.tpl',
      1 => 1605037886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61785cce7726991fb0-11616126',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5cce772703ed94_90511956',
  'variables' => 
  array (
    'Livros' => 0,
    'livroid' => 0,
    'Liv' => 0,
    'PATH' => 0,
    'dia' => 0,
    'mes' => 0,
    'ano' => 0,
    'Horarios' => 0,
    'Hor' => 0,
    'livrotipo' => 0,
    'atual' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cce772703ed94_90511956')) {function content_5cce772703ed94_90511956($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\sysmile\\engine\\libs\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE HTML>
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

<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderTopBody2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-md-7">
		<div class="step">
			<h3>Agenda<?php  $_smarty_tpl->tpl_vars['Liv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Liv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Livros']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Liv']->key => $_smarty_tpl->tpl_vars['Liv']->value){
$_smarty_tpl->tpl_vars['Liv']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['livroid']->value==$_smarty_tpl->tpl_vars['Liv']->value['LivroId']){?> - <?php echo $_smarty_tpl->tpl_vars['Liv']->value['Descricao'];?>
 <?php $_smarty_tpl->tpl_vars['livrotipo'] = new Smarty_variable($_smarty_tpl->tpl_vars['Liv']->value['Tipo'], null, 0);?><?php }?><?php } ?></h3>
		</div>
		
		<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['PATH']->value;?>
/info/agenda/agenda_ir/<?php echo $_smarty_tpl->tpl_vars['dia']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['mes']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ano']->value;?>
">
		<div class="step">
			<label>Médico</label>
			<div class="row">
				<div class="col-md-10">
					<select name="livroid" class="form-control">
						<?php  $_smarty_tpl->tpl_vars['Liv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Liv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Livros']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Liv']->key => $_smarty_tpl->tpl_vars['Liv']->value){
$_smarty_tpl->tpl_vars['Liv']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['Liv']->value['LivroId'];?>
" <?php if ($_smarty_tpl->tpl_vars['livroid']->value==$_smarty_tpl->tpl_vars['Liv']->value['LivroId']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['Liv']->value['Descricao'];?>
</option>
						<?php } ?>
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
				<form method="post" data-toggle="validator" action="<?php echo $_smarty_tpl->tpl_vars['PATH']->value;?>
/info/agenda/agenda_buscar/<?php echo $_smarty_tpl->tpl_vars['livroid']->value;?>
">
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
						<?php  $_smarty_tpl->tpl_vars['Hor'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Hor']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Horarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Hor']->key => $_smarty_tpl->tpl_vars['Hor']->value){
$_smarty_tpl->tpl_vars['Hor']->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['Hor']->value['Id'];?>
</td>
							<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Hor']->value['Data'],"%d/%m/%Y");?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['Hor']->value['Hora'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['Hor']->value['NomePaciente'];?>
</td>
							<td><?php if ($_smarty_tpl->tpl_vars['Hor']->value['Celular']!=" "&&$_smarty_tpl->tpl_vars['Hor']->value['Celular']!=''){?><?php echo $_smarty_tpl->tpl_vars['Hor']->value['Celular'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['Hor']->value['Telefone'];?>
<?php }?></td>
							<td><?php echo $_smarty_tpl->tpl_vars['Hor']->value['Exame'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['Hor']->value['Convenio'];?>
</td>
							<td><div class="dropdown">
								<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									Opções
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									<?php if ($_smarty_tpl->tpl_vars['Hor']->value['Status']==null){?><li><a href="/info/agenda/agendar/<?php echo $_smarty_tpl->tpl_vars['Hor']->value['Id'];?>
/<?php echo $_smarty_tpl->tpl_vars['dia']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['mes']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ano']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['Hor']->value['LivroId'];?>
">Agendar</a></li><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['Hor']->value['Status']=="1"){?><li><a href="/info/agenda/cancelar/<?php echo $_smarty_tpl->tpl_vars['Hor']->value['Id'];?>
/<?php echo $_smarty_tpl->tpl_vars['dia']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['mes']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ano']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['Hor']->value['LivroId'];?>
">Cancelar</a></li><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['Hor']->value['Status']=="1"){?><li role="separator" class="divider"></li><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['Hor']->value['Status']=="1"){?><li><a data-toggle="modal" data-target="#myModal<?php echo $_smarty_tpl->tpl_vars['Hor']->value['Id'];?>
" href="">Visualizar</a></li><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['Hor']->value['Status']=="1"){?><li><a href="/info/agenda/editahorario/<?php echo $_smarty_tpl->tpl_vars['Hor']->value['Id'];?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Hor']->value['Data'],"%d/%m/%Y");?>
/<?php echo $_smarty_tpl->tpl_vars['Hor']->value['LivroId'];?>
">Editar Agendamento</a></li><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['Hor']->value['Status']=="1"){?><li><a href="/info/pacientes/pacientes_ficha/<?php echo $_smarty_tpl->tpl_vars['Hor']->value['PacienteId'];?>
">Ficha do Paciente</a></li><?php }?>
								</ul>
								</div>
							</td>
						</tr>

						<div class="modal fade" id="myModal<?php echo $_smarty_tpl->tpl_vars['Hor']->value['Id'];?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
																	<label><?php echo utf8_encode($_smarty_tpl->tpl_vars['Hor']->value['Descricao']);?>
</label>
																</div>
																<div class="col-md-3">
																	<h4>Data</h4>
																	<label><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Hor']->value['Data'],"%d/%m/%Y");?>
</label>
																</div>
																<div class="col-md-2">
																	<h4>Hora</h4>
																	<label><?php echo $_smarty_tpl->tpl_vars['Hor']->value['Hora'];?>
</label>
																</div>
															</div>
															
															<div class="row">
																<div class="col-md-12">
																	<h4>Nome do Paciente</h4>
																	<label><?php echo $_smarty_tpl->tpl_vars['Hor']->value['NomePaciente'];?>
</label>
																</div>
															</div>
															<div class="row">
																<div class="col-md-5">
																	<h4>Data de Nascimento</h4>
																	<label><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Hor']->value['DataNasc'],"%d/%m/%Y");?>
</label>
																</div>
																<div class="col-md-4">
																	<h4>Telefone</h4>
																	<label><?php echo $_smarty_tpl->tpl_vars['Hor']->value['Telefone'];?>
</label>
																</div>
																<div class="col-md-3">
																	<h4>Celular</h4>
																	<label><?php echo $_smarty_tpl->tpl_vars['Hor']->value['Celular'];?>
</label>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<h4>Procedimento</h4>
																	<label><?php echo $_smarty_tpl->tpl_vars['Hor']->value['Exame'];?>
<?php if ($_smarty_tpl->tpl_vars['livrotipo']->value==2&&$_smarty_tpl->tpl_vars['Hor']->value['Exame']!=''){?> (<?php echo $_smarty_tpl->tpl_vars['Hor']->value['SessaoId'];?>
ª SESSAO)<?php }?></label>
																</div>
																<div class="col-md-6">
																	<h4>Convênio</h4>
																	<label><?php echo $_smarty_tpl->tpl_vars['Hor']->value['Convenio'];?>
</label>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<h4>Observações</h4>
																	<label><?php echo $_smarty_tpl->tpl_vars['Hor']->value['Observacoes'];?>
</label>
																</div>
															</div>
															
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
								</div>
								</div>
							</div>
							</div>
						<?php } ?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderBottomBody.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="/styles/js/dncalendar.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			var my_calendar = $("#dncalendar-container").dnCalendar({
				minDate: "2020-01-01",
				maxDate: "2049-12-31",
				defaultDate: "<?php echo $_smarty_tpl->tpl_vars['atual']->value;?>
",
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
					window.location = '/info/agenda/' + date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear() + '/' + <?php echo $_smarty_tpl->tpl_vars['livroid']->value;?>
;
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
</html><?php }} ?>