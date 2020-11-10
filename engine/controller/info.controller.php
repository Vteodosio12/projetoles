<?php

if(isset($_SESSION['login']) || url::GetURL(1) == 'startSession') {
    $page = url::GetURL(1);
}else{
    $page = "login";
}

$tpl->assign("loadPage", url::GetURL(2));

if($inf->login){
    $tpl->assign("inf", $inf);
}

switch($page){

    case "login":
		$tpl->display("engine/view/InfoPanel/pages/system.login.tpl");
    break;
	
    case "startSession":
        $_login     = str_replace("'", "", $_POST['login']);
        $_password  = str_replace("'", "", $_POST['password']);

		$return = $inf->startSession($_login, $_password);	
			
		echo "$_login $password";
		if($return){
			header("location: /info/inicial");
		}else{
			header("location: /info/login?error=true");
		}
    break;
	
	default:
    case "main":
        header("location: /info/inicial");
    break;
		
	case "changePass":
		$status = url::GetURL(2);
		
		$tpl->assign("status", $status);
		
		$tpl->display("engine/view/InfoPanel/pages/AlteraSenha/system.changePass.tpl");
    break;
    
    case "alterPass":
        $senhaAntiga = $_POST['oldpassword'];
        $senhaNova   = $_POST['newPassword'];
        
        if($senhaAntiga == $senhaNova)
            header("location: /info/changePass?error=445511");
        elseif($senhaNova == $inf->password)
            header("location: /info/changePass?error=445512");
            
        $return = $inf->alterPass($senhaNova);
        
        if($return){
            header("location: /info/main");
        }else{
            header("location: /info/changePass?error=true");
        }
    break;
	
    case "logout":
        session_destroy();
        unset($_SESSION['login']);
        header("location: /info/login");
    break;
	
	case "inicial":
		$tpl->display("engine/view/InfoPanel/pages/Inicial/system.inicial.tpl");
    break;
    
    case "usuarios":
        include "Intranet/info.Usuarios.controller.php";
    break;

    case "cadastros":
        include "Intranet/info.Cadastros.controller.php";
    break;

    case "pacientes":
        include "Intranet/info.Pacientes.controller.php";
    break;

    case "agenda":
        include "Intranet/info.Agenda.controller.php";
    break;

    case "orcamento":
        include "Intranet/info.Orcamento.controller.php";
    break;
}
?>