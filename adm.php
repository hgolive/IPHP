<!DOCTYPE html>
<html>
    <head>
        <title>Cadastros</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/estilo-cad-produto.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>
    <body>     
        <div class="tudo">
            <div class="menuLateral"></div>
            <div class="container">
                <div class="centralizar">
                    
                        <div class="tituloPagina">
                            <h1>Produtos</h1>
                        </div>
                        <form action="php/serviceProduto.php" method="post" enctype="multipart/form-data">
                        <div class="caracteristicas">
                           <?php 
                                include "php/conecta_mysql.inc.php";
                                $tabela = odbc_exec($connect,"SELECT '0'as idCategoria, 'Selecione categoria' as nomeCategoria from Categoria union SELECT idCategoria, nomeCategoria from Categoria");
                           ?> 

                            <div class="caracteristica nomeProduto">
                                <label for="name"> Nome do Produto:</label><br>
                                <input id="name" type="text" name="nomeProduto" placeholder="Digite nome do produto">

                            </div>
                            <div class="caracteristica categoria">
                                <label for="selectCategoria">Categoria</label><br>
                                <select name="idCategoria" id="selectCategoria">
                                    <?php 
                                      while ($resultado = odbc_fetch_array($tabela)) {
                                        echo "<option value='". $resultado['idCategoria'] ."'>". $resultado['nomeCategoria'] ."</option>";
                                      }
                                    ?>
                                </select>
                            </div>
                            <div class="caracteristica descricao">
                                <label for="name">Descrição do Produto:</label><br>
                                <textarea id="name" name="descricaoProduto" placeholder="Digite as informações do produto" rows="10" class="bg-input fonteBasica"></textarea>
                            </div>
                            
                       
                            
                            
                            <div class="caracteristica valor">
                                <label for="name1">Valor</label><br>
                                <input id="name1" type="text" name="precProduto" placeholder="%">
                            </div>
                            <div class="caracteristica valor" style="margin-left: 92px;">
                                <label for="name">Desconto</label><br>
                                <input id="name" type="text" name="desconto" placeholder="%">
                            </div>
                            <div class="caracteristica valor" >
                                <label for="name">Qtd. Miníma</label><br>
                                <input id="name" type="text" name="qtdMinEstoque" placeholder="%">
                            </div>
                            <div class="caracteristica valor" style="margin-left: 92px;">
                                <label for="selectCategoria">Estado produto</label><br>
                                <select name="ativoProduto" id="selectCategoria" style="width: 102%;">
                                    <option value="">Status</option>
                                    <option value="0">Inativo</option>
                                    <option value="1">Ativo</option>
                                </select>
                            </div>
                        </div>
                        <div class="imagen">
                            <div class="imagemProduto">
                                <input type="file" name="arquivo" />
                                <img src="" title="imagem produto">
                            </div>
                            <div class="caracteristica">
                                <button class="botao">cadastrar</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div> 
        <footer>Inimigos do PHP</footer>
            
    </body>
    
  
</html>
