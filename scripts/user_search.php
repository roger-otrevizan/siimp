<?php

include_once '../assets/db/connection.php';


$search_users = filter_input(INPUT_POST, 'word', FILTER_SANITIZE_STRING);

$sql = "SELECT * FROM xml 
WHERE path_xml LIKE '%$search_users%' OR value_xml LIKE'%$search_users%'";

$result_search_users = mysqli_query($con, $sql);

if (($result_search_users) and ($result_search_users->num_rows != 0)) {
    while ($row_search = mysqli_fetch_assoc($result_search_users)) {
        echo '<tr>';
        echo    "<td>". $row_search['path_xml'] ."</td>";
        echo    "<td>". $row_search['value_xml'] ."</td>";
        echo '<tr>';

    }
} else {
    die('
        <div class="alert alert-warning" role="alert">
            Nada encontrado.
        </div>
        ');
}
