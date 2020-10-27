{include file="../../master/header2.tpl"}

{include file="../../master/renderTopBody2.tpl"}

{literal}
<script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('Endereco').value=("");
            document.getElementById('Bairro').value=("");
			document.getElementById('Cidade').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('Endereco').value=(conteudo.logradouro);
            document.getElementById('Bairro').value=(conteudo.bairro);
			document.getElementById('Cidade').value=(conteudo.localidade);
			document.getElementById('estado').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('Endereco').value="...";
                document.getElementById('Bairro').value="...";
				document.getElementById('Cidade').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
{/literal}

<div class="step">
    <h1>Editar Paciente</h1>
	
	{foreach $Pacientes as $Paciente}
	<form method="post" action="{$PATH}/info/pacientes/pacienteEdita">
	
		<div class="helper-display-none">
			<label>PacienteId</label>
			<input type="text" name="pacienteid" class="form-control" value="{$Paciente.PacienteId}">
		</div>
	
		<label>Nome</label>
		<input type="text" name="nome" class="form-control" value="{$Paciente.NomePaciente}">
		
		<label>Data de Nascimento</label>
		<input type="text" name="datanasc" id="data" class="form-control" value="">
		
		<label>Sexo</label>
		<select name="sexo" class="form-control">
			<option value="" disable selected>Selecionar</option>
			<option value="Masculino" {if $Paciente.Sexo == "Masculino"}selected{/if}>Masculino</option>
			<option value="Feminino" {if $Paciente.Sexo == "Feminino"}selected{/if}>Feminino</option>
		</select>
		
		<label>Estado Civil</label>
		<select name="estadocivil" class="form-control">
			<option value="" disable selected>Selecionar</option>
			<option value="Solteiro/a" {if $Paciente.EstadoCivil == "Solteiro/a"}selected{/if}>Solteiro(a)</option>
			<option value="Separado/a" {if $Paciente.EstadoCivil == "Separado/a"}selected{/if}>Separado(a)</option>
			<option value="Casado/a" {if $Paciente.EstadoCivil == "Casado/a"}selected{/if}>Casado(a)</option>
			<option value="Viuvo/a" {if $Paciente.EstadoCivil == "Viúvo/a"}selected{/if}>Viúvo(a)</option>
		</select>
		
		<label>Tipo do Documento</label>
		<select name="tipo" class="form-control">
			<option value="" disable selected>Selecionar</option>
			<option value="RG" {if $Paciente.Tipo == "RG"}selected{/if}>RG</option>
			<option value="CPF" {if $Paciente.Tipo == "CPF"}selected{/if}>CPF</option>
			<option value="RG Terceiros" {if $Paciente.Tipo == "RG Terceiros"}selected{/if}>RG Terceiros</option>
			<option value="CPF Terceiros" {if $Paciente.Tipo == "CPF Terceiros"}selected{/if}>CPF Terceiros</option>
		</select>
		
		<label>Numero do Documento</label>
		<input type="text" name="documento" class="form-control" value="{$Paciente.Documento}">
		
		<label>CEP</label>
		<input type="text" name="cep" id="cep" onblur="pesquisacep(this.value);" class="form-control" Value="{$Paciente.CEP}">
		
		<label>Endereço</label>
		<input type="text" name="endereco" id="Endereco" class="form-control" value="{$Paciente.Endereco}">
		
		<label>Bairro</label>
		<input type="text" name="bairro" id="Bairro" class="form-control" value="{$Paciente.Bairro}">
		
		<label>Cidade</label>
		<input type="text" name="cidade" id="Cidade" class="form-control" value="{$Paciente.Cidade}">
		
		<label>Estado</label>
		<select name="estado" id="estado" class="form-control">
			<option value="">Selecionar</option>
			<option value="AC" {IF $Paciente.Estado == "AC"}selected{/if}>AC</option>
			<option value="AL" {IF $Paciente.Estado == "AL"}selected{/if}>AL</option>
			<option value="AP" {IF $Paciente.Estado == "AP"}selected{/if}>AP</option>
			<option value="AM" {IF $Paciente.Estado == "AM"}selected{/if}>AM</option>
			<option value="BA" {IF $Paciente.Estado == "BA"}selected{/if}>BA</option>
			<option value="CE" {IF $Paciente.Estado == "CE"}selected{/if}>CE</option>
			<option value="DF" {IF $Paciente.Estado == "DF"}selected{/if}>DF</option>
			<option value="ES" {IF $Paciente.Estado == "ES"}selected{/if}>ES</option>
			<option value="GO" {IF $Paciente.Estado == "GO"}selected{/if}>GO</option>
			<option value="MA" {IF $Paciente.Estado == "MA"}selected{/if}>MA</option>
			<option value="MT" {IF $Paciente.Estado == "MT"}selected{/if}>MT</option>
			<option value="MS" {IF $Paciente.Estado == "MS"}selected{/if}>MS</option>
			<option value="MG" {IF $Paciente.Estado == "MG"}selected{/if}>MG</option>
			<option value="PA" {IF $Paciente.Estado == "PA"}selected{/if}>PA</option>
			<option value="PB" {IF $Paciente.Estado == "PB"}selected{/if}>PB</option>
			<option value="PE" {IF $Paciente.Estado == "PE"}selected{/if}>PE</option>
			<option value="PI" {IF $Paciente.Estado == "PI"}selected{/if}>PI</option>
			<option value="RJ" {IF $Paciente.Estado == "RJ"}selected{/if}>RJ</option>
			<option value="RN" {IF $Paciente.Estado == "RN"}selected{/if}>RN</option>
			<option value="RS" {IF $Paciente.Estado == "RS"}selected{/if}>RS</option>
			<option value="RO" {IF $Paciente.Estado == "RO"}selected{/if}>RO</option>
			<option value="RR" {IF $Paciente.Estado == "RR"}selected{/if}>RR</option>
			<option value="SC" {IF $Paciente.Estado == "SC"}selected{/if}>SC</option>
			<option value="SP" {IF $Paciente.Estado == "SP"}selected{/if}>SP</option>
			<option value="SE" {IF $Paciente.Estado == "SE"}selected{/if}>SE</option>
			<option value="TO" {IF $Paciente.Estado == "TO"}selected{/if}>TO</option>
		</select>
		
		<label>Email</label>
		<input type="text" name="email" class="form-control" Value="{$Paciente.Email}">
		
		<label>Telefone</label>
		<input type="text" name="telefone" id="telefone" class="form-control" Value="{$Paciente.Telefone}">
		
		<label>Celular</label>
		<input type="text" name="celular" id="celular" class="form-control" Value="{$Paciente.Celular}">
	
		<label>Convênio</label>
		<select name="convenioid" id="convenio" class="form-control">
			<option value="">Selecionar</option>
			{foreach $Convenios as $Convenio}
				<option value="{$Convenio.ConvenioId}" {IF $Paciente.Convenio == $Convenio.ConvenioId}selected{/if}>{$Convenio.Descricao}</option>
			{/foreach}
		</select>
		
		<label>Número da Carteirinha</label>
		<input type="text" name="carteirinha" id="carteirinha" class="form-control" Value="{$Paciente.Carteirinha}">
		
		<label>Cadeirante?</label>
		<select name="cadeirante" class="form-control">
			<option value="Nao" {IF $Paciente.Cadeirante == "Nao"}selected{/if}>Não</option>
			<option value="Sim" {IF $Paciente.Cadeirante == "Sim"}selected{/if}>Sim</option>
		</select>
		
		<label>Observação</label>
		<input type="text" name="observacao" class="form-control" Value="{$Paciente.Observacao}">
		
		<br>
		<div>
			<button type="submit" class="btn btn-default">Salvar</button>
		</div>
		</form>
		{/foreach}
</div>

{include file="../../master/renderBottomBody.tpl"}

{include file="../../master/footer.tpl"}