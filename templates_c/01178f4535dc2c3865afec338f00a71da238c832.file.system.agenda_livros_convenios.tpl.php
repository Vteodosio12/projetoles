<?php /* Smarty version Smarty-3.1.13, created on 2020-10-27 18:54:57
         compiled from "engine\view\InfoPanel\pages\Cadastros\system.agenda_livros_convenios.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188155f9895da336bc0-11168863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01178f4535dc2c3865afec338f00a71da238c832' => 
    array (
      0 => 'engine\\view\\InfoPanel\\pages\\Cadastros\\system.agenda_livros_convenios.tpl',
      1 => 1603835693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188155f9895da336bc0-11168863',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5f9895da37fe22_88444484',
  'variables' => 
  array (
    'Livros' => 0,
    'livro' => 0,
    'PATH' => 0,
    'livroid' => 0,
    'Convenios' => 0,
    'Conv' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f9895da37fe22_88444484')) {function content_5f9895da37fe22_88444484($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../../master/header2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderTopBody2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php  $_smarty_tpl->tpl_vars['livro'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['livro']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Livros']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['livro']->key => $_smarty_tpl->tpl_vars['livro']->value){
$_smarty_tpl->tpl_vars['livro']->_loop = true;
?><?php } ?>

<div class="step">
	<h1>Convênios do Livro - <?php echo $_smarty_tpl->tpl_vars['livro']->value['Descricao'];?>
</h1>
	
	<label>Selecione os Convênios aceitos por este livro:</label>
	
	<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['PATH']->value;?>
/info/cadastros/vinculoLivroConvenio">
	
	<div class="helper-display-none">
		<input type="text" name="livroid" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['livroid']->value;?>
">
	</div>
		
	<div class="row">
		<?php  $_smarty_tpl->tpl_vars['Conv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Conv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Convenios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Conv']->key => $_smarty_tpl->tpl_vars['Conv']->value){
$_smarty_tpl->tpl_vars['Conv']->_loop = true;
?>
				<div class="col-md-6">
					<label><input type="checkbox" name="option[<?php echo $_smarty_tpl->tpl_vars['Conv']->value['ConvenioId'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['Conv']->value['ConvenioId'];?>
" <?php if ($_smarty_tpl->tpl_vars['Conv']->value['Id']!=null){?>checked<?php }?>> <?php echo $_smarty_tpl->tpl_vars['Conv']->value['Descricao'];?>
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