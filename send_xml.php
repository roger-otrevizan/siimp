<?php

include_once 'assets/db/conection.php';

//Limpa o banco para envio de novo XML
$clear = mysqli_query($con, "TRUNCATE TABLE xml");

function path_xml()
{

    if (isset($_FILES['file_upload']) && ($_FILES['file_upload']['error'] == UPLOAD_ERR_OK)) {
        return $xml = simplexml_load_file($_FILES['file_upload']['tmp_name']);
    } else
        die("Envie um arquivo!");
}

$path = path_xml();
//$path =  simplexml_load_file('assets/xml/dataset.xml');
//$path_2 =  simplexml_load_file('assets/xml/fffffcff-ff49-43bd-93c0-5b9e30de2e73.xml');

$structure = $path;

$elements_attr = $structure->xpath('//@*');
$elements_value = $structure->xpath('//*');

/*
    if (!is_null($elements_attr)) {
        foreach ($elements_attr as $element_attr) {
            $node = dom_import_simplexml($element_attr);

            if (($element_attr != "") && ($element_attr != null)) {

                echo ($node->getNodePath()) . '  -----------------------  ' . $element_attr . "</br>";
            } else {
                echo null;
            }
        }
    }
    */

if (!is_null($elements_value)) {
    foreach ($elements_value as $element_value) {
        $node = dom_import_simplexml($element_value);

        if (($element_value != "") && ($element_value != null)) {

            $path_xml = $node->getNodePath();
            //echo $path_xml;
?>
            <tr>
                <td><?php echo $path_xml ?></td>
                <td><?php echo $element_value ?></td>
            </tr>
<?php
            $conn = mysqli_query($con, "INSERT INTO xml (path_xml, value_xml) VALUES ('$path_xml','$element_value')");
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