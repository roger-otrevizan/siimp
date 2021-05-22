<?php

/*$dir = "assets//";

$file = $_FILES["fileUpload"];

if (move_uploaded_file($file["tmp_name"], "$dir/" . $file["name"])) {
    echo "Arquivo enviado com sucesso!";
} else {
    echo "Erro, o arquivo n&atilde;o pode ser enviado.";
}*/

/*if (isset($_FILES['fileUpload'])) {
    date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

    $ext = strtolower(substr($_FILES['fileUpload']['name'], -4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = 'uploads/'; //Diretório para uploads

    move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir . $new_name); //Fazer upload do arquivo
}*/

/*
$arqName = $_FILES['fileUpload']['name'];
$arqTemp = $_FILES['fileUpload']['tmp_name'];
$pasta = "assets//";
// Pega a extensão do arquivo enviado
$extensao = strtolower(end(explode('.', $arqName)));
// Define o novo nome do arquivo usando um UNIX TIMESTAMP
$nome = time() . '.' . $extensao;

$upload = move_uploaded_file($arqTemp, $pasta . $nome);*/

/*
if (isset($_POST['uploadXML'])) {
    $formatosPermitidos = array("xml", "XML");
    $extensao = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
    if (in_array($extensao, $formatosPermitidos)) {
        $pasta = "assets/";
        $temporario = $_FILES['fileUpload']['tmp_name'];
        $novoNome = uniqid() . ".$extensao";
        if (move_uploaded_file($temporario, $pasta . $novoNome)) {
            $mensagem = "Upload feito com sucesso";
        } else {
            $mensagem = "Erro, não foi possível fazer o upload";
        }
    } else {
        $mensagem = "Formato Inválido";
    }
}*/

/*$xml = simplexml_load_file($pasta . $novoNome);
echo $pasta . $novoNome;
*/

/*
if (isset($_POST['uploadXML'])) {
    copy($_FILES['fileUpload']['tmp_name'], 
    "assets/".$_FILES['fileUpload']['name']);
}
*/

function path_xml() {

    if (isset($_FILES['file_upload']) && ($_FILES['file_upload']['error'] == UPLOAD_ERR_OK)) {
        return $xml = simplexml_load_file($_FILES['file_upload']['tmp_name']);                        
    }
}

//$xml = simplexml_load_file($_FILES['fileUpload']['tmp_name']);

//$path = "assets/fffffcff-ff49-43bd-93c0-5b9e30de2e73.xml";

$path =  simplexml_load_file('assets/xml/dataset.xml');

//$path = path_xml();

//print_r($path);

/*
$dom = new DOMDocument();
$dom->loadXml("assets/xml/dataset.xml");
$xpath = new DOMXpath($dom);

$nodes = $xpath->evaluate('//child');

foreach ($nodes as $node) {
  var_dump($node->getNodePath());
}


$structure = simplexml_load_string($path);
$elements = $structure->xpath('//child');

foreach ($elements as $element) {
  $node = dom_import_simplexml($element);
  var_dump($node->getNodePath());
}

/*
$xml = simplexml_load_file($path); //or die("Erro: não foi possível abrir o XML.");


foreach ($xml->children() as $item) {
    //echo "<strong>Título:</strong> " . $item . "<br />";
    //print_r($item);
    var_dump($item);
}
*/