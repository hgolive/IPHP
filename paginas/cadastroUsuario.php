<div id="cadastroUsuario" class="aparecer">
	<a class="close" href="#">x</a>
	<div class="tituloPagina">
		<h1>Cadastro de Usuários</h1>
	</div>
		<form action="logica/funcoes.php" method="post" enctype="multipart/form-data">
			<div class="retorno">
				<?php 
					if ($_GET['error'] = 9){
						echo "<div class='error'>Aconteceu um erro no cadastro.<div>";
					}
					elseif ($_GET['sucesso'] = 9){
						echo "<div class='sucesso'>Produto Cadastrado com sucesso.<div>";
					}
				?>
			</div>
		    <div class="col-caracteristica-produto">
		        <?php 
		                include "php/conecta_mysql.inc.php";
		                $tabela = odbc_exec($connect,"SELECT '0'as idCategoria, 'Selecione categoria' as nomeCategoria from Categoria union SELECT idCategoria, nomeCategoria from Categoria");
		           ?>

		            <div class="caracteristica nomeProduto box-marg-lef">
		                <label for="lblNome">Nome:</label>
		                <br>
		                <input id="txtNome" type="text" name="nomeusuario" placeholder="Fulano de tal">
		            </div>


		            <div class="caracteristica categoria">
		                <label for="lblCategoria">Perfil:</label>
		                <br>
		                <select name="perfilUsuario" id="selectCategoria">
		                	<option>Selecione um perfil</option>
		                    <?php 
		                      while ($resultado = odbc_fetch_array($tabela)) {
		                        echo "<option value='". $resultado['idCategoria'] ."'>". $resultado['nomeCategoria'] ."";
		                      }
		                    ?>
						</select>
					 </div>


		            



		        <div class="caracteristica">
		            <button stype="submit" name="botao" value="cadastrar_produto" class="botao">cadastrar</button>
		        </div>

		    </div>


		</form>
	</div></div>
</div>