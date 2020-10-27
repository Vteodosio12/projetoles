<?php /* Smarty version Smarty-3.1.13, created on 2020-10-26 13:18:22
         compiled from "engine\view\InfoPanel\pages\Usuarios\system.usuarios.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53425cf95622a1b967-95464150%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ef452c13e8aa38343bd74225b06c1999678aeff' => 
    array (
      0 => 'engine\\view\\InfoPanel\\pages\\Usuarios\\system.usuarios.tpl',
      1 => 1603729078,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53425cf95622a1b967-95464150',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5cf95622a9be54_32543258',
  'variables' => 
  array (
    'status' => 0,
    'usuarios' => 0,
    'usu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cf95622a9be54_32543258')) {function content_5cf95622a9be54_32543258($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../../master/header2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderTopBody2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['status']->value==1){?><div class="alert alert-success" role="alert">Usuário Incluído com sucesso!</div><?php }?>

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
        <?php  $_smarty_tpl->tpl_vars['usu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['usu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['usu']->key => $_smarty_tpl->tpl_vars['usu']->value){
$_smarty_tpl->tpl_vars['usu']->_loop = true;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['usu']->value['userid'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['usu']->value['nome'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['usu']->value['LOGIN'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['usu']->value['inativo']=='F'){?>ATIVO<?php }else{ ?>DESATIVADO<?php }?></td>
			<td><a href="/info/usuarios/usuarios_ficha/<?php echo $_smarty_tpl->tpl_vars['usu']->value['userid'];?>
" class="btn btn-sm btn-primary">Acessar</a></td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderBottomBody.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>