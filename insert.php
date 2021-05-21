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
                   <button type="submit" id="upload_xml_btn" name="upload_xml" class="btn btn-primary">Enviar</button>
               </div>
           </div>

       </form>

   </div>
   <script src="send_xml.js"></script>