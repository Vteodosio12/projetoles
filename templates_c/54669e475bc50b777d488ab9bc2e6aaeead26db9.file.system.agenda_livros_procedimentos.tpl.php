<?php /* Smarty version Smarty-3.1.13, created on 2019-08-01 23:36:43
         compiled from "engine\view\InfoPanel\pages\Agenda\system.agenda_livros_procedimentos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21695cf953494f8aa0-68439644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54669e475bc50b777d488ab9bc2e6aaeead26db9' => 
    array (
      0 => 'engine\\view\\InfoPanel\\pages\\Agenda\\system.agenda_livros_procedimentos.tpl',
      1 => 1561603799,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21695cf953494f8aa0-68439644',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5cf9534955d5d6_24719858',
  'variables' => 
  array (
    'Livros' => 0,
    'livro' => 0,
    'PATH' => 0,
    'livroid' => 0,
    'Procedimentos' => 0,
    'Proc' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cf9534955d5d6_24719858')) {function content_5cf9534955d5d6_24719858($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../../master/header2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderTopBody2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php  $_smarty_tpl->tpl_vars['livro'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['livro']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Livros']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['livro']->key => $_smarty_tpl->tpl_vars['livro']->value){
$_smarty_tpl->tpl_vars['livro']->_loop = true;
?><?php } ?>

<div class="step">
	<h1>Procedimentos do Livro - <?php echo $_smarty_tpl->tpl_vars['livro']->value['Descricao'];?>
</h1>
	
	<label>Selecione os Procedimentos realizados por este livro:</label>
	
	<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['PATH']->value;?>
/info/agenda/vinculoLivroProcedimento">
	
	<div class="helper-display-none">
		<input type="text" name="livroid" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['livroid']->value;?>
">
	</div>
		
	<div class="row">
		<?php  $_smarty_tpl->tpl_vars['Proc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Proc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Procedimentos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Proc']->key => $_smarty_tpl->tpl_vars['Proc']->value){
$_smarty_tpl->tpl_vars['Proc']->_loop = true;
?>
				<div class="col-md-6">
					<label><input type="checkbox" name="option[<?php echo $_smarty_tpl->tpl_vars['Proc']->value['ProcedimentoId'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['Proc']->value['ProcedimentoId'];?>
" <?php if ($_smarty_tpl->tpl_vars['Proc']->value['Id']!=null){?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['Proc']->value['Descricao'];?>
</label>
				</div>
		<?php } ?>
    </div>
	
	<br>
	
	<button type="submit" class="btn btn-default">Salvar</button>

    </form>		
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderBottomBody.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>