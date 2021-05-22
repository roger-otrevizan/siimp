<?php

include_once 'header.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="assets/css/custom.css" rel="stylesheet">




    <title>SIIMP Sistemas</title>

</head>

<body>
    <br>
    <div class="container-fluid">

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
        

        <hr>
        <h5>Resultado</h5>

        <div id="message" disable> </div>

        

        <table class="table table-hover responsive-table" style="text-align: center;">
            <thead class="table table-dark">
                <tr>
                    <th scope="col">Caminho</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>

            <tbody id="table_xml">
                <tr></tr>
            </tbody>

        </table>

    </div>
    <script src="assets/js/send_xml.js"></script>
    

</body>

<?php
include_once 'footer.php';
?>

</html>