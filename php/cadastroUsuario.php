<?php 

	include "conecta_mysql.inc.php";
	$tabela = odbc_exec($connect,"SELECT idCategoria, nomeCategoria from Categoria");

  

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login cadastro</title>
        <meta charset="utf-8">
        
       
        
        
    </head>
<body>
   
   
    <content>
       <form name="formlogin" id="formlogin" action="cadastroProduto.php" method="post">
          
            
         <table width="515" border="1">
              <tbody>
                <tr>
                  <td width="172">NomeProduto:</td>
                  <td width="235"><input type="text" name="nomeProduto" id="textfield"></td>
                </tr>
                <tr>
                  <td>Descricão:</td>
                  <td><input type="text" name="descricaoproduto" id="textfield2"></td>
                </tr>
                <tr>
                  <td>Preço:</td>
                  <td><input type="text" name="precProduto" id="textfield3"></td>
                </tr>
                <tr>
                  <td>Desconto:</td>
                  <td><input type="text" name="desconto" id="textfield4"></td>
                </tr>
                <tr>
                  <td>idCategoria</td>
                  <td><select name="idCategoria">
                    <?php 
                      while ($resultado = odbc_fetch_array($tabela)) {
                        echo "<option value='". $resultado['idCategoria'] ."'>". $resultado['nomeCategoria'] ."</option>";
                      }
                    ?>
               
                   
                  </select></td>
                </tr>
                <tr>
                  <td>idAtivoProduto:</td>
                  <select name="ativoProduto">
                    <option value="0">Inativo</option>
                    <option value="1">Ativo</option>
                  </select>
                </tr>
                <tr>
                  <td>idUsuario:</td>
                   <td><input type="text" name="idUsuario" id="textfield4"></td>
                </tr>
                <tr>
                  <td>qtdMinEstoque:</td>
                  <td><input type="text" name="qtdMinEstoque" id="textfield5"></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
              <button type="submit">cadastrar</button>
         </table>
</div>
       </form>
        
    </content>
</body>
</html>