<?php
	
	ob_start();
	session_start();

	include('conexao.php');
	$conexao = Conexao();

	//RESULTADO QUE SERÁ EXIBIDO NA DIV DE ID=textDiv.
	$resultado =  array();

	//PEGANDO ID DO USUARIO PARA ATUALIZAR.
	$email = $_SESSION['usuarioSession'];
	$cliente = $conexao->prepare("SELECT * FROM cliente WHERE  email = :email");
	$cliente->bindValue(":email",$email);
	$cliente->execute();
	$linha=$cliente->fetch(PDO::FETCH_ASSOC);
	$id_cliente= $linha['id_cliente'];

	//RECEBENDO OS DADOS.
	$nome = $_POST['nome'];
	$senhaA = $_POST['senhaA'];
	$senha = $_POST['senha'];

	//VERIFICA E ATUALIZANDO OS DADOS.
	//Verifico se os campos não estão vazios, para pegar a senha do cliente.
	if (!empty($senhaA)) {
		$verificaSenhaA = $conexao->prepare("SELECT `senha` FROM `cliente` WHERE `id_cliente` = :cliente");
		$verificaSenhaA->bindValue(":cliente",$id_cliente);
		$verificaSenhaA->execute();
		$arraySenha = $verificaSenhaA->fetch(PDO::FETCH_ASSOC);
		$senhaBanco = $arraySenha['senha'];

		//Compara as senha que veio do banco de dados com a senha que o cliente digitou para então alterar os dados.
		if ($senhaBanco == $senhaA) {
			if (!empty($nome) && !empty($senha)) {
				$atualizaCliente = $conexao->prepare("UPDATE `cliente` SET `nome` = :nome , `senha` = :senha WHERE `id_cliente` = :cliente");
				$atualizaCliente->bindValue(":nome",$nome);
				$atualizaCliente->bindValue(":senha",$senha);
				$atualizaCliente->bindValue(":cliente",$id_cliente);
				$atualizaCliente->execute();
				$resultado['status'] = 1;
			} elseif (!empty($nome) && empty($senha)) {
				$atualizaCliente = $conexao->prepare("UPDATE `cliente` SET `nome` = :nome WHERE `id_cliente` = :cliente");
				$atualizaCliente->bindValue(":nome",$nome);
				$atualizaCliente->bindValue(":cliente",$id_cliente);
				$atualizaCliente->execute();
				$resultado['status'] = 4;
			} elseif (!empty($senha) && empty($nome)) {
				$atualizaCliente = $conexao->prepare("UPDATE `cliente` SET `senha` = :senha WHERE `id_cliente` = :cliente");
				$atualizaCliente->bindValue(":senha",$senha);
				$atualizaCliente->bindValue(":cliente",$id_cliente);
				$atualizaCliente->execute();
				$resultado['status'] = 5;
			} else {
				$resultado['status'] = 6;
			}
		} else {
			$resultado['status'] = 2;
		}
	} else {
		$resultado['status'] = 3;
	}

	//Mandar o $resultado para o JS
	header('Content-type: application/json');

	echo json_encode($resultado);

?>