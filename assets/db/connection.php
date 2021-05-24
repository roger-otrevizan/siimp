<?php
	$servername = "localhost"; /*Host na qual o banco de dados está configurado*/
	$username = "root"; /*Usuário do banco de dados MySQL*/
	$password = ""; /*Senha do banco de dados MySQL*/

/**  Cria a conexão: https://www.w3schools.com/php/php_mysql_create.asp */
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Cria o banco de dados 'db_siimp', se não existir criado
$sql = "CREATE DATABASE IF NOT EXISTS db_siimp";
if ($conn->query($sql) === TRUE) {
  //echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;

}
// Cria a tabela, se não existir criado
$sql_table = mysqli_query($conn,"CREATE TABLE IF NOT EXISTS db_siimp.xml (
	id_xml INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	path_xml VARCHAR(255),
	value_xml LONGTEXT
  )");

?>