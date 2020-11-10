<?php

switch(url::GetUrl(2)) {
	default:
	case "orcamento":
		$query = $dbSite->query("SELECT a.Id, a.Data, b.NomePaciente, b.DataNasc, a.Valor
								FROM site_Orcamentos a
								INNER JOIN site_Pacientes b ON a.PacienteId = b.PacienteId");
        $returnOrcamentos = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Orcamentos"     => $returnOrcamentos,
        ));
		
		$tpl->display("engine/view/InfoPanel/pages/Orcamentos/system.orcamentos.tpl");
	break;

	case "orcamento_novo":
		$orcamentoid = url::GetURL(3);
		$tpl->assign("orcamentoid", $orcamentoid);

		$query = $dbSite->query("SELECT ProcedimentoId, Descricao
								FROM site_Agenda_Procedimentos
								ORDER BY Descricao");
        $returnprocedimentos = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "procedimentos"     => $returnprocedimentos,
        ));
		
		
		$tpl->display("engine/view/InfoPanel/pages/Orcamentos/system.orcamentos_novo.tpl");
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

	case "novoOrcamento":
		if($_POST){			
			$NomePaciente = tiracaracterespecial(trim(strtoupper($_POST['NomePaciente'])));
			$DataNasc = $_POST['DataNasc'];
			$Telefone = $_POST['Telefone'];
			$Celular = $_POST['Celular'];
			$Valor = str_replace(",", "", $_POST['Valor']);
			$procedimentoid = $_POST['procedimentoid'];
			$PacienteId = $_POST['PacienteId'];
			$orcamentoid = $_POST['OrcamentoId'];
			
			$query = $dbSite->query("DELETE FROM site_Orcamentos_Procedimentos where OrcamentoId='".$orcamentoid."'");

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
			
			if($orcamentoid == ""){
				$query = $dbSite->query("INSERT INTO site_Orcamentos (Data, PacienteId, Valor) VALUES ((GETDATE()), '".$PacienteId."','".$Valor."')");		
				
				$getOrcamentoId = $mDbSiteCorpore->query("SELECT Top 1 Id from site_Orcamentos order by Id desc");
				foreach($getOrcamentoId as $getOrcamento) {
					$orcamentoid = $getOrcamento['Id'];
				}
			}else{
				$query = $dbSite->query("UPDATE site_Orcamentos SET PacienteId='".$PacienteId."', Valor='".$Valor."' WHERE Id='".$orcamentoid."'");		
			}
			
			foreach($_POST['option'] as $value){
				$query = $dbSite->query("INSERT INTO site_Orcamentos_Procedimentos (OrcamentoId,ProcedimentoId) VALUES ('".$orcamentoid."','".$value."')");
			}

			header("location: /info/orcamento/1");
		}else{
			header("location: /home");
		}
	break;
		
	case "excluiOrcamento":
		$orcamentoid = url::GetURL(3);
		
		$query = $dbSite->query("DELETE from site_Orcamentos WHERE Id='".$orcamentoid."'");
		
		echo "<script language='javascript'>history.go(-1)</script>";
	break;

	case "editaOrcamento":
		$orcamentoid = url::GetURL(3);
		$tpl->assign("orcamentoid", $orcamentoid);

		$query = $dbSite->query("select a.Id, a.Data, a.PacienteId, b.NomePaciente,
								b.Telefone, b.Celular, a.Valor, b.DataNasc
								FROM site_Orcamentos a
								INNER JOIN site_Pacientes b on a.PacienteId = b.PacienteId
								WHERE a.Id='".$orcamentoid."'");
        $returnDadosPaciente = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "DadosPaciente"     => $returnDadosPaciente,
        ));
		
		$query = $dbSite->query("SELECT ProcedimentoId, Descricao
								FROM site_Agenda_Procedimentos
								ORDER BY Descricao");
        $returnprocedimentos = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "procedimentos"     => $returnprocedimentos,
		));
		
		$query = $dbSite->query("SELECT ProcedimentoId, OrcamentoId
								FROM site_Orcamentos_Procedimentos
								WHERE OrcamentoId='".$orcamentoid."'");
        $returnprocedimentosorcados = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "procedimentosorcados"     => $returnprocedimentosorcados,
        ));
		
		
		$tpl->display("engine/view/InfoPanel/pages/Orcamentos/system.orcamentos_novo.tpl");
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