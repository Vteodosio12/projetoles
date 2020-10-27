<?php /* Smarty version Smarty-3.1.13, created on 2020-10-26 19:51:30
         compiled from "engine\view\InfoPanel\pages\Cadastros\system.cadastros.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196085d375f9c4b21a2-00920429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '596f80e5959d75d9f642214ae59cd8a54f69184a' => 
    array (
      0 => 'engine\\view\\InfoPanel\\pages\\Cadastros\\system.cadastros.tpl',
      1 => 1603752630,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196085d375f9c4b21a2-00920429',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5d375f9c547064_58033658',
  'variables' => 
  array (
    'status' => 0,
    'Livros' => 0,
    'Livro' => 0,
    'Convenios' => 0,
    'Convenio' => 0,
    'Procedimentos' => 0,
    'Procedimento' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d375f9c547064_58033658')) {function content_5d375f9c547064_58033658($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../../master/header2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderTopBody2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['status']->value==1){?><div class="alert alert-success" role="alert">Horários Gerados com sucesso!</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==2){?><div class="alert alert-success" role="alert">Horários Bloqueados com sucesso!</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==3){?><div class="alert alert-success" role="alert">Novo Convênio Cadastrado com Sucesso!</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==4){?><div class="alert alert-success" role="alert">Convênio Editado com Sucesso!</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==5){?><div class="alert alert-success" role="alert">Convênio Excluido com Sucesso!</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==6){?><div class="alert alert-success" role="alert">Convênios Vinculados com Sucesso!</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==7){?><div class="alert alert-success" role="alert">Novo Procedimento Cadastrado com Sucesso!</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==8){?><div class="alert alert-success" role="alert">Procedimento Editado com Sucesso!</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==9){?><div class="alert alert-success" role="alert">Procedimento Excluido com Sucesso!</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==10){?><div class="alert alert-success" role="alert">Procedimentos Vinculados com Sucesso!</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['status']->value==11){?><div class="alert alert-success" role="alert">Livro Inativado com Sucesso!</div><?php }?>

<div class="step">
	<h1>Livros</h1>
	<a href="/info/cadastros/agenda_livros_novo" class="btn btn-sm btn-primary">Novo Livro</a>
	
	<table id="tabelaLivro" class="table table-hover table-stripped">
		<thead>
        <tr>
            <th>Código</th>
			<th>Descrição</th>
			<th>Ações</th>
			<th></th>
        </tr>
		</thead>
		<?php  $_smarty_tpl->tpl_vars['Livro'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Livro']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Livros']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Livro']->key => $_smarty_tpl->tpl_vars['Livro']->value){
$_smarty_tpl->tpl_vars['Livro']->_loop = true;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['Livro']->value['LivroId'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['Livro']->value['Descricao'];?>
</td>
			<td><a href="/info/cadastros/agenda_livros_edita/<?php echo $_smarty_tpl->tpl_vars['Livro']->value['LivroId'];?>
" class="btn btn-sm btn-primary">Editar</a></td>
			<td><a href="/info/cadastros/agenda_livros_exclui/<?php echo $_smarty_tpl->tpl_vars['Livro']->value['LivroId'];?>
" class="btn btn-sm btn-danger">Excluir</a></td>
        </tr>
		<?php } ?>
    </table>
	
	<hr />
	
	<h1>Convênios</h1>
	<a href="/info/cadastros/agenda_convenios_novo" class="btn btn-sm btn-primary">Novo Convênio</a>
	
	<table id="tabelaConvenio" class="table table-hover table-stripped">
		<thead>
        <tr>
            <th>Código</th>
			<th>Descrição</th>
			<th>Ações</th>
			<th></th>
        </tr>
		</thead>
		<?php  $_smarty_tpl->tpl_vars['Convenio'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Convenio']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Convenios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Convenio']->key => $_smarty_tpl->tpl_vars['Convenio']->value){
$_smarty_tpl->tpl_vars['Convenio']->_loop = true;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['Convenio']->value['ConvenioId'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['Convenio']->value['Descricao'];?>
</td>
			<td><a href="/info/cadastros/agenda_convenios_edita/<?php echo $_smarty_tpl->tpl_vars['Convenio']->value['ConvenioId'];?>
" class="btn btn-sm btn-primary">Editar</a></td>
			<td><a data-toggle="modal" data-target="#myCancelar<?php echo $_smarty_tpl->tpl_vars['Convenio']->value['ConvenioId'];?>
" href="" class="btn btn-sm btn-danger" data-dismiss="modal">Excluir</a></td>
        </tr>
		
		<div class="modal fade" id="myCancelar<?php echo $_smarty_tpl->tpl_vars['Convenio']->value['ConvenioId'];?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<div class="row">
							<div class="col-md-12">
								<h3>Confirmação de Exclusão</h3>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<label>Você confirma a exclusão do Convênio <b><?php echo $_smarty_tpl->tpl_vars['Convenio']->value['Descricao'];?>
</b>?</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<a class="btn btn-danger" href="/info/cadastros/agenda_convenios_exclui/<?php echo $_smarty_tpl->tpl_vars['Convenio']->value['ConvenioId'];?>
">Excluir</a>
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
    </table>
	
	<hr />
	
	<h1>Procedimentos</h1>
	<a href="/info/cadastros/agenda_procedimentos_novo" class="btn btn-sm btn-primary">Novo Procedimento</a>
	
	<table id="tabelaProcedimento" class="table table-hover table-stripped">
		<thead>
        <tr>
            <th>Código</th>
			<th>Descrição</th>
			<th>Ações</th>
			<th></th>
        </tr>
		</thead>
		<?php  $_smarty_tpl->tpl_vars['Procedimento'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Procedimento']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Procedimentos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Procedimento']->key => $_smarty_tpl->tpl_vars['Procedimento']->value){
$_smarty_tpl->tpl_vars['Procedimento']->_loop = true;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['Procedimento']->value['ProcedimentoId'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['Procedimento']->value['Descricao'];?>
</td>
			<td><a href="/info/cadastros/agenda_procedimentos_edita/<?php echo $_smarty_tpl->tpl_vars['Procedimento']->value['ProcedimentoId'];?>
" class="btn btn-sm btn-primary">Editar</a></td>
			<td><a data-toggle="modal" data-target="#myCancelarProc<?php echo $_smarty_tpl->tpl_vars['Procedimento']->value['ProcedimentoId'];?>
" href="" class="btn btn-sm btn-danger" data-dismiss="modal">Excluir</a></td>
        </tr>
		
		<div class="modal fade" id="myCancelarProc<?php echo $_smarty_tpl->tpl_vars['Procedimento']->value['ProcedimentoId'];?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<div class="row">
							<div class="col-md-12">
								<h3>Confirmação de Exclusão</h3>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<label>Você confirma a exclusão do Procedimento <b><?php echo $_smarty_tpl->tpl_vars['Procedimento']->value['Descricao'];?>
</b>?</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<a class="btn btn-danger" href="/info/cadastros/agenda_procedimentos_exclui/<?php echo $_smarty_tpl->tpl_vars['Procedimento']->value['ProcedimentoId'];?>
">Excluir</a>
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
    </table>
	
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderBottomBody.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>