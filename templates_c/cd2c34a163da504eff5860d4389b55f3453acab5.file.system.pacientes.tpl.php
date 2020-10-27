<?php /* Smarty version Smarty-3.1.13, created on 2020-10-26 20:43:02
         compiled from "engine\view\InfoPanel\pages\Pacientes\system.pacientes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47515ccfa3bb5978d7-43850814%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd2c34a163da504eff5860d4389b55f3453acab5' => 
    array (
      0 => 'engine\\view\\InfoPanel\\pages\\Pacientes\\system.pacientes.tpl',
      1 => 1603755779,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47515ccfa3bb5978d7-43850814',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ccfa3bb609008_26830559',
  'variables' => 
  array (
    'status' => 0,
    'Pacientes' => 0,
    'Paciente' => 0,
    'contas' => 0,
    'conta' => 0,
    'PATH' => 0,
    'pagina' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ccfa3bb609008_26830559')) {function content_5ccfa3bb609008_26830559($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\sysmile\\engine\\libs\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("../../master/header2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderTopBody2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['status']->value==1){?><div class="alert alert-success" role="alert">Paciente excluído com sucesso!</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==2){?><div class="alert alert-danger" role="alert">Paciente não pode ser excluído pois possui agendamentos cadastrados!</div><?php }?>

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
        <?php  $_smarty_tpl->tpl_vars['Paciente'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Paciente']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Pacientes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Paciente']->key => $_smarty_tpl->tpl_vars['Paciente']->value){
$_smarty_tpl->tpl_vars['Paciente']->_loop = true;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['PacienteId'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['NomePaciente'];?>
</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Paciente']->value['DataNasc'],"%d/%m/%Y");?>
</td>
			<td><a href="/info/pacientes/pacientes_ficha/<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['PacienteId'];?>
" class="btn btn-sm btn-primary">Acessar</a></td>
			<td><a href="/info/pacientes/paciente_excluir/<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['PacienteId'];?>
" class="btn btn-sm btn-danger">Excluir</a></td>
        </tr>
		
		<div class="modal fade" id="myModal<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['PacienteId'];?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Confirma Exclusão</h4>
			  </div>
			  <div class="modal-body">
					<label>Confirma Exclusão do Paciente <b><?php echo $_smarty_tpl->tpl_vars['Paciente']->value['NomePaciente'];?>
</b>?
			  </div>
			  <div class="modal-footer">
				<a href="/info/pacientes/paciente_excluir/<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['PacienteId'];?>
" class="btn btn-sm btn-danger">Excluir</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>							
			  </div>
			</div>
		  </div>
		</div>
        <?php } ?>
    </table>
	
	<?php echo count($_smarty_tpl->tpl_vars['Pacientes']->value);?>
 Resultados Apresentados
	
	<?php  $_smarty_tpl->tpl_vars['conta'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['conta']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['conta']->key => $_smarty_tpl->tpl_vars['conta']->value){
$_smarty_tpl->tpl_vars['conta']->_loop = true;
?><?php } ?>
	
	<?php if ($_smarty_tpl->tpl_vars['conta']->value['conta']!=''){?>
	<p align="center"> 	
		<center><form method="post" action="<?php echo $_smarty_tpl->tpl_vars['PATH']->value;?>
/info/pacientes/MudaPagina">
			<?php if ($_smarty_tpl->tpl_vars['pagina']->value!=1){?><a href="/info/pacientes/<?php echo $_smarty_tpl->tpl_vars['pagina']->value-1;?>
" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-chevron-left"></i></a><?php }?>
			1 <input type="text" name="pagina" size="4" value="<?php echo $_smarty_tpl->tpl_vars['pagina']->value;?>
"> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['conta']->value['conta'];?>
<?php $_tmp1=ob_get_clean();?><?php echo ceil($_tmp1);?>

			<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['conta']->value['conta'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['pagina']->value!=ceil($_tmp2)){?><a href="/info/pacientes/<?php echo $_smarty_tpl->tpl_vars['pagina']->value+1;?>
" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-chevron-right"></i></a><?php }?>
			<div class="helper-display-none">
				<button type="submit" class="btn btn-default">Ir</button>
			</div>
			</form>
		</center>
	</p>
	<?php }?>
</div>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderBottomBody.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>