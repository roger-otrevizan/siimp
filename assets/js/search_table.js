/* Impedir envio ao pressionar ENTER:
*  https://pt.stackoverflow.com/questions/137584/bloquear-o-enter-dentro-de-um-input/137588#137588
*/
$('#search').keypress(function (e) {
    if (e.which == 13) {
        e.preventDefault();
        console.log('Não vou enviar');
    }
});

/* Enviar pesquisa para scripts/table_search.php:
*  CELKE modificado https://www.youtube.com/watch?v=lM42ZP3Ze-M
*/
$(function () {
    $("#search").keyup(function () {
        let search = $(this).val();


        if (search != '') {
            var data = {
                word: search
            }
            $.post('scripts/table_search.php', data, function (retorno) {
                $('#tbody_xml').html(retorno);
            });

        }


    });
});