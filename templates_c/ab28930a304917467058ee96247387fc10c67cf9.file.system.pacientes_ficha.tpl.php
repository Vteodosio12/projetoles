<?php /* Smarty version Smarty-3.1.13, created on 2020-10-26 20:42:02
         compiled from "engine\view\InfoPanel\pages\Pacientes\system.pacientes_ficha.tpl" */ ?>
<?php /*%%SmartyHeaderCode:287845ccfa2a6cc2736-77483685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab28930a304917467058ee96247387fc10c67cf9' => 
    array (
      0 => 'engine\\view\\InfoPanel\\pages\\Pacientes\\system.pacientes_ficha.tpl',
      1 => 1603754865,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '287845ccfa2a6cc2736-77483685',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ccfa2a6dd6f78_70335500',
  'variables' => 
  array (
    'status' => 0,
    'Pacientes' => 0,
    'Paciente' => 0,
    'inf' => 0,
    'Agendas' => 0,
    'Agenda' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ccfa2a6dd6f78_70335500')) {function content_5ccfa2a6dd6f78_70335500($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\sysmile\\engine\\libs\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("../../master/header2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderTopBody2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['status']->value==1){?><div class="alert alert-success" role="alert">Paciente Incluído com sucesso!</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==2){?><div class="alert alert-success" role="alert">Paciente Editado com sucesso</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==3){?><div class="alert alert-warning" role="alert"><?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==4){?><div class="alert alert-success" role="alert">Agendamento realizado com sucesso</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==5){?><div class="alert alert-success" role="alert">Agendamento Cancelado com sucesso</div><?php }?>

<div class="step">
	<h1>Ficha Cadastral</h1>
	
	<?php  $_smarty_tpl->tpl_vars['Paciente'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Paciente']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Pacientes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Paciente']->key => $_smarty_tpl->tpl_vars['Paciente']->value){
$_smarty_tpl->tpl_vars['Paciente']->_loop = true;
?>
	<div><a href="/info/pacientes/pacientes_editar/<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['PacienteId'];?>
" class="btn btn-sm btn-primary">Editar Dados do Paciente</a></div>

	<div class="row">
		<div class="col-md-9">
			<h3>Nome</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['NomePaciente'];?>
 <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Cadeirante']=="Sim"){?><img src="/styles/images/deficiente.png" alt="alternative text" title="Paciente Deficiente"/><?php }?></label>
		</div>

		<div class="col-md-3">
			<h3>Data de Nascimento</h3>
			<label></label>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<h3>Sexo</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Sexo'];?>
</label>
		</div>
		
		<div class="col-md-4">
			<h3>Documento</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Tipo'];?>
 - <?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Documento'];?>
</label>
		</div>
		
		<div class="col-md-4">
			<h3>Estado Civil</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['EstadoCivil'];?>
</label>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h3>Endereço</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Endereco'];?>
</label>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h3>Bairro</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Bairro'];?>
</label>
		</div>

		<div class="col-md-3">
			<h3>Cidade</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Cidade'];?>
</label>
		</div>

		<div class="col-md-2">
			<h3>Estado</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Estado'];?>
</label>
		</div>

		<div class="col-md-3">
			<h3>CEP</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['CEP'];?>
</label>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6">
			<h3>Email</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Email'];?>
</label>
		</div>

		<div class="col-md-3">
			<h3>Telefone</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Telefone'];?>
</label>
		</div>

		<div class="col-md-3">
			<h3>Celular</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Celular'];?>
</label>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<h3>Convênio</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Descricao'];?>
</label>
		</div>
		<div class="col-md-4">
			<h3>Número da Carteirinha</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Carteirinha'];?>
</label>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['inf']->value->name=="MARTINSRAMOS"){?>
		<div class="col-md-4">
			<h3>Número de Filhos</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Filhos'];?>
</label>
		</div>
		<?php }?>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<h3>Observação</h3>
			<label><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Observacao'];?>
</label>
		</div>
	</div>
	
	<?php } ?>
	
	<hr />
	
	<h1>Agendamentos</h1>
	<div><a href="/info/pacientes/pacientes_novo_agendamento/<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['PacienteId'];?>
" class="btn btn-sm btn-primary">Novo Agendamento</a>
	
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
		<?php  $_smarty_tpl->tpl_vars['Agenda'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Agenda']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Agendas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Agenda']->key => $_smarty_tpl->tpl_vars['Agenda']->value){
$_smarty_tpl->tpl_vars['Agenda']->_loop = true;
?>
		<tr>
			<td><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==4){?><font color="#04B486"><?php }?><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==5){?><font color="#F78181"><?php }?><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==6){?><font color="#FF5722"><?php }?><?php echo $_smarty_tpl->tpl_vars['Agenda']->value['Id'];?>
<?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==4||$_smarty_tpl->tpl_vars['Agenda']->value['Status']==5||$_smarty_tpl->tpl_vars['Agenda']->value['Status']==6){?></font><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==4){?><font color="#04B486"><?php }?><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==5){?><font color="#F78181"><?php }?><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==6){?><font color="#FF5722"><?php }?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Agenda']->value['Data'],"%d/%m/%Y");?>
<?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==4||$_smarty_tpl->tpl_vars['Agenda']->value['Status']==5||$_smarty_tpl->tpl_vars['Agenda']->value['Status']==6){?></font><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==4){?><font color="#04B486"><?php }?><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==5){?><font color="#F78181"><?php }?><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==6){?><font color="#FF5722"><?php }?><?php echo $_smarty_tpl->tpl_vars['Agenda']->value['Hora'];?>
<?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==4||$_smarty_tpl->tpl_vars['Agenda']->value['Status']==5||$_smarty_tpl->tpl_vars['Agenda']->value['Status']==6){?></font><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==4){?><font color="#04B486"><?php }?><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==5){?><font color="#F78181"><?php }?><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==6){?><font color="#FF5722"><?php }?><?php echo $_smarty_tpl->tpl_vars['Agenda']->value['Livro'];?>
<?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==4||$_smarty_tpl->tpl_vars['Agenda']->value['Status']==5||$_smarty_tpl->tpl_vars['Agenda']->value['Status']==6){?></font><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==4){?><font color="#04B486"><?php }?><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==5){?><font color="#F78181"><?php }?><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==6){?><font color="#FF5722"><?php }?><?php echo $_smarty_tpl->tpl_vars['Agenda']->value['Procedimento'];?>
<?php if ($_smarty_tpl->tpl_vars['Agenda']->value['TipoLivro']==2){?> (<?php echo $_smarty_tpl->tpl_vars['Agenda']->value['SessaoId'];?>
ª SESSAO)<?php }?><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==4||$_smarty_tpl->tpl_vars['Agenda']->value['Status']==5||$_smarty_tpl->tpl_vars['Agenda']->value['Status']==6){?></font><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==4){?><font color="#04B486"><?php }?><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==5){?><font color="#F78181"><?php }?><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==6){?><font color="#FF5722"><?php }?><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==1){?>Agendado<?php }elseif($_smarty_tpl->tpl_vars['Agenda']->value['Status']==4){?>Compareceu<?php }elseif($_smarty_tpl->tpl_vars['Agenda']->value['Status']==5){?>Faltou<?php }elseif($_smarty_tpl->tpl_vars['Agenda']->value['Status']==6){?>Cancelou<?php }?><?php if ($_smarty_tpl->tpl_vars['Agenda']->value['Status']==4||$_smarty_tpl->tpl_vars['Agenda']->value['Status']==5||$_smarty_tpl->tpl_vars['Agenda']->value['Status']==6){?></font><?php }?></td>
			<td><div class="dropdown">
						  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Opções
							<span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a href="/info/pacientes/cancelar_agendamento/<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['PacienteId'];?>
/<?php echo $_smarty_tpl->tpl_vars['Agenda']->value['Id'];?>
">Cancelar</a></li>
							<li><a href="/info/pacientes/duplicar_agendamento/<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['PacienteId'];?>
/<?php echo $_smarty_tpl->tpl_vars['Agenda']->value['Id'];?>
">Duplicar</a></li>
							<li><a href="/info/pacientes/transferir_agendamento/<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['PacienteId'];?>
/<?php echo $_smarty_tpl->tpl_vars['Agenda']->value['Id'];?>
">Transferir</a></li>
						  </ul>
						</div>
					</td>
		</tr>
		<?php } ?>
	</table>
	
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderBottomBody.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>