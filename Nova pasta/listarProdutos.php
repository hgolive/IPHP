<?php 
    include "php/conecta_mysql.inc.php";

    $listaProdutos = odbc_exec($connect,"select

p.idProduto,
p.nomeProduto,
c.nomeCategoria,

CASE p.ativoProduto
    WHEN '0' THEN 'Inativo'
    WHEN '1' THEN 'Ativo'
END as Status,

p.precProduto,
p.descontoPromocao,
p.qtdMinEstoque,
u.nomeUsuario

from
produto P
join
categoria C
on
P.idCategoria = C.idCategoria
join
usuario U
on u.idusuario = p.idusuario");



?>



<!DOCTYPE html>
<html>
    <head>
        <title>Cadastros</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link type="text/css" href="css/styleAdm.css" rel="stylesheet" />   
        <link href="css/estilo-cad-produto.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
          
            <script type="text/javascript" src="js/adm.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
            <script src="js/jquery.tablesorter.min.js"></script>
            <script src="js/jquery.tablesorter.pager.js"></script>
            <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    </head>
    <body>     
        <div class="tudo">
            <div class="menuLateral"></div>
            <div class="container">
                <div class="centralizar">
                    
                        <div class="tituloPagina">
                            <h1>Produtos</h1>
                        </div>
                        <form  method="get"  action="pegarId.php" id="frm-filtro">
                                  
                                
                                <table id="tb1">
                                    
                                    <thead>
                                        <tr>
                                            <th>Nome Produto</th>
                                            <th>Categoria</th>
                                            <th>Preço</th>
                                            <th>Desconto</th>
                                            <th>Qtd Miníma</th>
                                            <th>Usuário</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form method="post" action="" id="frm-filtro">
                             
                                            <input type="text" id="pesquisar" placeholder="Gostaria de pesquisar algum produto?" class="Pesquisa" name="pesquisar" size="30">
                                
                                        </form>
                                        <?php 
                                         while ($resultado = odbc_fetch_array($listaProdutos)) {
                                                 $idProduto = $resultado['idProduto'];
                                                 $nomeProduto = $resultado['nomeProduto'];
                                                 $nomeCategoria = $resultado['nomeCategoria'];
                                                 $precProduto = $resultado['precProduto'];
                                                 $descontoPromocao = $resultado['descontoPromocao'];
                                                 $qtdMinEstoque = $resultado['qtdMinEstoque'];
                                                 $nomeUsuario = $resultado['nomeUsuario'];
                                                 $prodAtivo = $resultado['Status'];



                                        ?>
                                        <tr>
                                            <td data-label="Nome Produto">
                                              <?php 
                                                
                                              echo $nomeProduto?>
                                            </td>
                                            <td data-label="Categoria">
                                                <?php echo $nomeCategoria?>
                                            </td>
                                            <td data-label="Preço">
                                               <?php echo $precProduto?>
                                            </td>
                                            <td data-label="Desconto">
                                                <?php echo $descontoPromocao?>
                                            </td>
                                            <td data-label="Qtd Miníma">
                                                <?php echo $qtdMinEstoque?>
                                            </td>
                                            <td data-label="Usuário">
                                                <?php echo $nomeUsuario?>
                                            </td>
                                            <td data-label="Status">
                                                 <?php echo $prodAtivo?>
                                            </td>
                                            <td data-label="Ação">
                                                <button class='botao Autorizar' name='botao' id="botao" type='submit' value='autorizar_<?php echo $objXml -> NewDataSet -> Table1[$i] -> Login."_". $objXml -> NewDataSet -> Table1[$i] -> userName; ?>'>
                                                Editar
                                               </button>
                                            
                                                <button class='botao Bloquear' name='botao' id="botao" type='submit' value='bloquear_<?php echo $objXml -> NewDataSet -> Table1[$i] -> Login."_". $objXml -> NewDataSet -> Table1[$i] -> userName; ?>'>
                                                Deletar
                                               </button>
                                            </td>

                                        </tr>
                                       <?php }?>

                                    </tbody>
                                </table>
                                </form>
                                 <div id="pager" class="pager">
                                <form>
                                        <span>
                                            Exibir <select class="pagesize">
                                                    <option selected="selected"  value="6">Selecione</option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <option  value="9999999">Todos</option>
                                            </select> registros
                                        </span>

                                    
                                    <i class="fa fa-arrow-left prev" style="color: #2B4B55;cursor: pointer;"></i>
                                    <input type="text" class="pagedisplay"/>
                                    <i class="fa fa-arrow-right next" style="color: #2B4B55;cursor: pointer;"></i>
                                    
                                </form>
                            </div>
                            <script type="text/javascript">
                            var trocarCor = document.getElementById("status").innerText;
                                if (trocarCor = "Ativo") {
                                    document.getElementById("status").innerText.className += 'new-class';
                                };
                            </script>
                            <script>
                            $(function(){
                              

                              

                              $('#pesquisar').keydown(function(){
                                var encontrou = false;
                                var termo = $(this).val().toLowerCase();
                                $('table > tbody > tr').each(function(){
                                  $(this).find('td').each(function(){
                                    if($(this).text().toLowerCase().indexOf(termo) > -1) encontrou = true;
                                  });
                                  if(!encontrou) $(this).hide();
                                  else $(this).show();
                                  encontrou = false;
                                });
                              });
                              
                              $("table") 
                                .tablesorter({
                                  dateFormat: 'uk',
                                  headers: {
                                    0: {
                                      sorter: false
                                    },
                                    5: {
                                      sorter: false
                                    }
                                  }
                                }) 
                                .tablesorterPager({container: $("#pager")})
                                .bind('sortEnd', function(){
                                  $('table > tbody > tr').removeClass('odd');
                                  $('table > tbody > tr:odd').addClass('odd');
                                });
                              
                            });
                            </script>
                </div>
            </div>
        </div> 
        <footer>Inimigos do PHP</footer>
            
    </body>
    
  
</html>
