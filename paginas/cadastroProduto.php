<div id="cadastroProduto" class="aparecer">
	<a class="close" href="#">x</a>
	<div class="tituloPagina">
		<h1>Cadastro de Produtos</h1>
	</div>
	<form action="logica/funcoes.php" method="post" enctype="multipart/form-data">
		
	    <div class="col-caracteristica-produto">
	        <?php 
                include "php/conecta_mysql.inc.php";
                $tabela = odbc_exec($connect,"SELECT '0'as idCategoria, 'Selecione categoria' as nomeCategoria from Categoria union SELECT idCategoria, nomeCategoria from Categoria");
            ?>

            <div class="caracteristica nomeProduto box-marg-lef">
                <label for="lblNome"> Nome do Produto:</label>
                <br>
                <input id="txtNome" type="text" name="nomeProduto" placeholder="Sapato Lotus">
            </div>


            <div class="caracteristica categoria">
                <label for="lblCategoria">Categoria</label>
                <br>
                <select name="idCategoria" id="selectCategoria">
                	<option>Selecione uma categoria</option>
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
                <textarea id="txtDes" name="descricaoProduto" placeholder="Sapato roxo, de couro com cadarço" rows="5" class="bg-input fonteBasica"></textarea>
            </div>

            <div class="table">
                <div class="col">

                    <div class="caracteristica valor-col1">
                        <label for="lblValor">Valor</label>
                        <br>
                        <input id="txtValor" type="text" name="precProduto" placeholder="R$ 10,00">
                    </div>

                    <div class="caracteristica valor-col1">
                        <label for="lblQtd">Qtd. Miníma</label>
                        <br>
                        <input id="txtQtd" type="text" name="qtdMinEstoque" placeholder="10 unidades">
                    </div>

                </div>


                <!-- PRIMEIRA LINHA LAYOUT DESCONTO E QTD-MININA -->
                <div class="col">

                    <div class="caracteristica valor-col2">
                        <label for="lblDes">Desconto</label>
                        <br>
                        <input id="txtDes" type="text" name="desconto" placeholder="10%">
                    </div>

                    <div class="caracteristica valor-col2">

                        <label for="selectCategoria">Status</label>
                        <br>
                        <select name="ativoProduto" id="selectCategoria">
                            <option value="">Selecione um status</option>
                            <option value="0">Inativo</option>
                            <option value="1">Ativo</option>
                        </select>

                    </div>

                </div>
            </div>




	    </div>
	    <div class="col-imagen">
			<div class="imagemProduto">
				<input type="file" name="foto" class="imagem" accept="image/*" onchange="loadFile(event)">
	            <img id="output">
		            <script>
		                var loadFile = function (event) {
		                    var output = document.getElementById('output');
		                    output.src = URL.createObjectURL(event.target.files[0]);
		                };
		            </script>
	        </div>
		    <div class="caracteristica">
	            <button stype="submit" name="botao" value="cadastrar_produto" class="botao">cadastrar</button>
	        </div>
	    </div>
	</form>
</div>

