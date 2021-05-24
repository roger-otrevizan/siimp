<?php

include_once "connection.php";


//$sql_db = mysqli_query($con, "CREATE DATABASE IF NOT EXISTS db_siimp");


$sql_table = mysqli_query($con,"CREATE TABLE IF NOT EXISTS xml (
  id_xml INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  path_xml VARCHAR(255),
  value_xml LONGTEXT
)");
?>