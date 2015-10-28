<html hola_ext_inject="disabled"><head>
    <title>Cadastros</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!---------------------------------------------------- MIDA QUERIES---------------------------------------------------- -->
    <!--  FOLHA DE ESTILO PARA PC     -->
    <link href="css/estilo-cad-produto.css" rel="stylesheet" type="text/css" media="screen and (min-width: 1100px) and (max-width: 3000px)">

    <!-- FOLHA DE ESTILO PARA TABLET -->
    <link href="css/estilo-cad-produto-tab.css" rel="stylesheet" type="text/css" media="screen and (min-width: 600px) and (max-width: 1099px) ">

    <!-- FOLHA DE ESTILO PARA MOBILE -->
    <link href="css/estilo-cad-produto-mob.css" rel="stylesheet" type="text/css" media="screen and (max-width: 599px) ">


    <!-- ------------------------------------------------- FONTES----------------------------------------------------------------------------- -->
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
        <div id="menu">
            <ul>
                <li class='has-sub'><a href='#'>Usuario</a>
                    <ul>
                        <li><a href='#'>Cadastrar</a></li>
                        <li><a href='#'>Ver todos</a></li>
                    </ul>
                </li>
                <li class='has-sub'><a href='#'>Produtos</a>
                    <ul>
                        <li><a href='#cadastroProduto'>Cadastrar</a></li>
                        <li><a href='#'>Ver todos</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="container">
            
            <div class="centralizar">
                <div id="lightbox"> 
                    <div id="cadastroProduto" class="aparecer">

                        <a class="close" href="#">x</a>                          
                        <div class="tituloPagina">

                            <h1>Produtos</h1>

                        </div>


                        <form action="php/serviceProduto.php" method="post" enctype="multipart/form-data">
                            <div class="col-caracteristica-produto">
                                <?php 
                                        include "php/conecta_mysql.inc.php";
                                        $tabela = odbc_exec($connect,"SELECT '0'as idCategoria, 'Selecione categoria' as nomeCategoria from Categoria union SELECT idCategoria, nomeCategoria from Categoria");
                                   ?>

                                    <div class="caracteristica nomeProduto box-marg-lef">
                                        <label for="lblNome"> Nome do Produto:</label>
                                        <br>
                                        <input id="txtNome" type="text" name="nomeProduto" placeholder="Digite nome do produto">
                                    </div>


                                    <div class="caracteristica categoria">
                                        <label for="lblCategoria">Categoria</label>
                                        <br>
                                        <select name="idCategoria" id="selectCategoria">
                                            <?php 
                                              while ($resultado = odbc_fetch_array($tabela)) {
                                                echo "<option value='". $resultado['idCategoria'] ."'>". $resultado['nomeCategoria'] ."";
                                              }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="caracteristica descricao box-marg-lef">
                                        <label for="lblDes">Descrição do Produto:</label>
                                        <br>
                                        <textarea id="txtDes" name="descricaoProduto" placeholder="Digite as informações do produto" rows="5" class="bg-input fonteBasica"></textarea>
                                    </div>

                                    <div class="table">
                                        <div class="col">

                                            <div class="caracteristica valor-col1">
                                                <label for="lblValor">Valor</label>
                                                <br>
                                                <input id="txtValor" type="text" name="precProduto" placeholder="%">
                                            </div>

                                            <div class="caracteristica valor-col1">
                                                <label for="lblQtd">Qtd. Miníma</label>
                                                <br>
                                                <input id="txtQtd" type="text" name="qtdMinEstoque" placeholder="%">
                                            </div>

                                        </div>


                                        <!-- PRIMEIRA LINHA LAYOUT DESCONTO E QTD-MININA -->
                                        <div class="col">

                                            <div class="caracteristica valor-col2">
                                                <label for="lblDes">Desconto</label>
                                                <br>
                                                <input id="txtDes" type="text" name="desconto" placeholder="%">
                                            </div>

                                            <div class="caracteristica valor-col2">

                                                <label for="selectCategoria">Status</label>
                                                <br>
                                                <select name="ativoProduto" id="selectCategoria">
                                                    <option value="">Status</option>
                                                    <option value="0">Inativo</option>
                                                    <option value="1">Ativo</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>




                            </div>
                            <div class="col-imagen">

                                <div class="imagemProduto">

                                    <input type="file" name="foto" accept="image/*" onchange="loadFile(event)">
                                    <img id="output">
                                    <script>
                                        var loadFile = function (event) {
                                            var output = document.getElementById('output');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                        };
                                    </script>
                                </div>



                                <div class="caracteristica">
                                    <button class="botao">cadastrar</button>
                                </div>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <footer>Inimigos do PHP</footer> 




</body></html>