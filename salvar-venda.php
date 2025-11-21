<h1>Salvar Venda</h1>
<?php
	switch ($_REQUEST['acao'])	{
		case 'cadastrar':
		$cliente = $_POST['cliente_id_cliente'];
		$funcionario = $_POST['funcionario_id_funcionario'];
		$modelo = $_POST['modelo_id_modelo'];
		$data = $_POST['data_venda'];
		$valor = $_POST['valor_venda'];

		$sql = "INSERT INTO venda (cliente_id_cliente, funcionario_id_funcionario, modelo_id_modelo, data_venda, valor_venda) VALUES ({$cliente}, {$funcionario}, {$modelo}, '{$data}', '{$valor}')";

		$res = $conn->query($sql);

		if($res == true){
			print "<script>alert('Cadastrou com sucesso');</script>";
			print "<script>
				location.href='?page=listar-venda';</script>";
		}else{
			print "<script>alert('Não cadastrou');</script>";
			print "<script>
				location.href='?page=listar-venda';</script>";
		}
		break;

		case 'editar':
		$cliente = $_POST['cliente_id_cliente'];
		$funcionario = $_POST['funcionario_id_funcionario'];
		$modelo = $_POST['modelo_id_modelo'];
		$data = $_POST['data_venda'];
		$valor = $_POST['valor_venda'];


		$sql = "UPDATE venda SET cliente_id_cliente={$cliente}, funcionario_id_funcionario={$funcionario}, modelo_id_modelo={$modelo}, data_venda='{$data}', valor_venda='{$valor}' WHERE id_venda = ".$_REQUEST['id_venda'];

		$res = $conn->query($sql);

		if($res == true){
			print "<script>alert('Editou com sucesso');</script>";
			print "<script>
				location.href='?page=listar-venda';</script>";
		}else{
			print "<script>alert('Não Editou');</script>";
			print "<script>
				location.href='?page=listar-venda';</script>";
		}
		break;

		case 'excluir':

		$sql = "DELETE FROM venda WHERE id_venda = ".$_REQUEST['id_venda'];

		$res = $conn->query($sql);

		if($res == true){
			print "<script>alert('Excluiu com sucesso');</script>";
			print "<script>
				location.href='?page=listar-venda';</script>";
		}else{
			print "<script>alert('Não excluiu');</script>";
			print "<script>
				location.href='?page=listar-venda';</script>";
		}
		break;
	}