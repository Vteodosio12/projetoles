<?php

switch(url::GetUrl(2)) {
	default:
	case "pacientes":
		$status = url::GetURL(2);
		
		$query = $dbSite->query("SELECT a.PacienteId, a.NomePaciente, a.DataNasc
								FROM site_Pacientes a");
		$returnPacientes = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Pacientes"     => $returnPacientes,
        ));

		$tpl->assign("status", $status);
		
		$tpl->display("engine/view/InfoPanel/pages/Pacientes/system.pacientes.tpl");
    break;
	
	case "paciente_novo":
		$query = $dbSite->query("SELECT ConvenioId,Descricao
									FROM site_Agenda_Convenios");
		$returnConvenios = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Convenios"     => $returnConvenios,
        ));        
	
		$tpl->display("engine/view/InfoPanel/pages/Pacientes/system.pacientes_novo.tpl");
    break;
	
	case "pacienteNovo":
		if($_POST){
			$nome = corrigeaspas($_POST['nomepaciente']);
			$datanasc = $_POST['datanasc'];
			$sexo = $_POST['sexo'];
			$estadocivil = $_POST['estadocivil'];
			$tipo = $_POST['tipo'];
			$documento = corrigeaspas($_POST['documento']);
			$cep = $_POST['cep'];
			$endereco = corrigeaspas($_POST['endereco']);
			$bairro = corrigeaspas($_POST['bairro']);
			$cidade = corrigeaspas($_POST['cidade']);
			$estado = corrigeaspas($_POST['UF']);
			$email = corrigeaspas($_POST['email']);
			$telefone = $_POST['telefone'];
			$celular = $_POST['celular'];
			$convenioid = $_POST['convenioid'];
			$carteirinha = $_POST['carteirinha'];
			$cadeirante = $_POST['cadeirante'];
			$observacao = corrigeaspas($_POST['observacao']);
			
			//Verifica se já existe o paciente informado
			$countPacienteId = $mDbSiteCorpore->query("SELECT count(PacienteId) as conta FROM site_Pacientes WHERE NomePaciente = '".$nome."' And DataNasc = CONVERT(datetime,'".$datanasc."',103)");
			
			foreach($countPacienteId as $countPaciente){
			 $contapaciente = $countPaciente['conta'];
			}
			
			if($contapaciente >= 1){
				$getPacienteId = $mDbSiteCorpore->query("SELECT PACIENTEID FROM site_PACIENTES WHERE NomePaciente = '".$nome."' And DataNasc = CONVERT(datetime,'".$datanasc."',103)");
				foreach($getPacienteId as $getPacienteId) {$pacienteid = $getPacienteId['PACIENTEID'];}
				
				$tpl->assign("nome", $nome);
				$tpl->assign("datanasc", $datanasc);
				$tpl->assign("sexo", $sexo);
				$tpl->assign("estadocivil", $estadocivil);
				$tpl->assign("tipo", $tipo);
				$tpl->assign("documento", $documento);
				$tpl->assign("cep", $cep);
				$tpl->assign("endereco", $endereco);
				$tpl->assign("bairro", $bairro);
				$tpl->assign("cidade", $cidade);
				$tpl->assign("estado", $estado);
				$tpl->assign("email", $email);
				$tpl->assign("telefone", $telefone);
				$tpl->assign("celular", $celular);
				$tpl->assign("convenioid", $convenioid);
				$tpl->assign("carteirinha", $carteirinha);
				$tpl->assign("cadeirante", $cadeirante);
				$tpl->assign("observacao", $observacao);				
				
				$tpl->display("engine/view/InfoPanel/pages/Pacientes/system.pacientes_duplicados.tpl");
			}else{
				$query = $dbSite->query("INSERT INTO site_Pacientes (
									[NomePaciente]
									,[DataNasc]
									,[Telefone]
									,[Celular]
									,[Convenio]
									,[Empresa]
									,[Sexo]
									,[EstadoCivil]
									,[Tipo]
									,[Documento]
									,[CEP]
									,[Endereco]
									,[Bairro]
									,[Cidade]
									,[Estado]
									,[Email]
									,[Carteirinha]
									,[Cadeirante]
									,[Observacao]
									) VALUES (
									'".$nome."'
									,CONVERT(datetime,'".$datanasc."',103)
									,'".$telefone."'
									,'".$celular."'
									,'".$convenioid."'
									,'".$inf->login."'
									,'".$sexo."'
									,'".$estadocivil."'
									,'".$tipo."'
									,'".$documento."'
									,'".$cep."'
									,'".$endereco."'
									,'".$bairro."'
									,'".$cidade."'
									,'".$estado."'
									,'".$email."'
									,'".$carteirinha."'
									,'".$cadeirante."'
									,'".$observacao."'
									)");		
									
				$getPacienteId = $mDbSiteCorpore->query("SELECT max(PACIENTEID) as PACIENTEID FROM site_PACIENTES");
				foreach($getPacienteId as $getPacienteId) {$pacienteid = $getPacienteId['PACIENTEID'];}
			
				if($query){
					header("location: /info/pacientes/pacientes_ficha/".$pacienteid."/1");
				}else{
					echo json_encode(false);
				}
			}
		}
    break;
	
	case "pacienteNovoDuplicado":
		if($_POST){
			$nome = corrigeaspas($_POST['nomepaciente']);
			$datanasc = $_POST['datanasc'];
			$sexo = $_POST['sexo'];
			$estadocivil = $_POST['estadocivil'];
			$tipo = $_POST['tipo'];
			$documento = corrigeaspas($_POST['documento']);
			$cep = $_POST['cep'];
			$endereco = corrigeaspas($_POST['endereco']);
			$bairro = corrigeaspas($_POST['bairro']);
			$cidade = corrigeaspas($_POST['cidade']);
			$estado = corrigeaspas($_POST['UF']);
			$email = corrigeaspas($_POST['email']);
			$telefone = $_POST['telefone'];
			$celular = $_POST['celular'];
			$convenioid = $_POST['convenioid'];
			$carteirinha = $_POST['carteirinha'];
			$filhos = $_POST['filhos'];
			$cadeirante = $_POST['cadeirante'];
			$observacao = corrigeaspas($_POST['observacao']);
			
			$query = $dbSite->query("INSERT INTO site_Pacientes (
									[NomePaciente]
									,[DataNasc]
									,[Telefone]
									,[Celular]
									,[Convenio]
									,[Empresa]
									,[Sexo]
									,[EstadoCivil]
									,[Tipo]
									,[Documento]
									,[CEP]
									,[Endereco]
									,[Bairro]
									,[Cidade]
									,[Estado]
									,[Email]
									,[Carteirinha]
									,[Filhos]
									,[Cadeirante]
									,[Observacao]
									) VALUES (
									'".$nome."'
									,CONVERT(datetime,'".$datanasc."',103)
									,'".$telefone."'
									,'".$celular."'
									,'".$convenioid."'
									,'".$inf->login."'
									,'".$sexo."'
									,'".$estadocivil."'
									,'".$tipo."'
									,'".$documento."'
									,'".$cep."'
									,'".$endereco."'
									,'".$bairro."'
									,'".$cidade."'
									,'".$estado."'
									,'".$email."'
									,'".$carteirinha."'
									,'".$filhos."'
									,'".$cadeirante."'
									,'".$observacao."'
									)");		
									
			$getPacienteId = $mDbSiteCorpore->query("SELECT max(PACIENTEID) as PACIENTEID FROM site_PACIENTES WHERE Empresa='".$inf->login."'");
			foreach($getPacienteId as $getPacienteId) {$pacienteid = $getPacienteId['PACIENTEID'];}
			
			if($query){
				header("location: /info/pacientes/pacientes_ficha/".$pacienteid."/1");
			}else{
				echo json_encode(false);
			}
		}
    break;
	
	case "pacienteDuplicadoAtualiza":
		if($_POST){
			$nome = corrigeaspas($_POST['nomepaciente']);
			$datanasc = $_POST['datanasc'];
			$sexo = $_POST['sexo'];
			$estadocivil = $_POST['estadocivil'];
			$tipo = $_POST['tipo'];
			$documento = corrigeaspas($_POST['documento']);
			$cep = $_POST['cep'];
			$endereco = corrigeaspas($_POST['endereco']);
			$bairro = corrigeaspas($_POST['bairro']);
			$cidade = corrigeaspas($_POST['cidade']);
			$estado = corrigeaspas($_POST['UF']);
			$email = corrigeaspas($_POST['email']);
			$telefone = $_POST['telefone'];
			$celular = $_POST['celular'];
			$convenioid = $_POST['convenioid'];
			$carteirinha = $_POST['carteirinha'];
			$filhos = $_POST['filhos'];
			$cadeirante = $_POST['cadeirante'];
			$observacao = corrigeaspas($_POST['observacao']);
			
			$getPacienteId = $mDbSiteCorpore->query("SELECT PACIENTEID FROM site_PACIENTES WHERE Empresa='".$inf->login."' And NomePaciente = '".$nome."' And DataNasc = CONVERT(datetime,'".$datanasc."',103)");
			foreach($getPacienteId as $getPacienteId) {$pacienteid = $getPacienteId['PACIENTEID'];}
			
			$dados = "";
			if($telefone != ""){$dados .= ",Telefone			= '".$telefone."'";}
			if($celular != ""){$dados .= ",Celular			= '".$celular."'";}
			if($convenioid != ""){$dados .= ",Convenio			= '".$convenioid."'";}
			if($sexo != ""){$dados .= ",Sexo				= '".$sexo."'";}
			if($estadocivil != ""){$dados .= ",EstadoCivil		= '".$estadocivil."'";}
			if($tipo != ""){$dados .= ",Tipo				= '".$tipo."'";}
			if($documento != ""){$dados .= ",Documento			= '".$documento."'";}
			if($cep != ""){$dados .= ",CEP				= '".$cep."'";}
			if($endereco != ""){$dados .= ",Endereco			= '".$endereco."'";}
			if($bairro != ""){$dados .= ",Bairro				= '".$bairro."'";}
			if($cidade != ""){$dados .= ",Cidade				= '".$cidade."'";}
			if($estado != ""){$dados .= ",Estado				= '".$estado."'";}
			if($email != ""){$dados .= ",Email				= '".$email."'";}
			if($carteirinha != ""){$dados .= ",Carteirinha		= '".$carteirinha."'";}
			if($cadeirante != ""){$dados .= ",Cadeirante			= '".$cadeirante."'";}
			if($observacao != ""){$dados .= ",Observacao			= '".$observacao."'";}
			
			
			$query = $dbSite->query("update site_Pacientes set 
			 NomePaciente		= '".$nome."'
			".$dados."
			WHERE PACIENTEID	='".$pacienteid."'
			");		

			if($query){
				header("location: /info/pacientes/pacientes_ficha/".$pacienteid."/1");
			}else{
				echo json_encode(false);
			}
		}
    break;
	
	case "pacientes_ficha":
		$pacienteid = url::GetUrl(3);
		$status = url::GetUrl(4);
		
		$tpl->assign("status", $status);
		
		$query = $dbSite->query("SELECT a.* , b.Descricao
								FROM site_Pacientes a
								LEFT JOIN site_Agenda_Convenios b on a.Convenio = b.ConvenioId
								WHERE a.PacienteId='".$pacienteid."' order by a.NomePaciente");
		$returnPacientes = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Pacientes"     => $returnPacientes,
        ));
		
		$query = $dbSite->query("select a.Id, a.LivroId, a.Data, a.Hora, a.PacienteId, a.Exame, a.SessaoId,a.Observacoes,a.Status,a.Confirmado
								,b.Descricao as Livro
								,c.Descricao as Convenio
								,d.Descricao as Procedimento
								,b.Tipo as TipoLivro
								from site_Horarios a
								INNER JOIN site_Agenda_Livros b on a.LivroId = b.LivroId and b.CodigoEmpresa = '".$inf->login."'
								INNER JOIN site_Agenda_Convenios c on a.Convenio = c.ConvenioId and c.Empresa = '".$inf->login."'
								LEFT JOIN site_Agenda_Procedimentos d on a.Exame = d.ProcedimentoId
								WHERE a.PacienteId = '".$pacienteid."'
								ORDER BY a.Data");
		$returnAgendas = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Agendas"     => $returnAgendas,
        ));
		
		$tpl->display("engine/view/InfoPanel/pages/Pacientes/system.pacientes_ficha.tpl");
    break;
	
	case "pacientes_editar":
		$pacienteid = url::GetUrl(3);
		
		$query = $dbSite->query("SELECT * FROM site_Pacientes WHERE PacienteId='".$pacienteid."' order by NomePaciente");
		$returnPacientes = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Pacientes"     => $returnPacientes,
        ));
		
		$query = $dbSite->query("SELECT ConvenioId,Descricao
									FROM site_Agenda_Convenios ");
		$returnConvenios = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Convenios"     => $returnConvenios,
        ));        
		
		$tpl->display("engine/view/InfoPanel/pages/Pacientes/system.pacientes_edita.tpl");
    break;
	
	case "pacienteEdita":
		if($_POST){
			$pacienteid = $_POST['pacienteid'];
			$nome = corrigeaspas($_POST['nome']);
			$datanasc = $_POST['datanasc'];
			$sexo = $_POST['sexo'];
			$estadocivil = $_POST['estadocivil'];
			$tipo = $_POST['tipo'];
			$documento = corrigeaspas($_POST['documento']);
			$cep = $_POST['cep'];
			$endereco = corrigeaspas($_POST['endereco']);
			$bairro = corrigeaspas($_POST['bairro']);
			$cidade = corrigeaspas($_POST['cidade']);
			$estado = corrigeaspas($_POST['UF']);
			$email = corrigeaspas($_POST['email']);
			$telefone = $_POST['telefone'];
			$celular = $_POST['celular'];
			$convenioid = $_POST['convenioid'];
			$carteirinha = $_POST['carteirinha'];
			$cadeirante = $_POST['cadeirante'];
			$observacao = corrigeaspas($_POST['observacao']);
        
            $query = $dbSite->query("update site_Pacientes set 
			 NomePaciente		= '".$nome."'
			,DataNasc			= CONVERT(datetime,'".$datanasc."',103)
			,Telefone			= '".$telefone."'
			,Celular			= '".$celular."'
			,Convenio			= '".$convenioid."'
			,Empresa			= '".$inf->login."'
			,Sexo				= '".$sexo."'
			,EstadoCivil		= '".$estadocivil."'
			,Tipo				= '".$tipo."'
			,Documento			= '".$documento."'
			,CEP				= '".$cep."'
			,Endereco			= '".$endereco."'
			,Bairro				= '".$bairro."'
			,Cidade				= '".$cidade."' 
			,Estado				= '".$estado."'
			,Email				= '".$email."'
			,Carteirinha		= '".$carteirinha."'
			,Cadeirante			= '".$cadeirante."'
			,Observacao			= '".$observacao."'
			WHERE PACIENTEID	='".$pacienteid."'
			");		
			
			if($query){
				header("location: /info/pacientes/pacientes_ficha/".$pacienteid."/2");
			}else{
				echo json_encode(false);
			}
		}
    break;
	
	case "pacientes_novo_agendamento":
		$pacienteid = url::GetUrl(3);
		
		$getConvenioId = $mDbSiteCorpore->query("SELECT Convenio FROM site_Pacientes WHERE PacienteId = '".$pacienteid."'");
		  foreach($getConvenioId as $ConvenioId){
			  $convenioid = $ConvenioId['Convenio'];
		  }
		  
		  
		$query = $dbSite->query("INSERT INTO site_Horarios (
								   [LivroId]
								  ,[Data]
								  ,[Hora]
								  ,[PacienteId]
								  ,[Exame]
								  ,[Convenio]
								  ,[Observacoes]
								  ,[Status]
								  ,[Confirmado]
								  ) VALUES (
								  NULL
								  ,'01/01/1970'
								  ,'00:00'
								  ,'".$pacienteid."'
								  ,NULL
								  ,'".$convenioid."'
								  ,NULL
								  ,'1'
								  ,'0')");
		
		
		$getHorreqId = $mDbSiteCorpore->query("SELECT Top 1 Id FROM site_horarios WHERE PacienteId = '".$pacienteid."' ORDER BY Id desc");
		  foreach($getHorreqId as $HorreqId){
			  $horreqid = $HorreqId['Id'];
		  }
		  
		$getLivroId = $mDbSiteCorpore->query("SELECT Top 1 LivroId FROM site_Agenda_Livros WHERE CodigoEmpresa = '".$inf->login."' ORDER BY Descricao");
		  foreach($getLivroId as $LivroId){
			  $livroid = $LivroId['LivroId'];
		  }
		  
		  $dia = date(d);
		  $mes = date(m);
		  $ano = date(o);
						  
		  header("location: /info/agenda/".$dia."/".$mes."/".$ano."/".$livroid."/7/".$horreqid."");
	break;
	
	case "cancelar_agendamento":
		$pacienteid = url::GetUrl(3);
		$horreqid = url::GetUrl(4);
		
		$query = $dbSite->query("UPDATE site_Horarios SET PacienteId =NULL,Exame=NULL,Convenio=NULL,Status=NULL, Observacoes=NULL, Confirmado=NULL WHERE Id='".$horreqid."'");
		$query = $dbSite->query("UPDATE site_CCM_FILA SET HORREQID =NULL WHERE HORREQID='".$horreqid."'");
		
		header("location: /info/pacientes/pacientes_ficha/".$pacienteid."/5");
	break;
	
	case "duplicar_agendamento":
		$pacienteid = url::GetUrl(3);
		$horreqid = url::GetUrl(4);
		
		$getLivroId = $mDbSiteCorpore->query("SELECT Top 1 LivroId FROM site_Agenda_Livros WHERE CodigoEmpresa = '".$inf->login."' ORDER BY Descricao");
		  foreach($getLivroId as $LivroId){
			  $livroid = $LivroId['LivroId'];
		  }
		  
		  $dia = date(d);
		  $mes = date(m);
		  $ano = date(o);
		
		header("location: /info/agenda/".$dia."/".$mes."/".$ano."/".$livroid."/1/".$horreqid."");
	break;
	
	case "transferir_agendamento":
		$pacienteid = url::GetUrl(3);
		$horreqid = url::GetUrl(4);
		
		$getLivroId = $mDbSiteCorpore->query("SELECT Top 1 LivroId FROM site_Agenda_Livros WHERE CodigoEmpresa = '".$inf->login."' ORDER BY Descricao");
		  foreach($getLivroId as $LivroId){
			  $livroid = $LivroId['LivroId'];
		  }
		  
		  $dia = date(d);
		  $mes = date(m);
		  $ano = date(o);
		
		header("location: /info/agenda/".$dia."/".$mes."/".$ano."/".$livroid."/2/".$horreqid."");
	break;
	
	case "paciente_excluir":
		$pacienteid = url::GetUrl(3);
		
		$getAgendamentos = $mDbSiteCorpore->query("SELECT count(*) as conta FROM site_Horarios WHERE PacienteId = '".$pacienteid."' and LivroId <> ''");
		  foreach($getAgendamentos as $getAgendamento){
			  $Agendamentos = $getAgendamento['conta'];
		  }
		  
		  if($Agendamentos != 0){
			header("location: /info/pacientes/2");
		}else{
			$query = $dbSite->query("DELETE FROM site_Pacientes WHERE PacienteId='".$pacienteid."'");
			header("location: /info/pacientes/1/1");
		}
		  
	break;
	
	case "pacientes_imprimir":
		$pacienteid = url::GetURL(3);
		
		$getDadosPacientes = $mDbSiteCorpore->query("select a.NomePaciente, Day(a.DataNasc) as Dia, Month(a.DataNasc) as Mes, Year(a.DataNasc) as Ano,
													a.Endereco, a.Bairro, a.Cidade, a.Telefone, a.Celular, a.Carteirinha, a.Observacao,
													b.Descricao as Convenio, a.EstadoCivil, a.Filhos
													FROM site_PACIENTES a
													left Join site_Agenda_Convenios b on a.Convenio = b.ConvenioId
													where PacienteId='".$pacienteid."'");
													
		foreach($getDadosPacientes as $getDadosPaciente) {
				$nome = $getDadosPaciente['NomePaciente'];
				$dia = $getDadosPaciente['Dia'];
				$mes = $getDadosPaciente['Mes'];
				$ano = $getDadosPaciente['Ano'];
				$idade = idade($ano."/".$mes."/".$dia);
				$endereco = $getDadosPaciente['Endereco'];
				$bairro = $getDadosPaciente['Bairro'];
				$cidade = $getDadosPaciente['Cidade'];
				$telefone = $getDadosPaciente['Telefone'];
				$celular = $getDadosPaciente['Celular'];
				$convenio = $getDadosPaciente['Convenio'];
				$carteirinha = $getDadosPaciente['Carteirinha'];
				$estadocivil = $getDadosPaciente['EstadoCivil'];
				if($inf->login == "MARTINS RAMOS"){$filhos = "Quant. Filhos: ".$getDadosPaciente['Filhos'];}
				$observacao = $getDadosPaciente['Observacao'];
		}
		
		$header = '
				<table border="0" width="886" height="96" cellspacing="0" cellpadding="0">
					<tr>
						<td height="17" width="786" colspan="3">
						<center><font size="7"><b>Ficha Paciente</b></font></center></td>
					</tr>
					<tr>
						<td height="15" width="508" style="border-top-style: solid; border-top-width: 1px;" bordercolor="#000000"><font size="5">Nome: '.$nome.'</font></td>
						<td height="15" width="232" style="border-top-style: solid; border-top-width: 1px;" bordercolor="#000000"><font size="5">Data Nasc.: '.$dia.'/'.$mes.'/'.$ano.'</font></td>
						<td height="15" width="146" style="border-top-style: solid; border-top-width: 1px;" bordercolor="#000000"><font size="5">Idade: '.$idade.'</font></td>
					</tr>
					<tr>
						<td height="16" width="886" colspan="3"><font size="5">Endereço: '.$endereco.', Bairro: '.$bairro.', Cidade: '.$cidade.'</font></td>
					</tr>
					<tr>
						<td height="16" width="508"><font size="5">Telefone: '.$telefone.'/'.$celular.'</font></td>
						<td height="16" width="232"><font size="5">Estado Civil: '.$estadocivil.'</font></td>
						<td height="15" width="146"><font size="5">'.$filhos.'</font></td>
					</tr>
					<tr>
						<td height="16" width="508"><font size="5">Convenio: '.$convenio.'</font></td>
						<td height="16" width="378" colspan="2"><font size="5">Nº Carteirinha: '.$carteirinha.'</font></td>
					</tr>
					<tr>
						<td height="16" width="886" colspan="3" style="border-bottom-style: solid; border-bottom-width: 1px" bordercolor="#000000"><font size="5">Observações: '.$observacao.'</font></td>
					</tr>
				</table>
			';
			
			
			
			
			//==============================================================
			//==============================================================
			//==============================================================

			include("C:/Xampp/htdocs/sysmile/engine/libs/mpdf60/mpdf.php");
			
			$mpdf=new mPDF('c','A4','','',5,5,32,5,10,10); 
			
			$mpdf->SetHTMLHeader($header);
			
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;

			//==============================================================
			//==============================================================
			//==============================================================
	break;
}
function corrigeaspas($texto)
	{
		
		$texto = strtoupper(str_replace("Ã", "A", $texto));
		$texto = str_replace("À", "A", $texto);
		$texto = str_replace("Á", "A", $texto);
		$texto = str_replace("Â", "A", $texto);
		$texto = str_replace("Ã", "A", $texto);
		$texto = str_replace("É", "E", $texto);
		$texto = str_replace("È", "E", $texto);
		$texto = str_replace("Ê", "E", $texto);
		$texto = str_replace("Í", "I", $texto);
		$texto = str_replace("Ì", "I", $texto);
		$texto = str_replace("Ó", "O", $texto);
		$texto = str_replace("Ò", "O", $texto);
		$texto = str_replace("Õ", "O", $texto);
		$texto = str_replace("Ô", "O", $texto);
		$texto = str_replace("Ù", "U", $texto);
		$texto = str_replace("Ú", "U", $texto);
		$texto = str_replace("Ç", "C", $texto);
		$texto = str_replace("à", "A", $texto);
		$texto = str_replace("á", "A", $texto);
		$texto = str_replace("â", "A", $texto);
		$texto = str_replace("ã", "A", $texto);
		$texto = str_replace("é", "E", $texto);
		$texto = str_replace("è", "E", $texto);
		$texto = str_replace("ê", "E", $texto);
		$texto = str_replace("í", "I", $texto);
		$texto = str_replace("ì", "I", $texto);
		$texto = str_replace("ó", "O", $texto);
		$texto = str_replace("ò", "O", $texto);
		$texto = str_replace("õ", "O", $texto);
		$texto = str_replace("ô", "O", $texto);
		$texto = str_replace("ù", "U", $texto);
		$texto = str_replace("ú", "U", $texto);
		$texto = str_replace("ç", "C", $texto);
		$texto = str_replace("'", "", $texto);
		return $texto;
	}

function idade($DataNasc)
	{
		list($ano, $mes, $dia) = explode('/', $DataNasc);
		if($mes == NULL AND $dia == NULL){list($ano, $mes, $dia) = explode('-', $DataNasc);}
		
		$idade = date('Y')-$ano;
		
		if(date('m') < $mes)
		{
			$idade = $idade-1;
		}elseif(date('m') > $mes)
		{
			$idade = $idade;
		}else
		{
			
			if(date('d') < $dia)
			{
				$idade = $idade - 1;
			}
		}
		return $idade;
	}
?>