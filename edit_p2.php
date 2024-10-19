<?php
    $linkMY = mysqli_connect("localhost","root","root","farm") or die ("Невозможно подключиться к серверу");
    mysqli_query($linkMY,'SET NAMES utf8');
    $id = $linkMY->real_escape_string( $_POST["id_edit"]);
    $column = $linkMY->real_escape_string($_POST["edit_column"]);
    $value = $linkMY->real_escape_string($_POST["newvalue"]);
    mysqli_query($linkMY,'use farm;');
    $insert = "Update auto_parts Set $column = $value where ID = $id";
    mysqli_query($linkMY,$insert);
    mysqli_close($linkMY);
    echo "<a href='parts.php'>Запрос выполнен,вернуться</a>";
    ?>