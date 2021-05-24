$(document).ready(function () {
    $('#upload_xml_form').on('submit', function (event) {
        /*  Impede o comportamento padrão do form ao clicar no botão enviar,
         *  Pois é enviado via AJAX abaixo
         */
        event.preventDefault();

        $.ajax({
            url: "scripts/send_xml.php",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                $('#tbody_xml').html(data);

                $('#upload_xml_form')[0].reset();

                console.log("Enviado com sucesso...")
            }
        })

    });
});