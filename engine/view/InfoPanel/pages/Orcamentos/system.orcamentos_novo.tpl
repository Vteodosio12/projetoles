<!DOCTYPE HTML>
<html>
<head>
    <title>Painel Administrativo</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
	<link rel="stylesheet" href="/styles/css/loading-bar.css">
	
    <link rel="stylesheet" href="/styles/bootstrap/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="/styles/css/medicPanel.css">
	
	
	<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<script type="text/javascript" src="/styles/js/uploader/jquery.liteuploader.min.js"></script>
	<script src="/styles/js/validator.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
	<link rel="stylesheet" href="/styles/css/jquery-ui.css">
	
		
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<style>
		.ui-autocomplete-loading {
			background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat;
		}
		</style>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

{include file="../../master/renderTopBody2.tpl"}

{foreach $DadosPaciente as $DadoPaciente}{/foreach}

<div class="step">

	<h1>Cadastro de Orçamentos</h1>

	<form method="post" data-toggle="validator" action="{$PATH}/info/orcamento/novoOrcamento">
		
        <div class="helper-display-none">
			<input type="text" name="PacienteId" class="form-control" id="PacienteId" value="{$DadoPaciente.PacienteId}">
			<input type="text" name="OrcamentoId" class="form-control" id="OrcamentoId" value="{$orcamentoid}">
        </div>
	
		<div class="form-group">
			<label>Nome do Paciente</label>
			<input type="text" name="NomePaciente" id="nomepaciente" class="form-control" value="{$DadoPaciente.NomePaciente}" data-error="Informe o nome do Paciente." required>
			<div class="help-block with-errors"></div>
		</div>
		
		<div class="form-group">
			<label>Data de Nascimento</label>
			<input type="text" name="DataNasc" id="data" class="form-control" value="{$DadoPaciente.DataNasc|date_format:"%d/%m/%Y"}" data-error="Informe a data de Nascimento do Paciente." required>
			<div class="help-block with-errors"></div>
		</div>
		
		<div class="form-group">
			<label>Telefone</label>
			<input type="text" name="Telefone" id="telefone" class="form-control" value="{$DadoPaciente.Telefone}">
		</div>
		
		<div class="form-group">
			<label>Celular</label>
			<input type="text" name="Celular" id="celular" class="form-control" value="{$DadoPaciente.Celular}">
		</div>
		
		<div class="form-group">
			<label>Procedimentos</label>
			
			<div class="row">
				{foreach $procedimentos as $proc}
						<div class="col-md-6">
							<label><input type="checkbox" name="option[{$proc.ProcedimentoId}]" value="{$proc.ProcedimentoId}" {foreach $procedimentosorcados as $ord}{if $ord.ProcedimentoId ==$proc.ProcedimentoId}checked{/if}{/foreach}> {$proc.Descricao}</label>
						</div>
				{/foreach}
			</div>
		</div>
		
		<div class="form-group">
			<label>Valor</label>
			<input type="text" name="Valor" id="valor" class="form-control" value="{$DadoPaciente.Valor}">
		</div>
		
        <button type="submit" class="btn btn-default">Salvar</button>

    </form>		
</div>

{literal}
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
		 $( "#PacienteId" ).val( ui.item.PacienteId)
      },
      source: function( request, response ) {
        var term = request.term;
        if ( term in cache ) {
          response( cache[ term ] );
          return;
        }
 
		$.getJSON( "/info/orcamento/getDadosPaciente",  {PesquisaPaciente : $('#nomepaciente').val()}, function( data, status, xhr ) {
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
{/literal}

{literal}
	<script language="javascript">
		document.getElementById('nomepaciente').focus();
	</script>

	<script>
		$(function() {
			$('#valor').maskMoney();
		})
	</script>
{/literal}

{include file="../../master/renderBottomBody.tpl"}

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" />

<script src="/styles/js/jquery.js"></script> 
<script src="/styles/js/jquery-ui.js"></script> 
<script src="/styles/js/jquery.maskedinput.min.js"></script> 
<script src="/styles/js/jquery.maskMoney.js"></script> 
<script src="/styles/bootstrap/js/bootstrap.js"></script>
<script src="/styles/bootstrap/js/typeahead.min.js"></script>
<script type="text/javascript" src="/styles/js/jquery.validate.min.js"></script>
<script src="/styles/js/core.medic.cti.js"></script>
<script src="/styles/js/Chart.js"></script>
<script src="/styles/js/c3.js"></script>
<script src="https://d3js.org/d3.v3.min.js"></script>
<script type="text/javascript" src="/styles/js/bootstrap-slider.js"></script>

<script type="text/javascript" src="/styles/js/info/moment.js"></script>
<script type="text/javascript" src="/styles/js/angularjs/angular.min.js"></script>
<script type="text/javascript" src="/styles/js/angularjs/angular-pt-br.js"></script>
<script type="text/javascript" src="/styles/js/loading-bar.js"></script>


<script src="/styles/js/core.info.js"></script>
<script type="text/javascript" src="/styles/js/info/services.js"></script>
<script type="text/javascript" src="/styles/js/info/core.js"></script>




</body>
</html>