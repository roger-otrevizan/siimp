<body>
    <h5>Ler XML</h5>
     <hr>
    <br>
    <div class="container-fluid">

    <form id="insert" method="POST" action="">

    
     <div class="row">
      <div class="col-md-3">
        <h5>Arquivo:</h5>
      </div>
      
      <div id="file" class="col-md-5">
       <input type="file" name="file" accept=".xml">
      </div>
      
      <div class="col-md-2">
       <button type="submit" id="insert_xml" name="import" class="btn btn-primary">Inserir</button>
      </div>
     </div>
        
    </form>
   
</div>

<?php 

    $caminho = "schema.xml";

    $xml = simplexml_load_file($caminho);

    foreach ($xml -> item as $item) {
        echo "<strong>Título:</strong> "
        .utf8_decode($item -> title)."<br />";
        die();
    }

    print_r ($xml);
    

?>