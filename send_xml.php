<?
#define o encoding do cabeçalho para utf-8
@header("Content-Type: text/html; charset=utf-8");
#carrega o arquivo XML e retornando um Objeto
$xml = simplexml_load_file("schema.xml");
# se o xml for um link e nao um arquivo como livros.xml, troque -o pelo link ex.
# $xml = simplexml_load_file(“http://endereco/link/mesmoQueNaoTenhaExtensaoXML/“);
#para cada nó LIVRO  atribui à variavel $livro (obj simplexml)
foreach($xml->schema as $schema)
{
 echo $livro->cod;
#usando o utf8_decode para exibir co
echo $livro->titulo;
echo $livro->autor;
echo $livro->descricao;
echo $livro->preco;
echo "<br>";
}
?>