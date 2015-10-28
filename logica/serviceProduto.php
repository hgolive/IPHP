<meta charset="utf-8">
<link rel="stylesheet" href="estilos/style.css">

<?php


	include "conecta_mysql.inc.php";
	
	$nomeProduto		=	$_POST["nomeProduto"];
	$descricaoproduto	=	$_POST["descricaoProduto"];	
	$precProduto		=	$_POST["precProduto"];	
	$desconto			=	$_POST["desconto"];	
	$idCategoria		=	$_POST["idCategoria"];	
	$ativoProduto		=	$_POST["ativoProduto"];	
	$idUsuario			=	$_SESSION['idUsuario'];	
	$qtdMinEstoque		=	$_POST["qtdMinEstoque"];	
	

	$tmpName = $_FILES['foto']['tmp_name'];
	$fp = fopen($tmpName, 'r');
	$img = fread($fp, filesize($tmpName));
	fclose($fp);

    
	$params = array($nomeProduto,$descricaoproduto,$precProduto,$desconto,$idCategoria,$ativoProduto,$idUsuario,$qtdMinEstoque,$img);

  	$instrucaoSQL = "insert into produto(nomeProduto, descproduto, precproduto,descontoPromocao, idCategoria,ativoProduto,idUsuario, qtdMinestoque, imagem)  values (?,?,?,?,?,?,?,?,?)";

   
	$rec = odbc_prepare($connect,$instrucaoSQL);

    var_dump($rec);
	odbc_execute($rec, $params);


	 
?>

