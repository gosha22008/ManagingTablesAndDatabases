<?php
require_once 'ConnectDb.php';
require_once 'functions.php';
$result = '';

if (isset($_POST['delete']) and !empty($_POST['field'])) {
    if (deleteField($pdo, $_POST['field'], $_GET['describe'])) {
        $result = 'удалено';
        redirect('table', $_GET['describe']);
    } else {
        $result = 'неудачно';
    }
}

if (isset($_POST['save']) and !empty($_POST['new_name'])) {
    if (changeName($pdo, $_POST['field'], $_POST['new_name'], $_GET['describe'], $_POST['type'])) {
        $result = 'имя успешно сменилось';
        redirect('table', $_GET['describe']);
    } else {
        $result = 'неудачно';
    }
}

if (isset($_POST['new_type']) and !empty($_POST['newType'])) {
    if (changeType($pdo, $_POST['field'], $_POST['newType'], $_GET['describe'])) {
        redirect('table', $_GET['describe']);
    } else {
        $result = 'неудачно';
    }
}


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

<h3>Таблица <?php echo $_GET['describe'] ?> </h3>
        <a href=" index.php">НА ГЛАВНУЮ</a>


<table>
    <tbody>
    <tr style="background-color: #ddf">
        <th>Field</th>
        <th>Type</th>
        <th>Change Type</th>
        <th>Change Name</th>
        <th>Delete</th>
    </tr>
    <?php describeTable($pdo, $_GET['describe']); ?>
    </tbody>
</table>


<?= $result ?>
</body>
</html>

