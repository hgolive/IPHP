<meta charset="utf-8">
<link rel="stylesheet" href="estilos/style.css">

<?php


include "conecta_mysql.inc.php";

$login	=	$_POST["login"];
$senha	=	md5($_POST["senha"]);	








$tabela = odbc_exec($connect,"SELECT senhaUsuario, tipoPerfil, idUsuario, usuarioAtivo FROM usuario WHERE loginUsuario = '". $login . "'");



$senhaBanco = odbc_result($tabela , "senhaUsuario");
$tipoPerfil = odbc_result($tabela , "tipoPerfil");
$idUsuario = odbc_result($tabela , "idUsuario");
$usuarioAtivo = odbc_result($tabela , "usuarioAtivo");


if(($senha ==  $senhaBanco) && ($usuarioAtivo == '1'))
{
 
  switch ($tipoPerfil) {
  	case 'A':
  		header("location:adm.php");
  		break;
  	
  	case 'U':
  		header("location:usuario.php");
  		break;
  }
}else{echo "usuario ou senha incorretos";}



?>

