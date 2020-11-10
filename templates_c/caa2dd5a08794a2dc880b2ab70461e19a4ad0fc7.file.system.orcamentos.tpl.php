<?php /* Smarty version Smarty-3.1.13, created on 2020-11-10 16:55:35
         compiled from "engine\view\InfoPanel\pages\Orcamentos\system.orcamentos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:282705faad976551799-19637788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'caa2dd5a08794a2dc880b2ab70461e19a4ad0fc7' => 
    array (
      0 => 'engine\\view\\InfoPanel\\pages\\Orcamentos\\system.orcamentos.tpl',
      1 => 1605038132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '282705faad976551799-19637788',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5faad976657ed0_14357989',
  'variables' => 
  array (
    'status' => 0,
    'Orcamentos' => 0,
    'Orcamento' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5faad976657ed0_14357989')) {function content_5faad976657ed0_14357989($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\sysmile\\engine\\libs\\smarty\\plugins\\modifier.date_format.php';
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


<?php if ($_smarty_tpl->tpl_vars['status']->value==1){?><div class="alert alert-success" role="alert">Orçamento excluído com sucesso!</div><?php }?>

<div class="step">
	<h1>Cadastro de Orçamentos</h1>
	
	<a href="/info/orcamento/orcamento_novo" class="btn btn-sm btn-primary">Novo Orçamento</a>
	<br>
	<br>
	
	<table id="tabelaOrcamento" class="table table-hover table-stripped">
        <thead>
		<tr>
            <th>Id</th>
            <th>Nome</th>
			<th>Data de Nascimento</th>
			<th>Data</th>
			<th>Valor</th>
			<th>Edita</th>
			<th>Excluir</th>
        </tr>
		</thead>
        <?php  $_smarty_tpl->tpl_vars['Orcamento'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Orcamento']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Orcamentos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Orcamento']->key => $_smarty_tpl->tpl_vars['Orcamento']->value){
$_smarty_tpl->tpl_vars['Orcamento']->_loop = true;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['Orcamento']->value['Id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['Orcamento']->value['NomePaciente'];?>
</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Orcamento']->value['DataNasc'],"%d/%m/%Y");?>
</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Orcamento']->value['Data'],"%d/%m/%Y");?>
</td>
			<td>R$ <?php echo $_smarty_tpl->tpl_vars['Orcamento']->value['Valor'];?>
</td>
			<td><a href="/info/orcamento/editaOrcamento/<?php echo $_smarty_tpl->tpl_vars['Orcamento']->value['Id'];?>
" class="btn btn-sm btn-primary">Editar/Visualizar</a></td>
			<td><a href="/info/orcamento/excluiOrcamento/<?php echo $_smarty_tpl->tpl_vars['Orcamento']->value['Id'];?>
" class="btn btn-sm btn-danger">Excluir</a></td>
        </tr>
        <?php } ?>
    </table>
</div>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderBottomBody.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>