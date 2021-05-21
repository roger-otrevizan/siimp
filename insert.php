   <h5>Ler XML</h5>
   <hr>
   <br>
   <div class="container-fluid">

       <form  method="POST" enctype="multipart/form-data" action="send_xml.php">

           <div class="row">
               <div class="col-md-1">
                   <span><b>Arquivo:</b></span>
               </div>

               <div id="file" class="col-md-4">
                   <input type="file" name="fileUpload" accept=".xml">
               </div>

               <div class="col-md-2">
                   <button type="submit" id="uploadXML" name="uploadXML" class="btn btn-primary">Inserir</button>
               </div>
           </div>

       </form>

   </div>