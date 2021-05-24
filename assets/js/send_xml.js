$(document).ready(function () {
    $('#upload_xml_form').on('submit', function (event) {
        event.preventDefault();

        $.ajax({
            url: "scripts/send_xml.php",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            /*
            beforeSend: function () {
               
            },
            */
            success: function (data) {
                //$('#upload_xml_btn').attr('disabled', 'disabled');
                //$('#upload_xml_btn').text('Enviando...');
                $('#tbody_xml').html(data);
                
                $('#upload_xml_form')[0].reset();


                console.log("Enviado com sucesso...")
            }
        })

        /*
        setInterval(function () {
            $('#upload_xml_form')[0].reset();
            $('#upload_xml_btn').attr('disabled', false);
            $('#upload_xml_btn').text('Enviar');
        }, 1500);
        */

    });
});