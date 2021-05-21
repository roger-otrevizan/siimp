$(document).ready(function(){
    $('#upload_xml_form').on('submit', function(event){
     event.preventDefault();
   
     $.ajax({
      url:"send_xml.php",
      method:"POST",
      data: new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
       $('#upload_xml_btn').attr('disabled','disabled'),
       $('#upload_xml_btn').val('Enviando...');
      },
      success:function(data)
      {
       
       $('#message').html(data);
       $('#upload_xml_form')[0].reset();
       $('#upload_xml_btn').attr('disabled', false);
       $('#upload_xml_btn').val('Enviar');
       
      console.log("Sucesso...")
      }
     })
    
    /*
     setInterval(function(){
      $('#message').html('');
     }, 5000);
    */
    });
   });