<?php

include_once 'conection.php';

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

        <?php include_once 'insert.php'; ?>

        <br>
        <hr>
        <h5>Resultado</h5>

    <div id="message" disable> </div>

        <table class="table table-hover" style="text-align: center;">
            <thead class="table table-dark">
                <tr>
                    <th scope="col">Caminho</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>

            <?php foreach ($path_xml as $key => $value) { ?>

                <tbody>
                    <tr>
                        <td><?php echo $key ?></td>
                        <td><?php echo $value ?></td>
                    </tr>
                </tbody>

            <?php } ?>

        </table>

    </div>


</body>

<?php
include_once 'footer.php';
?>

</html>