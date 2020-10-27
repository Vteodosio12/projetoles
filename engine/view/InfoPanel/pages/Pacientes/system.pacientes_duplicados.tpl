{include file="../../master/header2.tpl"}

{include file="../../master/renderTopBody2.tpl"}



<div class="alert alert-warning" role="alert">
	<div>
		Atenção, o paciente que você tentou cadastrar parece ser duplicado. Tem certeza que deseja criar um novo paciente com esses dados?
	</div>
	
	</br>
	
	<div>
		<form method="post" action="{$PATH}/info/pacientes/pacienteNovoDuplicado">
			<div class="helper-display-none">
				<input type="text" name="nomepaciente" class="form-control" value="{$nome}">
				<input type="text" name="datanasc" class="form-control" value="{$datanasc}">
				<input type="text" name="sexo" class="form-control" value="{$sexo}">
				<input type="text" name="estadocivil" class="form-control" value="{$estadocivil}">
				<input type="text" name="tipo" class="form-control" value="{$tipo}">
				<input type="text" name="documento" class="form-control" value="{$documento}">
				<input type="text" name="cep" class="form-control" value="{$cep}">
				<input type="text" name="endereco" class="form-control" value="{$endereco}">
				<input type="text" name="bairro" class="form-control" value="{$bairro}">
				<input type="text" name="cidade" class="form-control" value="{$cidade}">
				<input type="text" name="UF" class="form-control" value="{$UF}">
				<input type="text" name="email" class="form-control" value="{$email}">
				<input type="text" name="telefone" class="form-control" value="{$telefone}">
				<input type="text" name="celular" class="form-control" value="{$celular}">
				<input type="text" name="convenioid" class="form-control" value="{$convenioid}">
				<input type="text" name="carteirinha" class="form-control" value="{$carteirinha}">
				<input type="text" name="filhos" class="form-control" value="{$filhos}">
				<input type="text" name="cadeirante" class="form-control" value="{$cadeirante}">
				<input type="text" name="observacao" class="form-control" value="{$observacao}">
			</div>	

			<button type="submit" class="btn btn-default">Desejo criar um novo cadastro</button>
		</form>
		</br>
		<form method="post" action="{$PATH}/info/pacientes/pacienteDuplicadoAtualiza">
			<div class="helper-display-none">
				<input type="text" name="nomepaciente" class="form-control" value="{$nome}">
				<input type="text" name="datanasc" class="form-control" value="{$datanasc}">
				<input type="text" name="sexo" class="form-control" value="{$sexo}">
				<input type="text" name="estadocivil" class="form-control" value="{$estadocivil}">
				<input type="text" name="tipo" class="form-control" value="{$tipo}">
				<input type="text" name="documento" class="form-control" value="{$documento}">
				<input type="text" name="cep" class="form-control" value="{$cep}">
				<input type="text" name="endereco" class="form-control" value="{$endereco}">
				<input type="text" name="bairro" class="form-control" value="{$bairro}">
				<input type="text" name="cidade" class="form-control" value="{$cidade}">
				<input type="text" name="UF" class="form-control" value="{$UF}">
				<input type="text" name="email" class="form-control" value="{$email}">
				<input type="text" name="telefone" class="form-control" value="{$telefone}">
				<input type="text" name="celular" class="form-control" value="{$celular}">
				<input type="text" name="convenioid" class="form-control" value="{$convenioid}">
				<input type="text" name="carteirinha" class="form-control" value="{$carteirinha}">
				<input type="text" name="filhos" class="form-control" value="{$filhos}">
				<input type="text" name="cadeirante" class="form-control" value="{$cadeirante}">
				<input type="text" name="observacao" class="form-control" value="{$observacao}">
			</div>
			
			<button type="submit" class="btn btn-default">Atualizar informações no cadastro já existente</button>
		</form>
	</div>
</div>

	
{include file="../../master/renderBottomBody.tpl"}

{include file="../../master/footer.tpl"}