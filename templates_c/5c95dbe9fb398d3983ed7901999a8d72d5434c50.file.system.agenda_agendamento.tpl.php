<?php /* Smarty version Smarty-3.1.13, created on 2019-06-27 00:42:08
         compiled from "engine\view\InfoPanel\pages\Agenda\system.agenda_agendamento.tpl" */ ?>
<?php /*%%SmartyHeaderCode:272055cd01812c04a33-32764160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c95dbe9fb398d3983ed7901999a8d72d5434c50' => 
    array (
      0 => 'engine\\view\\InfoPanel\\pages\\Agenda\\system.agenda_agendamento.tpl',
      1 => 1561603799,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '272055cd01812c04a33-32764160',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5cd01812c7fb86_90728201',
  'variables' => 
  array (
    'DadosPaciente' => 0,
    'Livros' => 0,
    'Horas' => 0,
    'Livro' => 0,
    'dia' => 0,
    'mes' => 0,
    'ano' => 0,
    'Hora' => 0,
    'PATH' => 0,
    'livroid' => 0,
    'horreqid' => 0,
    'DadoPaciente' => 0,
    'procedimentos' => 0,
    'procedimento' => 0,
    'convenios' => 0,
    'convenio' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cd01812c7fb86_90728201')) {function content_5cd01812c7fb86_90728201($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\engine\\libs\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("../../master/header2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderTopBody2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="step">
<?php  $_smarty_tpl->tpl_vars['DadoPaciente'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['DadoPaciente']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['DadosPaciente']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['DadoPaciente']->key => $_smarty_tpl->tpl_vars['DadoPaciente']->value){
$_smarty_tpl->tpl_vars['DadoPaciente']->_loop = true;
?><?php } ?>
<?php  $_smarty_tpl->tpl_vars['Livro'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Livro']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Livros']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Livro']->key => $_smarty_tpl->tpl_vars['Livro']->value){
$_smarty_tpl->tpl_vars['Livro']->_loop = true;
?><?php } ?>
<?php  $_smarty_tpl->tpl_vars['Hora'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Hora']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Horas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Hora']->key => $_smarty_tpl->tpl_vars['Hora']->value){
$_smarty_tpl->tpl_vars['Hora']->_loop = true;
?><?php } ?>

	<h1>Cadastro de Agendamento</h1>
	<h4><?php echo $_smarty_tpl->tpl_vars['Livro']->value['Descricao'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dia']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['mes']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['ano']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['Hora']->value['Hora'];?>
</h4>

	<form method="post" data-toggle="validator" action="<?php echo $_smarty_tpl->tpl_vars['PATH']->value;?>
/info/agenda/novoAgendamento">
		
        <div class="helper-display-none">
            <input type="text" name="livroid" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['livroid']->value;?>
">
            <input type="text" name="dia" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['dia']->value;?>
">
			<input type="text" name="mes" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['mes']->value;?>
">
			<input type="text" name="ano" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ano']->value;?>
">
			<input type="text" name="horreqid" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['horreqid']->value;?>
">
			<input type="text" name="PacienteId" class="form-control" id="PacienteId">
        </div>
	
		<div class="form-group">
			<label>Nome do Paciente</label>
			<input type="text" name="NomePaciente" id="nomepaciente" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['DadoPaciente']->value['NomePaciente'];?>
" data-error="Informe o nome do Paciente." required>
			<div class="help-block with-errors"></div>
		</div>
		
		<div class="form-group">
			<label>Data de Nascimento</label>
			<input type="text" name="DataNasc" id="data" class="form-control" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['DadoPaciente']->value['DataNasc'],"%d/%m/%Y");?>
" data-error="Informe a data de Nascimento do Paciente." required>
			<div class="help-block with-errors"></div>
		</div>
		
		<div class="form-group">
			<label>Telefone</label>
			<input type="text" name="Telefone" id="telefone" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['DadoPaciente']->value['Telefone'];?>
">
		</div>
		
		<div class="form-group">
			<label>Celular</label>
			<input type="text" name="Celular" id="celular" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['DadoPaciente']->value['Celular'];?>
">
		</div>
		
		<div class="form-group">
			<label>Procedimento</label>
			<span><select name="Procedimento" id="Procedimento" class="form-control" data-error="Informe o Procedimento a ser realizado." required>
				<option value="">Selecionar</option>
					<?php  $_smarty_tpl->tpl_vars['procedimento'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['procedimento']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['procedimentos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['procedimento']->key => $_smarty_tpl->tpl_vars['procedimento']->value){
$_smarty_tpl->tpl_vars['procedimento']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['procedimento']->value['ProcedimentoId'];?>
" <?php if ($_smarty_tpl->tpl_vars['procedimento']->value['ProcedimentoId']==$_smarty_tpl->tpl_vars['DadoPaciente']->value['Exame']||count($_smarty_tpl->tpl_vars['procedimentos']->value)==1){?>Selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['procedimento']->value['Descricao'];?>
</option>
					<?php } ?>
			</select>
			<div class="help-block with-errors"></div>	
		</div>
		
		<div id="Preparo"></div>
		<div class="form-group">	
			<div class="modal fade" id="imprimiAgenda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<div class="row">
								<div class="col-md-12">
									<h3>Preparo do Procedimento</h3>
								</div>
							</div>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<div id="TextoPreparo"></div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<label>Convênio</label>
			<select name="Convenio" class="form-control" id="Convenio" data-error="Informe o Convênio." required>
				<option value="">Selecionar</option>
					<?php  $_smarty_tpl->tpl_vars['convenio'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['convenio']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['convenios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['convenio']->key => $_smarty_tpl->tpl_vars['convenio']->value){
$_smarty_tpl->tpl_vars['convenio']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['convenio']->value['ConvenioId'];?>
" <?php if ($_smarty_tpl->tpl_vars['convenio']->value['ConvenioId']==$_smarty_tpl->tpl_vars['DadoPaciente']->value['Convenio']||count($_smarty_tpl->tpl_vars['convenios']->value)==1){?>Selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['convenio']->value['Descricao'];?>
</option>
					<?php } ?>
			</select>
			<div class="help-block with-errors"></div>
		</div>
		
		<div class="form-group">
			<label>Observações</label>
			<textarea name="Observacoes" id="Observacoes" class="form-control"><?php echo $_smarty_tpl->tpl_vars['DadoPaciente']->value['Observacoes'];?>
</textarea>
		</div>

		<div id="Teste">
			
		</div>
		
        <button type="submit" class="btn btn-default">Salvar</button>

    </form>		
</div>


<script>
  $( function() {
    var cache = {};
    $( "#nomepaciente" ).autocomplete({
      minLength: 3,
	  select: function( event, ui ) {
		 $( "#data" ).val( ui.item.datanasc );
		 $( "#telefone" ).val( ui.item.telefone );
		 $( "#celular" ).val( ui.item.celular );
		 if(ui.item.Convenio != ""){$( "#Convenio" ).append('<option value="' + ui.item.ConvenioId + '" selected>' + ui.item.Convenio + '</option>');}
		 $( "#PacienteId" ).val( ui.item.PacienteId);
		 if(ui.item.Agendamento1Livro != null){var teste = "<h3>Agendamentos Anteriores</h3>"}
		 if(ui.item.Agendamento1Livro != null){teste += "<table class='table table-hover table-stripped'><thead><tr><th>Livro</th><th>Data</th><th>Hora</th><th>Exame</th><th>Status</th></tr></thead>"}
		 if(ui.item.Agendamento1Livro != null){teste += "<tr><td>" + ui.item.Agendamento1Livro +"</td><td>" + ui.item.Agendamento1Data +"</td><td>" + ui.item.Agendamento1Hora +"</td><td>" + ui.item.Agendamento1Exame +"</td><td>" + ui.item.Agendamento1Status +"</td></tr>"}
		 if(ui.item.Agendamento2Livro != null){teste += "<tr><td>" + ui.item.Agendamento2Livro +"</td><td>" + ui.item.Agendamento2Data +"</td><td>" + ui.item.Agendamento2Hora +"</td><td>" + ui.item.Agendamento2Exame +"</td><td>" + ui.item.Agendamento2Status +"</td></tr>"}
		 if(ui.item.Agendamento3Livro != null){teste += "<tr><td>" + ui.item.Agendamento3Livro +"</td><td>" + ui.item.Agendamento3Data +"</td><td>" + ui.item.Agendamento3Hora +"</td><td>" + ui.item.Agendamento3Exame +"</td><td>" + ui.item.Agendamento3Status +"</td></tr>"}
		 if(ui.item.Agendamento4Livro != null){teste += "<tr><td>" + ui.item.Agendamento4Livro +"</td><td>" + ui.item.Agendamento4Data +"</td><td>" + ui.item.Agendamento4Hora +"</td><td>" + ui.item.Agendamento4Exame +"</td><td>" + ui.item.Agendamento4Status +"</td></tr>"}
		 if(ui.item.Agendamento5Livro != null){teste += "<tr><td>" + ui.item.Agendamento5Livro +"</td><td>" + ui.item.Agendamento5Data +"</td><td>" + ui.item.Agendamento5Hora +"</td><td>" + ui.item.Agendamento5Exame +"</td><td>" + ui.item.Agendamento5Status +"</td></tr>"}
		 if(ui.item.Agendamento1Livro != null){teste += "</table>"}
		 if(ui.item.Agendamento1Livro != null){$( "#Teste" ).html(teste);}else{$( "#Teste" ).html("");}
      },
      source: function( request, response ) {
        var term = request.term;
        if ( term in cache ) {
          response( cache[ term ] );
          return;
        }
 
		$.getJSON( "/info/agenda/getDadosPaciente",  {PesquisaPaciente : $('#nomepaciente').val(), LivroId : <?php echo $_smarty_tpl->tpl_vars['livroid']->value;?>
}, function( data, status, xhr ) {
          cache[ term ] = data;
          response( data );
        });
		
      }
    })
	.autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<div>" + item.label + "<br>" + item.datanasc + "</div>" )
        .appendTo( ul );
    };
  } );
  </script>



	<script language="javascript">
		document.getElementById('nomepaciente').focus();
	</script>




<script>
$(function() {
	$('#Procedimento').change(function(){
		$.getJSON('/info/agenda/getPreparo', {ProcedimentoId : $('#Procedimento').val()}, function(data) {
			$('#Preparo').html(" ");
			$.each(data, function(i, item) {
				if(item.PreparoOption == 1){
					$('#Preparo').html('<a data-toggle="modal" data-target="#imprimiAgenda" href="" data-dismiss="modal">Exame com necessidade de preparo. Clique aqui para visualizar.</a>');
				}
			});
			$('#TextoPreparo').html(" ");
			$.each(data, function(i, item) {
					$('#TextoPreparo').html('<label>'+item.TextoPreparo+'</label>');
			});
		});
	});
});
</script>



<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderBottomBody.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>