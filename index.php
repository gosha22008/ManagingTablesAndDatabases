<?php
require_once 'ConnectDb.php';
require_once 'functions.php';



newTable($pdo);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            display: table;
            border-collapse: separate;
            border-spacing: 2px;
            border-color: grey;
        }
        table {
            margin: 1em 20px 0 0;
            border: 0;
            border-top: 1px solid #999;
            border-left: 1px solid #999;
        }
        td, th {
            border: 0;
            border-right: 1px solid #999;
            border-bottom: 1px solid #999;
            padding: .2em .3em;
        }
        thead th {
            text-align: center;
            padding: .2em .5em;
        }
        thead td, thead th {
            background: #ddf;

        }

    </style>
</head>
<body>

<h3>Список таблиц в текущей базе данных(в <?= $db ?>)</h3>
<table>
    <tbody>
    <tr style="background-color: #ddf">
        <th>Name</th>
    </tr>
    <?php showTables($pdo,$db); ?>
    </tbody>
</table>

</body>
</html>
