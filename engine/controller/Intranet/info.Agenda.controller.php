<?php

switch(url::GetUrl(2)) {
	default:
	case "agenda":
		$dia = url::GetURL(2);
		$mes = url::GetURL(3);
		$ano = url::GetURL(4);
		$livroid = url::GetURL(5);
	
		if ($dia == NULL){$getData = $mDbSiteCorpore->query("select DAY(GETDATE()) AS DIA, MONTH(GETDATE()) AS MES, YEAR(GETDATE()) AS ANO");
						  foreach($getData as $getD){
							  $dia = $getD['DIA'];
							  $mes = $getD['MES'];
							  $ano = $getD['ANO'];
						  }
						  
						  //$dia = date(d);
						  //$mes = date(m);
						  //$ano = date(o);
						  $getLivroId = $mDbSiteCorpore->query("SELECT Top 1 LivroId FROM site_Agenda_Livros ORDER BY Descricao");
						  foreach($getLivroId as $getLivro){
							  $livroid = $getLivro['LivroId'];
						  }
						  }
		$query = $dbSite->query("SELECT A.LivroId, A.Descricao
								FROM site_Agenda_Livros A
								ORDER BY A.Descricao");
        $returnLivros = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Livros"     => $returnLivros,
        ));
		
		$atual = $ano."-".$mes."-".$dia;
		$tpl->assign("dia", $dia);
		$tpl->assign("mes", $mes);
		$tpl->assign("ano", $ano);
		$tpl->assign("atual", $atual);
		$tpl->assign("livroid", $livroid);
		
		$query = $dbSite->query("SELECT a.Id, a.Data, a.Hora, a.PacienteId, d.NomePaciente, d.DataNasc, d.Telefone, d.Celular,
								f.Descricao as Exame, e.Descricao as Convenio, a.Status, b.Descricao, a.Observacoes, a.LivroId
								FROM site_Horarios a
								INNER JOIN site_Agenda_Livros b on a.LivroId = b.LivroId
								full join site_Pacientes d on a.PacienteId = d.PacienteId
								left join site_Agenda_Convenios e on a.Convenio = e.ConvenioId
								left join site_Agenda_Procedimentos f on a.Exame = f.ProcedimentoId
								where a.LivroId='".$livroid."' and a.Data=CONVERT(datetime,'".$dia."-".$mes."-".$ano."',103) 
								ORDER BY a.Hora ASC");
        $returnHorarios = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Horarios"     => $returnHorarios,
        ));
		
		
		$ArrayYears = array();
		$AnoInicial = 2019;
		
		while ($AnoInicial <= 2021) {
			$ArrayYears[] = $AnoInicial;
			$AnoInicial = $AnoInicial + 1;
		}
		
		$tpl->assign(array(
            "Anos"     => $ArrayYears,
        ));
		
		
		$tpl->display("engine/view/InfoPanel/pages/Agenda/system.agenda.tpl");
	break;
	
	case "agenda_ir":
		$dia = url::GetURL(3);
		$mes = url::GetURL(4);
		$ano = url::GetURL(5);
		$livroid = $_POST['livroid'];
		
		header("location: /info/agenda/".$dia."/".$mes."/".$ano."/".$livroid."");
	break;

	case "agendar":
		$horreqid = url::GetURL(3);
		$dia = url::GetURL(4);
		$mes = url::GetURL(5);
		$ano = url::GetURL(6);
		$livroid = url::GetURL(7);

		$tpl->assign("horreqid", $horreqid);
		$tpl->assign("dia", $dia);
		$tpl->assign("mes", $mes);
		$tpl->assign("ano", $ano);
		$tpl->assign("livroid", $livroid);
		
		$query = $dbSite->query("SELECT Descricao FROM site_Agenda_Livros WHERE LivroId='".$livroid."'");
        $returnLivros = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Livros"     => $returnLivros,
        ));
		
		$query = $dbSite->query("SELECT Hora FROM site_Horarios WHERE Id='".$horreqid."'");
        $returnHoras = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Horas"     => $returnHoras,
        ));
		
		$query = $dbSite->query("SELECT ProcedimentoId, Descricao
								FROM site_Agenda_Procedimentos
								ORDER BY Descricao");
        $returnprocedimentos = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "procedimentos"     => $returnprocedimentos,
        ));
		
		$query = $dbSite->query("SELECT a.Id, a.LivroId, a.ConvenioId, b.Descricao 
								FROM site_Agenda_Livros_Convenios a
								INNER JOIN site_Agenda_Convenios b on a.ConvenioId = b.ConvenioId
								WHERE a.LivroId='".$livroid."' ORDER BY Descricao");
        $returnconvenios = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "convenios"     => $returnconvenios,
        ));
		
		$tpl->display("engine/view/InfoPanel/pages/Agenda/system.agenda_agendamento.tpl");
	break;

	case 'getDadosPaciente':
		header('Content-Type: application/json');
		
		$Nome = trim($_GET['PesquisaPaciente']);
		
		$query = $dbSite->query("SELECT Top 5 PacienteId, NomePaciente, day(DataNasc) as dia, month(DataNasc) as mes, year(DataNasc) as ano,
								Telefone, Celular, Convenio
								FROM site_Pacientes 
								where NomePaciente like '".$Nome."%'
								order by NomePaciente");
		$return = $dbSite->fetch_array();
		
		foreach($return as $row) {
			$ConvenioId = "";
			$Convenio = "";
			
			$livrotipo = $mDbSiteCorpore->get("site_Agenda_Livros",'Tipo', ['LivroId' => $_GET['LivroId']]);
			
			$query = $dbSite->query("SELECT a.Convenio, c.Descricao
								FROM site_Pacientes a 
								inner join site_Agenda_Convenios c on a.Convenio = c.ConvenioId
								where a.PacienteId = '".$row['PacienteId']."'
								and a.Convenio IN (SELECT b.ConvenioId FROM site_Agenda_Livros_Convenios b WHERE b.LivroId='".$_GET['LivroId']."')");
			$returnConvenios = $dbSite->fetch_array();
			
			if(count($returnConvenios) != 0){
				foreach($returnConvenios as $returnConvenio) {
					$ConvenioId = $returnConvenio['Convenio'];
					$Convenio = $returnConvenio['Descricao'];
				}
			}
			
			if($row['dia'] < 10){$dia = '0'.$row['dia'];}else{$dia = $row['dia'];}
			if($row['mes'] < 10){$mes = '0'.$row['mes'];}else{$mes = $row['mes'];}
            $retorno[] = array(
                "id"    => '01/01/1999',
                "value"  => $row['NomePaciente'],
				"datanasc"  => $dia.'/'.$mes.'/'.$row['ano'],
				"telefone" => $row['Telefone'],
				"celular" => $row['Celular'],
				"ConvenioId" => $ConvenioId,
				"Convenio" => $Convenio,
				"PacienteId"=> $row['PacienteId']
            );
        }

		echo json_encode($retorno);
	break;

	case "novoAgendamento":
		if($_POST){
			$horreqid = $_POST['horreqid'];
			$dia = $_POST['dia'];
			$mes = $_POST['mes'];
			$ano = $_POST['ano'];
			$livroid = $_POST['livroid'];
			
			$NomePaciente = tiracaracterespecial(trim(strtoupper($_POST['NomePaciente'])));
			$DataNasc = $_POST['DataNasc'];
			$Telefone = $_POST['Telefone'];
			$Celular = $_POST['Celular'];
			$Procedimento = $_POST['Procedimento'];
			$Convenio = $_POST['Convenio'];
			$Observacoes = corrigeaspas($_POST['Observacoes']);		
			$PacienteId = $_POST['PacienteId'];

			if($PacienteId == ""){
				$query = $dbSite->query("INSERT INTO site_Pacientes 
										(NomePaciente,
										DataNasc,
										Telefone,
										Celular,
										Convenio)
										VALUES
										('".$NomePaciente."',
										CONVERT(datetime,'".$DataNasc."',103),
										'".$Telefone."',
										'".$Celular."',
										'".$Convenio."')");
			}else{
				$query = $dbSite->query("UPDATE site_Pacientes SET
										NomePaciente = '".$NomePaciente."'
										DataNasc = CONVERT(datetime,'".$DataNasc."',103),
										Telefone = '".$Telefone."',
										Celular = '".$Celular."',
										Convenio = '".$Convenio."'
										WHERE PacienteId = '".$PacienteId."' ");
			}

			$getPacientes2 = $mDbSiteCorpore->query("SELECT Top 1 PacienteId, count(PacienteId) as conta from site_Pacientes where NomePaciente='".$NomePaciente."' and DataNasc=CONVERT(datetime,'".$DataNasc."',103) group by PacienteId");
			foreach($getPacientes2 as $getPaciente2) {
				$PacienteId = $getPaciente2['PacienteId'];
			}
			
			
			//Verifica se é agendamento ou edição
			$getAgendamentoStatus = $mDbSiteCorpore->get("site_Horarios",'Status', ['Id' => $horreqid]);
			
			$query = $dbSite->query("UPDATE site_Horarios SET PacienteId='".$PacienteId."',
			Exame='".$Procedimento."',Convenio='".$Convenio."',Status='1',
			Observacoes='".$Observacoes."'  WHERE Id='".$horreqid."'");		
			
			header("location: /info/agenda/".$dia."/".$mes."/".$ano."/".$livroid);
		}else{
			header("location: /home");
		}
	break;
		
	case "cancelar":
		$horreqid = url::GetURL(3);
		$dia = url::GetURL(4);
		$mes = url::GetURL(5);
		$ano = url::GetURL(6);
		$livroid = url::GetURL(7);
		
		//Pega informações do paciente e do agendamento
		$getDados = $mDbSiteCorpore->get("site_Horarios",['PacienteId', 'LivroId', 'Data', 'Hora', 'Exame', 'SessaoId'], ['Id' => $horreqid]);
		//Altera status do horário para livre
		$query = $dbSite->query("UPDATE site_Horarios SET PacienteId =NULL,Exame=NULL,Convenio=NULL,Status=NULL, Observacoes=NULL WHERE Id='".$horreqid."'");
		//Retorna para página anterior
		echo "<script language='javascript'>history.go(-1)</script>";
	break;

	case "editahorario":
		$horreqid = url::GetURL(3);
		$dia = url::GetURL(4);
		$mes = url::GetURL(5);
		$ano = url::GetURL(6);
		$livroid = url::GetURL(7);
		
		$tpl->assign("horreqid", $horreqid);
		$tpl->assign("dia", $dia);
		$tpl->assign("mes", $mes);
		$tpl->assign("ano", $ano);
		$tpl->assign("livroid", $livroid);
		
		$query = $dbSite->query("select a.Id,a.LivroId,a.Data,a.Hora,
								b.NomePaciente,b.DataNasc,b.Telefone,b.Celular,
								a.Exame,a.Convenio,a.Observacoes,a.Status, a.PacienteId
								FROM site_Horarios a
								INNER JOIN site_Pacientes b on a.PacienteId = b.PacienteId
								WHERE a.Id='".$horreqid."'");
        $returnDadosPaciente = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "DadosPaciente"     => $returnDadosPaciente,
        ));
		
		$query = $dbSite->query("SELECT Descricao FROM site_Agenda_Livros WHERE LivroId='".$livroid."'");
        $returnLivros = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Livros"     => $returnLivros,
        ));
		
		$query = $dbSite->query("SELECT Hora FROM site_Horarios WHERE Id='".$horreqid."'");
        $returnHoras = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Horas"     => $returnHoras,
        ));
		
		$query = $dbSite->query("SELECT ProcedimentoId, Descricao 
								FROM site_Agenda_Procedimentos
								ORDER BY Descricao");
        $returnprocedimentos = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "procedimentos"     => $returnprocedimentos,
        ));
		
		$query = $dbSite->query("SELECT a.Id, a.LivroId, a.ConvenioId, b.Descricao 
								FROM site_Agenda_Livros_Convenios a
								INNER JOIN site_Agenda_Convenios b on a.ConvenioId = b.ConvenioId
								WHERE a.LivroId='".$livroid."'
								ORDER BY Descricao");
        $returnconvenios = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "convenios"     => $returnconvenios,
        ));
		
		$tpl->display("engine/view/InfoPanel/pages/Agenda/system.agenda_agendamento.tpl");
	break;

	case "agenda_buscar":
		$Busca = corrigeaspas(strtoupper($_POST['Busca']));
		
		if ($dia == NULL){$dia = date(d);
						  $mes = date(m);
						  $ano = date(o);
						  $getLivroId = $mDbSiteCorpore->query("SELECT Top 1 LivroId FROM site_Agenda_Livros ORDER BY Descricao");
						  foreach($getLivroId as $getLivro){
							  $livroid = $getLivro['LivroId'];
						  }
						  }
		$livroid = url::GetURL(3);
		
		header("location: /info/agenda/agenda_busca/".$dia."/".$mes."/".$ano."/".$livroid."/".$Busca."");
	break;
	
	case "agenda_busca":		
		$agenda_busca = url::GetURL(2);
		$dia = url::GetURL(3);
		$mes = url::GetURL(4);
		$ano = url::GetURL(5);
		$livroid = url::GetURL(6);
		$Busca = url::GetURL(7);
		
		$BuscaArrumada = str_replace("%20", " ", $Busca);
		
		$query = $dbSite->query("SELECT LivroId, Descricao FROM site_Agenda_Livros ORDER BY Descricao");
        $returnLivros = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Livros"     => $returnLivros,
        ));
		
		$atual = $ano."-".$mes."-".$dia;
		$tpl->assign("agenda_busca", $agenda_busca);
		$tpl->assign("dia", $dia);
		$tpl->assign("mes", $mes);
		$tpl->assign("ano", $ano);
		$tpl->assign("atual", $atual);
		$tpl->assign("livroid", $livroid);
		
		$query = $dbSite->query("SELECT a.Id, a.Data, a.Hora, a.PacienteId, d.NomePaciente, d.DataNasc, d.Telefone, d.Celular,
								f.Descricao as Exame, e.Descricao as Convenio, a.Status, b.Descricao, a.Observacoes, a.LivroId
								FROM site_Horarios a
								INNER JOIN site_Agenda_Livros b on a.LivroId = b.LivroId
								full join site_Pacientes d on a.PacienteId = d.PacienteId
								left join site_Agenda_Convenios e on a.Convenio = e.ConvenioId
								left join site_Agenda_Procedimentos f on a.Exame = f.ProcedimentoId
								where a.LivroId='".$livroid."' and a.Data=CONVERT(datetime,'".$dia."-".$mes."-".$ano."',103) 
								and d.NomePaciente like '%" .$BuscaArrumada. "%'
								ORDER BY a.Hora ASC");
        $returnHorarios = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Horarios"     => $returnHorarios,
        ));
	
			
		$tpl->display("engine/view/InfoPanel/pages/Agenda/system.agenda.tpl");
    break;
}

function tiracaracterespecial($texto)
	{
		
		$texto = strtoupper(str_replace("Ã", "A", $texto));
		$texto = str_replace("'", "", $texto);
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
		return $texto;
	}
	function corrigeaspas($texto)
	{
		$texto = str_replace("'", "", $texto);
		return $texto;
	}
	
?>