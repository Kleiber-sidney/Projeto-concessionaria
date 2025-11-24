<h1>Editar Venda</h1>
<?php
	$sql = "SELECT * FROM venda WHERE id_venda = ".$_REQUEST['id_venda'];
	$res = $conn->query($sql);
	$row = $res->fetch_object();
?>
<form action="?page=salvar-venda" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id_venda" value="<?php print $row->id_venda; ?>">

    <div class="mb-3">
		<label>Cliente
			<select name="cliente_id_cliente" class="form-control" required>
				<option>-= Escolha =-</option>
				<?php
					$sql_1 = "SELECT * FROM cliente";
					$res_1 = $conn->query($sql_1);
					if ($res_1->num_rows > 0){
						while($row_1 = $res_1->fetch_object()){

							if ($row->cliente_id_cliente == $row_1->id_cliente){
								print "<option value='{$row_1->id_cliente}' selected>{$row_1->nome_cliente}</option>";
							}else{
								print "<option value='{$row_1->id_cliente}'>{$row_1->nome_cliente}</option>";
							}
						}
					}else{
						print"<option>Não há clientes</option>";
					}
				?>
			</select>
		</label>
	</div>

    <div class="mb-3">
		<label>Funcionário
			<select name="funcionario_id_funcionario" class="form-control" required>
				<option>-= Escolha =-</option>
				<?php
					$sql_2 = "SELECT * FROM funcionario";
					$res_2 = $conn->query($sql_2);
					if ($res_2->num_rows > 0){
						while($row_2 = $res_2->fetch_object()){
							if ($row->funcionario_id_funcionario == $row_2->id_funcionario){
								print "<option value='{$row_2->id_funcionario}' selected>{$row_2->nome_funcionario}</option>";
							}else{
								print "<option value='{$row_2->id_funcionario}'>{$row_2->nome_funcionario}</option>";
							}
						}
					}else{
						print"<option>Não há funcionários</option>";
					}
				?>
			</select>
		</label>
	</div>

    <div class="mb-3">
		<label>Modelo
			<select name="modelo_id_modelo" class="form-control" required>
				<option>-= Escolha =-</option>
				<?php
					$sql_3 = "SELECT * FROM modelo";
					$res_3 = $conn->query($sql_3);
					if ($res_3->num_rows > 0){
						while($row_3 = $res_3->fetch_object()){
							if ($row->modelo_id_modelo == $row_3->id_modelo){
								print "<option value='{$row_3->id_modelo}' selected>{$row_3->nome_modelo}</option>";
							}else{
								print "<option value='{$row_3->id_modelo}'>{$row_3->nome_modelo}</option>";
							}
						}
					}else{
						print"<option>Não há modelos</option>";
					}
				?>
			</select>
		</label>
	</div>

    <div class="mb-3">
		<label>Data da Venda
			<input type="date" name="data_venda" class="form-control" value="<?php print $row->data_venda; ?>">
		</label>
	</div>

    <div class="mb-3">
		<label>Valor (R$)
			<input type="text" name="valor_venda" class="form-control" value="<?php print $row->valor_venda; ?>">
		</label>
	</div>

	<div>
		<button type="submit" class="btn btn-primary">Salvar Alterações</button>
	</div>
</form>