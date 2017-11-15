<?php
include_once 'ConnectDb.php';

function newTable($pdo)
{
    $sql = "DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(50) NOT NULL,
`estimation` float NOT NULL,
`budget` tinyint(4) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $statement = $pdo->prepare($sql);
    return $statement->execute();
}

function showTables($pdo)
{
    $sql = "SHOW TABLES";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    while ($row = $statement->FETCH(PDO::FETCH_ASSOC)) { ?>

        <tr>
            <td>
                <a href="table.php?describe=<?= $row['Tables_in_managingtablesanddatabases'] ?>"><?= $row['Tables_in_managingtablesanddatabases'] ?></a>
            </td>
        </tr>

    <?php }
}

function redirect($action, $name)
{
    header('Location: ' . $action . '.php?describe=' . $name);
    die;
}

function changeType($pdo, $field, $type, $table)
{
    $sql = "ALTER TABLE $table CHANGE $field $field $type";
    $statement = $pdo->prepare($sql);
    return $statement->execute();
}

function changeName($pdo, $oldName, $newName, $table, $type)
{
    $sql = "ALTER TABLE $table CHANGE $oldName $newName $type ";
    $statement = $pdo->prepare($sql);
    return $statement->execute();
}

function deleteField($pdo, $field, $table)
{
    $sql = "ALTER TABLE $table DROP COLUMN $field";
    $statement = $pdo->prepare($sql);
    return $statement->execute();
}

function describeTable($pdo, $name)
{
    $sql = "DESCRIBE $name";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    while ($row = $statement->FETCH(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?= $row['Field'] ?> </td>
            <td><?= $row['Type'] ?></td>
            <td>
                <form method="post">
                    <select name="newType">
                        <option value="tinyint">tinyint</option>
                        <option value="int">int</option>
                        <option value="float">float</option>
                        <option value="varchar(50)">varchar</option>
                        <option value="text">text</option>
                        <option value="DATE">date</option>
                        <input name="field" value="<?= $row['Field'] ?>" type="hidden">
                        <input type="submit" name="new_type" value="изменить тип">
                    </select>
                </form>
            </td>
            <td>
                <form method="POST">
                    <input name="type" value="<?= $row['Type'] ?>" type="hidden">
                    <input name="field" value="<?= $row['Field'] ?>" type="hidden">
                    <input name="new_name" placeholder="новое имя" value="" type="text">
                    <input name="save" value="Сохранить" type="submit">
                </form>
            </td>
            <td>
                <form method="POST">
                    <input name="field" value="<?= $row['Field'] ?>" type="hidden">
                    <input name="delete" value="Удалить" type="submit">
                </form>

            </td>
        </tr>

    <?php }
}