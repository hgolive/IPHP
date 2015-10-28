<meta charset="utf-8">
<link rel="stylesheet" href="estilos/style.css">

<?php


	include "conecta_mysql.inc.php";
	
	$loginUsuario		=	$_POST["loginUsuario"];
	$senhaUsuario	    =	md5($_POST["senha"]);	
	$nomeUsuario	    =   $_POST["nomeUsuario"];	
	$tipoPerfil			=	$_POST["tipoPerfil"];	
	$usuarioAtivo	    =   $_POST["usuarioAtivo"];
	
	
	
	
	odbc_exec($connect,"insert into usuario values ('".$loginUsuario."','".$senhaUsuario."','".$nomeUsuario."','".$tipoPerfil."',".$usuarioAtivo.")");

?>

