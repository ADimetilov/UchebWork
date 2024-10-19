<?php
    $linkMY = mysqli_connect("localhost","root","root","farm") or die ("Невозможно подключиться к серверу");
    mysqli_query($linkMY,'SET NAMES utf8');
    $id = $linkMY->real_escape_string( $_POST["id_edit"]);
    mysqli_query($linkMY,'use farm;');
    $insert = "DELETE from auto_parts where ID = $id";
    mysqli_query($linkMY,$insert);
    mysqli_close($linkMY);
    echo "<a href='parts.php'>Запрос выполнен,вернуться</a>";
?>