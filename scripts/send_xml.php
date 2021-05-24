<?php

include_once '../assets/db/connection.php';

/* -------------------------  CORE do sistema -------------------------------------

*   Existem várias formas de receber e validar um arquivo XML.
*   
*   Nesse sistema foi optado por:
*   - Carregá-lo temporariamente em um objeto com o método simplexml_load_file()
        e o retorno de $_FILES[];
*   - Usar uma expressão XPath para selecionar nós ou conjuntos de nós em um documento XML;
*   - Usar a função dom_import_simplexml() para pegar o nó da classe SimpleXML 
        e o transformá-lo em um DOMElement;
*   
*   - Com isso seria possível pegar o caminho do nó percorrendo o DOMElement 
        com a função getNodePath(), MAS para arquivos XML que contenham NAMESPACES,
        não funciona e é retornado o caractere coringa na expressão.
        OUTPUT: "/*//*[5]/*[3]/*[4]".

        Isso é explicado aqui:
        https://stackoverflow.com/questions/33217377/getnodepath-not-showing-elements/33501809#33501809

        e aqui:
        https://stackoverflow.com/questions/41607008/php-dom-get-node-path-from-xml-does-not-return-tag-names/41613492#41613492

        Uma solução seria remover o namespace do XML antes de percorrê-lo, como mostrado aqui:
        https://stackoverflow.com/questions/15223224/how-to-remove-all-namespaces-from-xml-in-php-tags-and-attributes/18994815#18994815

        Contudo, por razões de integridade foi optado a usar a função criada por Sina.Salek.ws
        que está descrita no arquivo: scripts/get_node_xpath.

        Desse modo, com a função getNodeXPath($node), obtém-se o caminho e 
        com o retorno do XPath, o valor do elemento.

---------------------------------------------------------------------------------- */

//Função modificada que pega o caminho do node/tags/parents de um XML
include_once 'get_node_xpath.php';

//Limpa o banco para envio de novo XML
$clear = mysqli_query($conn, "TRUNCATE TABLE db_siimp.xml");


/* Funcção que retorna o XML, após ser enviado pelo user, modificado de:

*   https://www.youtube.com/watch?v=nZo5gPTOWnw
*   https://www.youtube.com/watch?v=qSnQ9Sx4ZJ8
*   http://www.devwilliam.com.br/php/aprenda-como-ler-arquivos-xml-com-php
*   https://wallacemaxters.com.br/blog/2021/02/19/simplexml-manipulando-xml-com-php

*/
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

/*  Esse trecho envia o caminho e valor para a table, além de salvar no banco para futura pesquisa
    Modificado de:
 
*   https://stackoverflow.com/questions/20928367/php-xml-find-out-the-path-to-a-known-value/20934722#20934722
*   https://www.w3schools.com/xml/xpath_syntax.asp
*   https://www.php.net/manual/pt_BR/domnode.getnodepath.php
*   
*  

*/
$path = path_xml();

$structure = $path;

$elements_value = $structure->xpath('//*');

if (!is_null($elements_value)) {
    foreach ($elements_value as $element_value) {
        $node = dom_import_simplexml($element_value);

        // Verifica se o elemento têm valor e o valor é difente de PHP_EOL (↵), 
        //  para trazer somente o último caminho
        if ( ($element_value != '') && ($element_value != PHP_EOL) ) {

            $xml_path_value = getNodeXPath($node);
?>
            <!-- Injeta o caminho e valor no <tbody> -->
            <tr>
                <td><?php echo $xml_path_value ?></td>
                <td><?php echo $element_value ?></td>
            </tr>
<?php
            //  Salva o caminho e valor no banco db_siimp.xml
            $sql = mysqli_query($conn, "INSERT INTO db_siimp.xml (path_xml, value_xml) VALUES ('$xml_path_value','$element_value')");
        } else {
            echo null;
        }
    }
}

//  Nessa parte tentei pegar os atributos de XML que tenham tag com autofechamento
//$elements_attr = $structure->xpath('//@*');
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
            $conn = mysqli_query($con, "INSERT INTO db_siimp.xml (path_xml, value_xml) VALUES ('$xml_path_attr ','$element_attr')");
        } else {
            echo null;
        }
    }
}
*/

/* Caso o retorno fosse feito pelo banco, por questões de performance não foi utilizado
$db_search = mysqli_query($conexao, "SELECT * FROM xml");

while ($res_db = mysqli_fetch_array($db_search)) {
?>
    
<?php
}
*/
?>