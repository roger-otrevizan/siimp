<?php
/**

 *  By Sina.Salek.ws
 *  Modified by Roger O. Trevizan - removed nodeTagIndex
 *  https://www.php.net/manual/en/book.dom.php#87471
 *  https://stackoverflow.com/questions/3615362/which-php-dom-object-has-the-getnodepath-method/3615385#3615385
 *  
 *  result sample : /html[1]/body[1]/span[1]/fieldset[1]/div[1]
 *  @return string
 */
function getNodeXPath($node)
{
    $result = '';
    while ($parentNode = $node->parentNode) {
        $nodeIndex = -1;
        //$nodeTagIndex = 0; //original
        do {
            $nodeIndex++;
            $testNode = $parentNode->childNodes->item($nodeIndex);

            if ($testNode->nodeName == $node->nodeName and $testNode->parentNode->isSameNode($node->parentNode) and $testNode->childNodes->length > 0) {
                //echo "{$testNode->parentNode->nodeName}-{$testNode->nodeName}-{}<br/>";
                //$nodeTagIndex++; //original
            }
        } while (!$node->isSameNode($testNode));

        //$result = "/{$node->nodeName}[{$nodeTagIndex}]" . $result; //original
        $result = "/{$node->nodeName}" . $result; //modified

        $node = $parentNode;
    };
    return $result;
}
?>