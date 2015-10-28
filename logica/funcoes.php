<?php
	session_start();
	include "conecta_mysql.inc.php";//Incluindo o arquivo de conexão com o banco

	$botao		= 	$_POST['botao']; //Recebo o valor do botão
	$separar	=	explode("_", $botao); //Faço separo o valor pelo _ e atribuo nas variaveis abaixo
	$acao		=	$separar[0]; //Atribuo o valor do botao na variavel  antes do _
	$tipoAcao	=	$separar[1]; //Atribuo o valor do botao na variavel depois do _

	//Toda a lógica relaciona a cadastro
	if ($acao == "cadastrar") {
		//Cadastrar Produto
		if ($tipoAcao == "produto") {
			//Recebendo as variaveis do form
			$nomeProduto		=	$_POST["nomeProduto"];
			$descricaoproduto	=	$_POST["descricaoProduto"];	
			$precProduto		=	$_POST["precProduto"];	
			$desconto			=	$_POST["desconto"];	
			$idCategoria		=	$_POST["idCategoria"];	
			$ativoProduto		=	$_POST["ativoProduto"];	
			$idUsuario			=	$_SESSION['idUsuario'];	
			$qtdMinEstoque		=	$_POST["qtdMinEstoque"];	
			

			$tmpName = $_FILES['foto']['tmp_name'];//Recebendo a img
			$fp = fopen($tmpName, 'r');	//Abrindo o codigo bincario da img
			$img = fread($fp, filesize($tmpName));//Lendo o codigo bincario da img e salvando em um variavel
			fclose($fp); //Fexando a img

		    
			$params = array($nomeProduto,$descricaoproduto,$precProduto,$desconto,$idCategoria,$ativoProduto,$idUsuario,$qtdMinEstoque,$img); //Array contendo as variaveis do form

			//Instrução SQL para inserir as variaveis no bd
		  	$instrucaoSQL = "insert into produto(nomeProduto, descproduto, precproduto,descontoPromocao, idCategoria,ativoProduto,idUsuario, qtdMinestoque, imagem)  values (?,?,?,?,?,?,?,?,?)";

		   	// Juntando as variaveis com o a instrução SQL
			$rec = odbc_prepare($connect,$instrucaoSQL);
			odbc_execute($rec, $params); //salvando no bd os dados


			header("location:../admin.php?sucesso=1#cadastroProduto");//Redireciono para a pagina falando que o produto foi cadastrado com sucesso
		}else{
			header("location:../admin.php?error=1#cadastroProduto");
			}//Redireciono para a pagina falando que o deu erro no cadastro
	}

	//Logica de login
	if ($botao == "logar") {
		
		$login	=	$_POST["login"];//Recebendo dados do form
		$senha	=	md5($_POST["senha"]);//Recebendo dados do form e criptografando a senha	
		
		//Selecionando os dados de acordo com o login
		$tabela = odbc_exec($connect,"SELECT senhaUsuario, tipoPerfil, idUsuario, usuarioAtivo FROM usuario WHERE loginUsuario = '". $login . "'");

		//Salvando os dados do select em cada variavel.
		$senhaBanco = odbc_result($tabela , "senhaUsuario");
		$tipoPerfil = odbc_result($tabela , "tipoPerfil");
		$idUsuario = odbc_result($tabela , "idUsuario");
		$usuarioAtivo = odbc_result($tabela , "usuarioAtivo");


		//Comparo a senha digitada com a senha do banco e se o usuario estiver ativo
		if ($usuarioAtivo == "0") {
			header("location:../index.php?error=2");
		}
		elseif(($senha ==  $senhaBanco) && ($usuarioAtivo == '1'))
		{
			$_SESSION['idUsuario']	= $idUsuario;
			$_SESSION['tipoPerfil'] = $tipoPerfil;
			header("location:admin.php");			
		}else{
			header("location:../index.php?error=1");
		}
	}
?>