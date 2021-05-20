<?php
$servidor = "localhost"; /*maquina a qual o banco de dados está*/
	$usuario = "roger"; /*usuario do banco de dados MySql*/
	$senha = "Rogelol2!"; /*senha do banco de dados MySql*/
	$banco = "db1"; /*seleciona o banco a ser usado*/

	$conexao = mysqli_connect($servidor,$usuario,$senha, $banco);  /*Conecta no bando de dados MySql*/
?>