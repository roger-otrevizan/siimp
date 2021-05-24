<?php

include_once '../assets/db/connection.php';

//Função modificada que pega o caminho do node/tags/parents de um XML
include_once 'get_node_xpath.php';

//Limpa o banco para envio de novo XML
$clear = mysqli_query($con, "TRUNCATE TABLE xml");

function path_xml()
{

    if (isset($_FILES['file_upload']) && ($_FILES['file_upload']['error'] == UPLOAD_ERR_OK)) {
        return $xml = simplexml_load_file($_FILES['file_upload']['tmp_name']);
    } else {
        die('
        <div class="alert alert-danger" role="alert">
            Envie um arquivo xml.
        </div>
        ');
    }
}

$path = path_xml();

$structure = $path;

$elements_attr = $structure->xpath('//@*');
$elements_value = $structure->xpath('//*');

/*

if (!is_null($elements_attr)) {
    foreach ($elements_attr as $element_attr) {
        $node = dom_import_simplexml($element_attr);

        if (($element_attr != "") && ($element_attr != null)) {

            $xml_path_attr  = getNodeXPath($node);
?>
            <tr>
                <td><?php echo $xml_path_attr  ?></td>
                <td><?php echo $element_attr ?></td>
            </tr>
<?php
            $conn = mysqli_query($con, "INSERT INTO xml (path_xml, value_xml) VALUES ('$xml_path_attr ','$element_attr')");
        } else {
            echo null;
        }
    }
}
*/

if (!is_null($elements_value)) {
    foreach ($elements_value as $element_value) {
        $node = dom_import_simplexml($element_value);

        if (($element_value != '')
            //&& !empty($element_value)
            //&& ($node->parentNode->nodeValue != '')
        ) {

            $xml_path_value = getNodeXPath($node);
?>
            <tr>
                <td><?php echo $xml_path_value ?></td>
                <td><?php echo $element_value ?></td>
            </tr>
<?php
            $conn = mysqli_query($con, "INSERT INTO xml (path_xml, value_xml) VALUES ('$xml_path_value','$element_value')");
        } else {
            echo null;
        }
    }
}

/*
$db_search = mysqli_query($conexao, "SELECT * FROM xml");

while ($res_db = mysqli_fetch_array($db_search)) {
?>
    
<?php
}
*/
?>