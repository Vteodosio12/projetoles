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
	
</head>
<body> 

{include file="../../master/renderTopBody2.tpl"}

{if $status == 1}<div class="alert alert-success" role="alert">Orçamento excluído com sucesso!</div>{/if}

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
        {foreach $Orcamentos as $Orcamento}
        <tr>
            <td>{$Orcamento.Id}</td>
            <td>{$Orcamento.NomePaciente}</td>
			<td>{$Orcamento.DataNasc|date_format:"%d/%m/%Y"}</td>
			<td>{$Orcamento.Data|date_format:"%d/%m/%Y"}</td>
			<td>R$ {$Orcamento.Valor}</td>
			<td><a href="/info/orcamento/editaOrcamento/{$Orcamento.Id}" class="btn btn-sm btn-primary">Editar/Visualizar</a></td>
			<td><a href="/info/orcamento/excluiOrcamento/{$Orcamento.Id}" class="btn btn-sm btn-danger">Excluir</a></td>
        </tr>
        {/foreach}
    </table>
</div>


{include file="../../master/renderBottomBody.tpl"}

{include file="../../master/footer.tpl"}