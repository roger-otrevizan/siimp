//Impedir envio ao pressionar ENTER
$('#search').keypress(function (e) {
    if (e.which == 13) {
        e.preventDefault();
        console.log('Não vou enviar');
    }
});


$(function () {
    $("#search").keyup(function () {
        let search = $(this).val();


        if (search != '') {
            var data = {
                word: search
            }
            $.post('scripts/user_search.php', data, function (retorno) {
                $('#tbody_xml').html(retorno);
            });

        }


    });
});