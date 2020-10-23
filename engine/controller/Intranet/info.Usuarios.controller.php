<?php

switch(url::GetUrl(2)) {
	default:
	case "usuarios":
			$status = url::GetURL(2);
            
			$query = $dbSite->query("SELECT userid, nome, LOGIN, inativo
								FROM site_usuarios
								ORDER BY nome ASC");
            $returnUsuarios = $dbSite->fetch_array();
            
            $tpl->assign("usuarios", $returnUsuarios);
        
			$tpl->assign("status", $status);
			
            $tpl->display("engine/view/InfoPanel/pages/Usuarios/system.usuarios.tpl");
    break;
	
	case "usuarios_novo":
            $tpl->display("engine/view/InfoPanel/pages/Usuarios/system.usuarios_novo.tpl");
    break;
	
	case "usuarioNovo":
        if($_POST){			
			$usuario = corrigeaspas($_POST['usuario']);
			$login = corrigeaspas($_POST['login']);
			$senha = corrigeaspas($_POST['senha']);
			
            $query = $dbSite->query("INSERT into site_usuarios (nome, login, SenhaSite, inativo) values (UPPER('".$usuario."'),
			UPPER('".$login."'),'".$senha."','F')");		
			
			if($query){
				header("location: /info/usuarios/1");
			}else{
				echo json_encode(false);
			}
		}
	break;
	
	case "usuarios_ficha":
			$usuarioid = url::GetURL(3);
			$status = url::GetURL(4);
            
			if(is_numeric($status)){
				
			}else{
				$pesquisa = $status;
				$pesquisa = str_replace("%20", " ", $pesquisa);
				$pesquisanome = str_replace(" ", "%' AND nome like '%", tiracaracterespecial($pesquisa));
			}
		
			$query = $dbSite->query("SELECT userid, nome, LOGIN, inativo, senhasite
								FROM site_usuarios
								where USERID='".$usuarioid."'");
            $returnUsuarios = $dbSite->fetch_array();
            
            $tpl->assign("usuarios", $returnUsuarios);
			
			$tpl->assign("status", $status);
			
            $tpl->display("engine/view/InfoPanel/pages/Usuarios/system.usuarios_ficha.tpl");	
	break;
	
	
	case "usuarios_edita":
			$usuarioid = url::GetURL(3);
            
			$query = $dbSite->query("SELECT userid, nome, LOGIN, inativo, senhasite
								FROM site_usuarios
								where USERID='".$usuarioid."'");
            $returnUsuarios = $dbSite->fetch_array();
            
            $tpl->assign("usuarios", $returnUsuarios);
			
            $tpl->display("engine/view/InfoPanel/pages/Usuarios/system.usuarios_edita.tpl");
    break;
	
	case "usuarioEdita":
        if($_POST){			
			$userid = corrigeaspas($_POST['userid']);
			$usuario = corrigeaspas($_POST['usuario']);
			$login = corrigeaspas($_POST['login']);
			$senha = corrigeaspas($_POST['senha']);
			$status = corrigeaspas($_POST['status']);
			
            $query = $dbSite->query("UPDATE site_usuarios set 
			nome = '".$usuario."', 
			login = '".$login."', 
			SenhaSite = '".$senha."', 
			inativo = '".$status."'
			where UserId = '".$userid."'");		
			
			if($query){
				header("location: /info/usuarios/usuarios_ficha/".$userid."/1");
			}else{
				echo json_encode(false);
			}
		}
	break;
}
function tiracaracterespecial($texto)
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
		return $texto;
	}
?>