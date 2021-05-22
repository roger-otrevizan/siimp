   <h5>Ler XML</h5>
   <hr>
   <br>
   <div class="container-fluid">

       <form id="upload_xml_form" method="POST" enctype="multipart/form-data" action="">

           <div class="row">
               <div class="col-md-1">
                   <span><b>Arquivo:</b></span>
               </div>

               <div id="file" class="col-md-4">
                   <input type="file" name="file_upload" accept=".xml">
               </div>

               <div class="col-md-2">
                   <button type="submit" id="upload_xml_btn" name="upload_xml_btn" class="btn btn-primary">Enviar</button>
               </div>
           </div>

       </form>

   </div>
   <script src="send_xml.js"></script>


   <?php

    $path =  simplexml_load_file('assets/xml/dataset.xml');
    $path_2 =  simplexml_load_file('assets/xml/fffffcff-ff49-43bd-93c0-5b9e30de2e73.xml');

    //print_r($path_2);

       
    $structure = $path;
    $elements = $structure->xpath('//ancestor::*');

    
    foreach ($elements as $element) {
        $node = dom_import_simplexml($element);
        echo ($node->getNodePath()) . '<br>'. '<br>';
        //echo $node->textContent . '<br>'. '<br>';;
        
    }
    

    /*
    $dom = new DOMDocument;

    $dom->loadXML(var_dump($path));

    foreach ($dom->getElementsByTagName('*') as $node) {
        echo $node->getNodePath() . "<br>";
    }
    */


   /*
   $xmlDoc = new DOMDocument();
   $xmlDoc->load('assets/xml/dataset.xml');

   $x = $xmlDoc->documentElement;
   foreach ($x->childNodes as $item) {
   print $item->nodeName . " = " . $item->nodeValue . "<br>";
   }
   */

   /*
   $doc = new DOMDocument();
   $doc->load('assets/xml/dataset.xml');
   $doc->saveXML();

   $dom = new DOMDocument;

   $dom->loadXML($doc);

   print_r($dom);

   foreach ($dom->getElementsByTagName('*') as $node) {
   echo $node->getNodePath() . "\n";
   }
   */

   ?>