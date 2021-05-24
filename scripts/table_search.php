<?php

include_once '../assets/db/connection.php';

/* Retornar resultado da pesquisa para home:
*  CELKE modificado https://www.youtube.com/watch?v=lM42ZP3Ze-M
*/

//Recebe o retorno do que o usuário digitar na pesquisa e filtra
$search_users = filter_input(INPUT_POST, 'word', FILTER_SANITIZE_STRING);

// % é o caractere coringa que permite pesquar qualquer parte da palavra
$sql = "SELECT * FROM db_siimp.xml 
WHERE path_xml LIKE '%$search_users%' OR value_xml LIKE'%$search_users%'";

$result_search_users = mysqli_query($conn, $sql);

//Se houver resultados, injeta o resultado no html na <td>
//Onde o id da <tbody> foi passado no assets/js/search_table.js
if (($result_search_users) and ($result_search_users->num_rows != 0)) {
    while ($row_search = mysqli_fetch_assoc($result_search_users)) {
        echo '<tr>';
        echo    "<td>" . $row_search['path_xml'] . "</td>";
        echo    "<td>" . $row_search['value_xml'] . "</td>";
        echo '<tr>';
    }

//Senão retorna a mensagem NADA ENCONTRADO.
} else {
    die('
        <div class="alert alert-warning" role="alert">
            Nada encontrado.
        </div>
        ');
}