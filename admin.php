<?php
session_start();
error_reporting(0);
?>
<html hola_ext_inject="disabled">

<head>
	<title>Cadastros</title>
	<meta charset="UTF-8">
	<meta name="description" content="Trabalho de PI curso STI - Senac 2015 2º semestre grupo Inimigos do php. integrantes: Helder, Nicolas, Reginal, Fernando">
	<meta name="keywords" content="Projeto-integrador,senac-sti,sti-2015,inimigos-do-php">
	<meta name="author" content="Fernando, Nicolas">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--MIDA QUERIES-->
	<!--  FOLHA DE ESTILO PARA PC     -->
	<link href="css/estilo-cad-produto.css" rel="stylesheet" type="text/css" media="screen and (min-width: 1024px) and (max-width: 10000px)">

	<!-- FOLHA DE ESTILO PARA TABLET -->
	<link href="css/estilo-cad-produto-tab.css" rel="stylesheet" type="text/css" media="screen and (min-width: 600px) and (max-width: 1023px) ">

	<!-- FOLHA DE ESTILO PARA MOBILE -->
	<link href="css/estilo-cad-produto-mob.css" rel="stylesheet" type="text/css" media="screen and (max-width: 599px) ">


	<!--FONTES-->
	<!-- CDN DE FONTES GOOGLE -->
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- CDN DE FONTS AWESOME -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!--JS-->
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="js/script.js"></script>

</head>



<body>
	<div class="tudo">
		<!--MENU-->
		<?php include "paginas/menu.php" ?>
		<!--FIM-MENU-->
		<div class="container">
			<div class="centralizar">
				<!--INICIO LIGHTBOX -->
				<div id="lightbox">
					<!--Páginas de Cadastro -->
					<?php include "paginas/cadastroCategoria.php" ?>
					<?php include "paginas/cadastroProduto.php" ?>
					<?php include "paginas/cadastroUsuario.php" ?>
					<!-- Páginas de consulta-->
					<?php include "paginas/consultaCategoria.php" ?>
					<?php include "paginas/consultaProduto.php" ?>
					<?php include "paginas/consultaUsuario.php" ?>
				</div>
				<!--FIM LIGHTBOX-->
			</div>
		</div>
	</div>
	<!--FIM CONTENT-->
	<footer> &copy; 2015 Inimigos do PHP</footer>
</body>

</html>