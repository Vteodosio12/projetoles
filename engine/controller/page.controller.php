<?php
//$page = strtoupper(url::GetURL(0)); //ESSA FUNÇÃO TRANSFORMA A STRING EM MAIUSCULO, ASSIM NÃO TEM DIFERENÇA DE POR EXEMPLO: "/Contato" "/ConTato" ou "/CONTATO"
$page = url::GetURL(0);

if($system == 1){

	switch($page){
		default:
		case "home":
			header("location: /public");
		break;

		case "info":
			include "info.controller.php";
		break;
	}
}else{
	echo "Site em manutenção";
}
?>