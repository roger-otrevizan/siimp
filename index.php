<?php

include_once 'assets/db/connection.php';
include_once 'assets/db/create_db.php';

//Limpa o banco para envio de novo XML
$clear = mysqli_query($con, "TRUNCATE TABLE xml");


include_once 'header.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://use.fontawesome.com/7fa0f12d2b.js"></script>

    <link href="assets/css/custom.css" rel="stylesheet">

    <title>SIIMP Sistemas</title>

</head>

<body>
    <div class="container-fluid">

        <h5 style="margin-top: -30px;">
            <center>Ler XML</center>
        </h5>
        <hr>

        <div class="container-fluid">

            <form id="upload_xml_form" method="POST" enctype="multipart/form-data" action="">

                <div class="row">
                    <div class="col-md-4 text-end">
                        <label id="label-file"><b>Arquivo:</b></label>
                    </div>

                    <div id="file" class="col-md-4 text-center">
                        <input type="file" name="file_upload" accept=".xml">
                    </div>

                    <div class="col-md-3">
                        <button type="submit" id="upload_xml_btn" name="upload_xml_btn" class="btn btn-primary">Enviar</button>
                    </div>
                </div>

            </form>
        </div>

        <hr>
        <h5>
            <center>Resultado</center>
        </h5>
        <form method="POST" id="search_form" action="">
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3 text-end">
                    <div class="input-group rounded">
                        <input type="search" name="search" id="search" class="form-control rounded" placeholder="Pesquisar..." aria-label="Search" aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="fa fa-search"></i>
                        </span>

                    </div>
                </div>
            </div>
        </form>

        <script src="assets/js/search_table.js"></script>

        <div class="shadow p-2 mb-3 bg-body rounded">
            <table id="table_xml" class="table table-hover" style="text-align: center;">
                <thead class="table table-dark">
                    <tr>
                        <th scope="col">Caminho</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>

                <tbody id="tbody_xml">
                    <tr></tr>
                </tbody>

            </table>
        </div>

    </div>

    <script src="assets/js/send_xml.js"></script>

    <?php
    include_once 'footer.php';
    ?>
</body>

</html>