<?php 

include "conecta_mysql.inc.php";
$tabela = odbc_exec($connect,
"select
PROD.*,
CATEG.nomeCategoria
from 
produto PROD
join
categoria CATEG
on
PROD.idCategoria = CATEG.idCategoria
");


$path = "imgProduto/"; 
$diretorio = dir($path); 

	while($arquivo = $diretorio -> read()){ 
			if($arquivo != '..' && $arquivo != '.'){
		echo "<img src='". $path . $arquivo ."'><br/>"; 
		break;
		}
	}

$diretorio -> close();


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf8">
	<style type="text/css">
	h1{font-size: 18px; font-family: arial;}
	img{width: 50px;}
</style>
</head>
<body>
<?php
	while ($resultado = odbc_fetch_array($tabela)) {
 ?>
<h1>
	Nome Produto
	<?php 
		
	       $campoLista = $resultado['nomeProduto'];
	       echo "$campoLista";
	?>
</h1>
<h1>
	Descricao Produto
	<?php 
		$campoLista = $resultado['descProduto'];
	    echo "$campoLista";
	?>
</h1>
<h1>
	Preco Produto
	<?php 
		$campoLista = $resultado['precProduto'];
	   	echo "$campoLista";
	?>	
</h1>
<h1>
	Desconto Produto
	<?php 
		$campoLista = $resultado['descontoPromocao'];
	   	echo "$campoLista";
	?>
</h1>
<h1>
	Qtd Produto
	<?php 
		$campoLista = $resultado['qtdMinEstoque'];
	   	echo "$campoLista";
	?>
</h1>
<h1>
	Categoria Produto
	<?php 
		$campoLista = $resultado['nomeCategoria'];
	   	echo "$campoLista";
	?>
</h1>
<h1>
	Imagem
	<?php 
	
	   
	?>
</h1>

<?php } ?>
</body>
</html>