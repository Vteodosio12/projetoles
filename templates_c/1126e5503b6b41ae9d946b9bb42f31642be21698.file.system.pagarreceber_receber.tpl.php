<?php /* Smarty version Smarty-3.1.13, created on 2019-12-04 20:52:31
         compiled from "engine\view\InfoPanel\pages\PagarReceber\system.pagarreceber_receber.tpl" */ ?>
<?php /*%%SmartyHeaderCode:228775de846bfedb1e4-07564613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1126e5503b6b41ae9d946b9bb42f31642be21698' => 
    array (
      0 => 'engine\\view\\InfoPanel\\pages\\PagarReceber\\system.pagarreceber_receber.tpl',
      1 => 1561603809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '228775de846bfedb1e4-07564613',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'grupoempresaid' => 0,
    'inf' => 0,
    'Pagar' => 0,
    'Paga' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5de846c005ced5_77160740',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5de846c005ced5_77160740')) {function content_5de846c005ced5_77160740($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\engine\\libs\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("../../master/header2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderTopBody2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="step">
	<h1>Receber</h1>
	<a href="/info/PagarReceber/pagarreceber_receber_novo/<?php echo $_smarty_tpl->tpl_vars['grupoempresaid']->value;?>
" class="btn btn-sm btn-primary">Novo Recebimento</a> <?php if ($_smarty_tpl->tpl_vars['inf']->value->name=="CAIO TORRES"||$_smarty_tpl->tpl_vars['inf']->value->name=="VINICIUS TEODOSIO ALVES"){?><a href="/info/PagarReceber/pagarreceber_receber_consolidar/<?php echo $_smarty_tpl->tpl_vars['grupoempresaid']->value;?>
" class="btn btn-sm btn-primary">Consolidar Entradas</a><?php }?>
	
	<table class="table table-hover table-stripped">
		<thead>
        <tr>
            <th>Código</th>
			<th>Data de Lançamento</th>
            <th>Data de Vencimento</th>
			<th>Favorecido</th>
			<th>Valor Real</th>
			<th>Histórico</th>
			<th>Status</th>
			<th>Acessar</th>
        </tr>
		</thead>
		<?php  $_smarty_tpl->tpl_vars['Paga'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Paga']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Pagar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Paga']->key => $_smarty_tpl->tpl_vars['Paga']->value){
$_smarty_tpl->tpl_vars['Paga']->_loop = true;
?>
        <tr>
            <td><?php echo utf8_encode($_smarty_tpl->tpl_vars['Paga']->value['MOVIMENTOID']);?>
</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Paga']->value['DATALANCAMENTO'],"%d/%m/%Y");?>
</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Paga']->value['DATAVENCIMENTO'],"%d/%m/%Y");?>
</td>
			<td><?php echo utf8_encode($_smarty_tpl->tpl_vars['Paga']->value['DESCFAVORECIDO']);?>
</td>
			<td>R$ <?php echo number_format($_smarty_tpl->tpl_vars['Paga']->value['VALORREAL'],2,',','.');?>
</td>
			<td><?php echo utf8_encode($_smarty_tpl->tpl_vars['Paga']->value['HISTORICO2']);?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['Paga']->value['STATUSCONFERENCIA']=="CA"){?><img src="http://www.angiocorpore.com.br/styles/images/check.png" alt="alternative text" title="Consolidada"/><?php }?></td>
			<td><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal<?php echo utf8_encode($_smarty_tpl->tpl_vars['Paga']->value['MOVIMENTOID']);?>
">Acessar</button>

					<div class="modal fade" id="myModal<?php echo utf8_encode($_smarty_tpl->tpl_vars['Paga']->value['MOVIMENTOID']);?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Dados da Despesa</h4>
						  </div>
						  <div class="modal-body">
													<div class="row">
														<div class="col-md-2">
															<h4>Código</h4>
															<label><?php echo utf8_encode($_smarty_tpl->tpl_vars['Paga']->value['MOVIMENTOID']);?>
</label>
														</div>
														<div class="col-md-4">
															<h4>Data Lançamento</h4>
															<label><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Paga']->value['DATALANCAMENTO'],"%d/%m/%Y");?>
</label>
														</div>
														<div class="col-md-6">
															<h4>Data Vencimento</h4>
															<label><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Paga']->value['DATAVENCIMENTO'],"%d/%m/%Y");?>
</label>
														</div>
													</div>
													
													<div class="row">
														<div class="col-md-12">
															<h4>Favorecido</h4>
															<label><?php echo utf8_encode($_smarty_tpl->tpl_vars['Paga']->value['DESCFAVORECIDO']);?>
</label>
														</div>
													</div>
													<div class="row">
														<div class="col-md-8">
															<h4>Plano de Conta</h4>
															<label><?php echo utf8_encode($_smarty_tpl->tpl_vars['Paga']->value['DESCPLANOCONTA']);?>
</label>
														</div>
													</div>
													<div class="row">
														<div class="col-md-4">
															<h4>Empresa</h4>
															<label><?php echo utf8_encode($_smarty_tpl->tpl_vars['Paga']->value['DESCEMPRESA']);?>
</label>
														</div>
														<div class="col-md-4">
															<h4>Data Competência</h4>
															<label><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Paga']->value['DATACOMPETENCIA'],"%d/%m/%Y");?>
</label>
														</div>
														<div class="col-md-4">
															<h4>Documento</h4>
															<label><?php echo utf8_encode($_smarty_tpl->tpl_vars['Paga']->value['TIPODOCUMENTODESC']);?>
 - <?php echo utf8_encode($_smarty_tpl->tpl_vars['Paga']->value['DOCUMENTO']);?>
</label>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<h4>Histórico</h4>
															<label><?php echo utf8_encode($_smarty_tpl->tpl_vars['Paga']->value['HISTORICO2']);?>
</label>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<h4>Unidade</h4>
															<label><?php echo utf8_encode($_smarty_tpl->tpl_vars['Paga']->value['UNIDADEDESC']);?>
</label>
														</div>
													</div>
													<div class="row">
														<div class="col-md-4">
															<h4>Valor Previsto</h4>
															<label>R$ <?php echo number_format($_smarty_tpl->tpl_vars['Paga']->value['VALORPREVISTO'],2,',','.');?>
</label>
														</div>
														<div class="col-md-4">
															<h4>Valor Real</h4>
															<label>R$ <?php echo number_format($_smarty_tpl->tpl_vars['Paga']->value['VALORREAL'],2,',','.');?>
</label>
														</div>
														<div class="col-md-4">
															<h4>Valor Imposto</h4>
															<label>R$ <?php echo number_format($_smarty_tpl->tpl_vars['Paga']->value['VALORIMPOSTO'],2,',','.');?>
</label>
														</div>
													</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
							<?php if ($_smarty_tpl->tpl_vars['Paga']->value['TIPOPLANOCONTA']=="D"){?>
								<?php if ($_smarty_tpl->tpl_vars['Paga']->value['STATUSLIQUIDACAO']!="T"){?><a href="/info/PagarReceber/validaPagamento/<?php echo $_smarty_tpl->tpl_vars['Paga']->value['MOVIMENTOID'];?>
" class="btn btn-sm btn-warning">Liquidar Pagamento</a><?php }?>
							<?php }else{ ?>
								<?php if ($_smarty_tpl->tpl_vars['Paga']->value['STATUSLIQUIDACAO']!="T"){?><a href="/info/PagarReceber/validaRecebimento/<?php echo $_smarty_tpl->tpl_vars['Paga']->value['MOVIMENTOID'];?>
" class="btn btn-sm btn-warning">Validar Recebimento</a><?php }?>
							<?php }?>
							<a href="/info/PagarReceber/pagarreceber_receber_edita/<?php echo $_smarty_tpl->tpl_vars['Paga']->value['MOVIMENTOID'];?>
" class="btn btn-sm btn-primary">Editar</a>
							<a href="/info/PagarReceber/pagarreceber_receber_exclui/<?php echo $_smarty_tpl->tpl_vars['Paga']->value['MOVIMENTOID'];?>
" class="btn btn-sm btn-danger">Excluir</a>
						  </div>
						</div>
					  </div>
					</div></td>

        </tr>
		<?php } ?>
    </table>
	
</div>
	
<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderBottomBody.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>