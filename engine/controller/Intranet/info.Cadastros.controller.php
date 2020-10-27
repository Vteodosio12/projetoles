<?php

switch(url::GetUrl(2)) {
	default:
	case "cadastros":	
		$status = url::GetURL(3);
		$tpl->assign("status", $status);
		
		$query = $dbSite->query("SELECT LivroId, Descricao FROM site_Agenda_Livros ORDER BY Descricao");
        $returnLivros = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Livros"     => $returnLivros,
        ));
		
		$query = $dbSite->query("SELECT ConvenioId, Descricao FROM site_Agenda_Convenios ORDER BY Descricao");
        $returnConvenios = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Convenios"     => $returnConvenios,
        ));
		
		$query = $dbSite->query("SELECT ProcedimentoId, Descricao FROM site_Agenda_Procedimentos ORDER BY Descricao");
        $returnProcedimentos = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Procedimentos"     => $returnProcedimentos,
        ));

		$tpl->display("engine/view/InfoPanel/pages/Cadastros/system.cadastros.tpl");
	break;
	
	case "agenda_livros_novo":		
		$tpl->display("engine/view/InfoPanel/pages/Cadastros/system.agenda_livros_novo.tpl");
	break;
	
	case "novoLivro":
	if($_POST){
		$nomelivro = corrigeaspas($_POST['nomelivro']);
		
		$query = $dbSite->query("INSERT INTO site_Agenda_Livros (Descricao) VALUES ('".$nomelivro."')");
		
		header("location: /info/cadastros/cadastros");
	}else{
		header("location: /home");
	}
	break;
	
	case "agenda_livros_edita":
		$codigo = url::GetURL(3);
		
		$query = $dbSite->query("SELECT LivroId, Descricao FROM site_Agenda_Livros WHERE LivroId='".$codigo."'");
        $returnLivros = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Livros"     => $returnLivros,
        ));

		$tpl->display("engine/view/InfoPanel/pages/Cadastros/system.agenda_livros_edita.tpl");
	break;
	
	case "editaLivro":
	if($_POST){
		$livroid = corrigeaspas($_POST['livroid']);
		$nomelivro = corrigeaspas($_POST['nomelivro']);
		
		$query = $dbSite->query("UPDATE site_Agenda_Livros SET Descricao='".$nomelivro."'
		WHERE LivroId='".$livroid."'");
		
		header("location: /info/cadastros/agenda_livros");
	}else{
		header("location: /home");
	}
	break;
	
	case "agenda_livros_exclui":
		$codigo = url::GetURL(3);
		
		$query = $dbSite->query("SELECT LivroId, Descricao FROM site_Agenda_Livros WHERE LivroId='".$codigo."'");
        $returnLivros = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Livros"     => $returnLivros,
        ));

		$tpl->display("engine/view/InfoPanel/pages/Cadastros/system.agenda_livros_confirmabaixa.tpl");
	break;
	
	case "baixaLivro":
	if($_POST){
		$livroid = corrigeaspas($_POST['livroid']);
		
		$query = $dbSite->query("DELETE FROM site_Agenda_Livros 
		WHERE LivroId='".$livroid."'");
		
		header("location: /info/cadastros/agenda_livros");
	}else{
		header("location: /home");
	}
	break;
	
	case 'agenda_convenios_novo':
		$tpl->display("engine/view/InfoPanel/pages/Cadastros/system.agenda_convenios_novo.tpl");
	break;
	
	case 'novoConvenio':
		if($_POST){
			$nomeconvenio = corrigeaspas($_POST['nomeconvenio']);
			
			$query = $dbSite->query("INSERT INTO site_Agenda_Convenios (Descricao) VALUES ('".$nomeconvenio."')");
			
			header("location: /info/cadastros/agenda_livros/3");
		}else{
			header("location: /home");
		}
	break;
	
	case 'agenda_convenios_edita':
		$convenioid = url::GetURL(3);
		
		$query = $dbSite->query("SELECT ConvenioId, Descricao FROM site_Agenda_Convenios where ConvenioId='".$convenioid."' ORDER BY Descricao");
        $returnConvenios = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Convenios"     => $returnConvenios,
        ));
	
		$tpl->display("engine/view/InfoPanel/pages/Cadastros/system.agenda_convenios_edita.tpl");
	break;
	
	case 'editaConvenio':
		if($_POST){
			$convenioid = corrigeaspas($_POST['convenioid']);
			$nomeconvenio = corrigeaspas($_POST['nomeconvenio']);
			
			$query = $dbSite->query("UPDATE site_Agenda_Convenios set Descricao='".$nomeconvenio."'
			where ConvenioId='".$convenioid."'");
			
			header("location: /info/cadastros/agenda_livros/4");
		}else{
			header("location: /home");
		}
	break;
	
	case 'agenda_convenios_exclui':
		$convenioid = url::GetURL(3);
		
		$query = $dbSite->query("DELETE FROM site_Agenda_Convenios where ConvenioId='".$convenioid."'");
	
		header("location: /info/cadastros/agenda_livros/5");
	break;
	
	case 'agenda_procedimentos_novo':
		$tpl->display("engine/view/InfoPanel/pages/Cadastros/system.agenda_procedimentos_novo.tpl");
	break;
	
	case 'novoProcedimento':
		if($_POST){
			$nomeprocedimento = corrigeaspas($_POST['nomeprocedimento']);
			
			$query = $dbSite->query("INSERT INTO site_Agenda_Procedimentos (Descricao
			) VALUES ('".$nomeprocedimento."')");
			
			header("location: /info/cadastros/agenda_livros/7");
		}else{
			header("location: /home");
		}
	break;
	
	case 'agenda_procedimentos_edita':
		$procedimentoid = url::GetURL(3);
		
		$query = $dbSite->query("SELECT ProcedimentoId, Descricao FROM site_Agenda_Procedimentos where ProcedimentoId='".$procedimentoid."' ORDER BY Descricao");
        $returnProcedimentos = $dbSite->fetch_array();
        
        $tpl->assign(array(
            "Procedimentos"     => $returnProcedimentos,
        ));
	
		$tpl->display("engine/view/InfoPanel/pages/Cadastros/system.agenda_procedimentos_edita.tpl");
	break;
	
	case 'editaProcedimento':
		if($_POST){
			$procedimentoid = corrigeaspas($_POST['procedimentoid']);
			$nomeprocedimento = corrigeaspas($_POST['nomeprocedimento']);
			
			$query = $dbSite->query("UPDATE site_Agenda_Procedimentos set Descricao='".$nomeprocedimento."'
			where ProcedimentoId='".$procedimentoid."'");
			
			header("location: /info/cadastros/agenda_livros/8");
		}else{
			header("location: /home");
		}
	break;
	
	case 'agenda_procedimentos_exclui':
		$procedimentoid = url::GetURL(3);
		
		$query = $dbSite->query("DELETE FROM site_Agenda_Procedimentos where ProcedimentoId='".$procedimentoid."'");
	
		header("location: /info/cadastros/agenda_livros/9");
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
	
?>