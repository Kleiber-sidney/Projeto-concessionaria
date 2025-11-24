<h1>Listar Vendas</h1>
<?php
	$sql = "SELECT 
    ve.id_venda,
    ve.valor_venda,
    ve.data_venda,
    cl.nome_cliente AS nome_cliente,     
    fu.nome_funcionario AS nome_funcionario, 
    mo.nome_modelo AS nome_modelo   
FROM venda AS ve
INNER JOIN cliente AS cl
    ON cl.id_cliente = ve.cliente_id_cliente
INNER JOIN funcionario AS fu
    ON fu.id_funcionario = ve.funcionario_id_funcionario
INNER JOIN modelo AS mo
    ON mo.id_modelo = ve.modelo_id_modelo";

	$res = $conn->query($sql);

	$qtd = $res->num_rows;

	if ($qtd > 0) {
		print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Cliente</th>";
		print "<th>Funcionario</th>";
		print "<th>Modelo</th>";
		print "<th>Data</th>";
		print "<th>Valor</th>";
		print "<th>Acões</th>";
		print "</tr>";
		while ($row = $res->fetch_object()) {
			print "<tr>";
			print "<td>".$row->id_venda."</td>";
			print "<td>".$row->nome_cliente."</td>";
			print "<td>".$row->nome_funcionario."</td>";
			print "<td>".$row->nome_modelo."</td>";
			print "<td>".$row->data_venda."</td>";
			print "<td>".$row->valor_venda."</td>";
			print "<td>
					<button class='btn btn-success' onclick=\"location.href='?page=editar-venda&id_venda={$row->id_venda}';\">
						editar</button>

					<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-venda&acao=excluir&id_venda={$row->id_venda}';}else{false;}\">
						excluir</button>
					</tr>";
			print "</tr>";		
		}
		print "</table>";
	}else{
		print "<p>Não encontrou resultado</p>";
	}