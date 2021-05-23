/*
$(document).ready(function () {
    $('#search_form').on('submit', function (event) {
        if ((e.keyCode === 10) || (e.keyCode === 13)) {
            event.preventDefault();
            //return false;
        }
    });
});
*/

$(function () {
    $("#search").keyup(function () {
        let search = $(this).val();


        if (search != '') {
            var data = {
                word: search
            }
            $.post('user_search.php', data, function (retorno) {
                $('#tbody_xml').html(retorno);
            });

        }
    });
});