<?php /* Smarty version Smarty-3.1.13, created on 2020-10-27 19:20:58
         compiled from "engine\view\InfoPanel\pages\Pacientes\system.pacientes_edita.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33795cd00bf18c0f59-20415049%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d54956d9d0d5bf5af88e488f506add4737c393a' => 
    array (
      0 => 'engine\\view\\InfoPanel\\pages\\Pacientes\\system.pacientes_edita.tpl',
      1 => 1603837252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33795cd00bf18c0f59-20415049',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5cd00bf19bfec0_43342658',
  'variables' => 
  array (
    'Pacientes' => 0,
    'PATH' => 0,
    'Paciente' => 0,
    'Convenios' => 0,
    'Convenio' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cd00bf19bfec0_43342658')) {function content_5cd00bf19bfec0_43342658($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\sysmile\\engine\\libs\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("../../master/header2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderTopBody2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



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


<div class="step">
    <h1>Editar Paciente</h1>
	
	<?php  $_smarty_tpl->tpl_vars['Paciente'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Paciente']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Pacientes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Paciente']->key => $_smarty_tpl->tpl_vars['Paciente']->value){
$_smarty_tpl->tpl_vars['Paciente']->_loop = true;
?>
	<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['PATH']->value;?>
/info/pacientes/pacienteEdita">
	
		<div class="helper-display-none">
			<label>PacienteId</label>
			<input type="text" name="pacienteid" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['PacienteId'];?>
">
		</div>
	
		<label>Nome</label>
		<input type="text" name="nome" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['NomePaciente'];?>
">
		
		<label>Data de Nascimento</label>
		<input type="text" name="datanasc" id="data" class="form-control" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Paciente']->value['DataNasc'],"%d/%m/%Y");?>
">
		
		<label>Sexo</label>
		<select name="sexo" class="form-control">
			<option value="" disable selected>Selecionar</option>
			<option value="Masculino" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Sexo']=="Masculino"){?>selected<?php }?>>Masculino</option>
			<option value="Feminino" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Sexo']=="Feminino"){?>selected<?php }?>>Feminino</option>
		</select>
		
		<label>Estado Civil</label>
		<select name="estadocivil" class="form-control">
			<option value="" disable selected>Selecionar</option>
			<option value="Solteiro/a" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['EstadoCivil']=="Solteiro/a"){?>selected<?php }?>>Solteiro(a)</option>
			<option value="Separado/a" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['EstadoCivil']=="Separado/a"){?>selected<?php }?>>Separado(a)</option>
			<option value="Casado/a" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['EstadoCivil']=="Casado/a"){?>selected<?php }?>>Casado(a)</option>
			<option value="Viuvo/a" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['EstadoCivil']=="Viúvo/a"){?>selected<?php }?>>Viúvo(a)</option>
		</select>
		
		<label>Tipo do Documento</label>
		<select name="tipo" class="form-control">
			<option value="" disable selected>Selecionar</option>
			<option value="RG" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Tipo']=="RG"){?>selected<?php }?>>RG</option>
			<option value="CPF" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Tipo']=="CPF"){?>selected<?php }?>>CPF</option>
			<option value="RG Terceiros" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Tipo']=="RG Terceiros"){?>selected<?php }?>>RG Terceiros</option>
			<option value="CPF Terceiros" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Tipo']=="CPF Terceiros"){?>selected<?php }?>>CPF Terceiros</option>
		</select>
		
		<label>Numero do Documento</label>
		<input type="text" name="documento" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Documento'];?>
">
		
		<label>CEP</label>
		<input type="text" name="cep" id="cep" onblur="pesquisacep(this.value);" class="form-control" Value="<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['CEP'];?>
">
		
		<label>Endereço</label>
		<input type="text" name="endereco" id="Endereco" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Endereco'];?>
">
		
		<label>Bairro</label>
		<input type="text" name="bairro" id="Bairro" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Bairro'];?>
">
		
		<label>Cidade</label>
		<input type="text" name="cidade" id="Cidade" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Cidade'];?>
">
		
		<label>Estado</label>
		<select name="estado" id="estado" class="form-control">
			<option value="">Selecionar</option>
			<option value="AC" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="AC"){?>selected<?php }?>>AC</option>
			<option value="AL" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="AL"){?>selected<?php }?>>AL</option>
			<option value="AP" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="AP"){?>selected<?php }?>>AP</option>
			<option value="AM" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="AM"){?>selected<?php }?>>AM</option>
			<option value="BA" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="BA"){?>selected<?php }?>>BA</option>
			<option value="CE" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="CE"){?>selected<?php }?>>CE</option>
			<option value="DF" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="DF"){?>selected<?php }?>>DF</option>
			<option value="ES" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="ES"){?>selected<?php }?>>ES</option>
			<option value="GO" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="GO"){?>selected<?php }?>>GO</option>
			<option value="MA" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="MA"){?>selected<?php }?>>MA</option>
			<option value="MT" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="MT"){?>selected<?php }?>>MT</option>
			<option value="MS" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="MS"){?>selected<?php }?>>MS</option>
			<option value="MG" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="MG"){?>selected<?php }?>>MG</option>
			<option value="PA" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="PA"){?>selected<?php }?>>PA</option>
			<option value="PB" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="PB"){?>selected<?php }?>>PB</option>
			<option value="PE" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="PE"){?>selected<?php }?>>PE</option>
			<option value="PI" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="PI"){?>selected<?php }?>>PI</option>
			<option value="RJ" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="RJ"){?>selected<?php }?>>RJ</option>
			<option value="RN" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="RN"){?>selected<?php }?>>RN</option>
			<option value="RS" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="RS"){?>selected<?php }?>>RS</option>
			<option value="RO" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="RO"){?>selected<?php }?>>RO</option>
			<option value="RR" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="RR"){?>selected<?php }?>>RR</option>
			<option value="SC" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="SC"){?>selected<?php }?>>SC</option>
			<option value="SP" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="SP"){?>selected<?php }?>>SP</option>
			<option value="SE" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="SE"){?>selected<?php }?>>SE</option>
			<option value="TO" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Estado']=="TO"){?>selected<?php }?>>TO</option>
		</select>
		
		<label>Email</label>
		<input type="text" name="email" class="form-control" Value="<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Email'];?>
">
		
		<label>Telefone</label>
		<input type="text" name="telefone" id="telefone" class="form-control" Value="<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Telefone'];?>
">
		
		<label>Celular</label>
		<input type="text" name="celular" id="celular" class="form-control" Value="<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Celular'];?>
">
	
		<label>Convênio</label>
		<select name="convenioid" id="convenio" class="form-control">
			<option value="">Selecionar</option>
			<?php  $_smarty_tpl->tpl_vars['Convenio'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Convenio']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Convenios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Convenio']->key => $_smarty_tpl->tpl_vars['Convenio']->value){
$_smarty_tpl->tpl_vars['Convenio']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['Convenio']->value['ConvenioId'];?>
" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Convenio']==$_smarty_tpl->tpl_vars['Convenio']->value['ConvenioId']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['Convenio']->value['Descricao'];?>
</option>
			<?php } ?>
		</select>
		
		<label>Número da Carteirinha</label>
		<input type="text" name="carteirinha" id="carteirinha" class="form-control" Value="<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Carteirinha'];?>
">
		
		<label>Cadeirante?</label>
		<select name="cadeirante" class="form-control">
			<option value="Nao" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Cadeirante']=="Nao"){?>selected<?php }?>>Não</option>
			<option value="Sim" <?php if ($_smarty_tpl->tpl_vars['Paciente']->value['Cadeirante']=="Sim"){?>selected<?php }?>>Sim</option>
		</select>
		
		<label>Observação</label>
		<input type="text" name="observacao" class="form-control" Value="<?php echo $_smarty_tpl->tpl_vars['Paciente']->value['Observacao'];?>
">
		
		<br>
		<div>
			<button type="submit" class="btn btn-default">Salvar</button>
		</div>
		</form>
		<?php } ?>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("../../master/renderBottomBody.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("../../master/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>