<?php
    $linkMY = mysqli_connect("localhost","root","root","farm") or die ("Невозможно подключиться к серверу");
    mysqli_query($linkMY,'SET NAMES utf8');
    $name = $linkMY->real_escape_string( $_POST["Name"]);
    $price = $linkMY->real_escape_string($_POST["price"]);
    $Mark = $linkMY->real_escape_string($_POST["marks"]);
    $quantity = $linkMY->real_escape_string( $_POST["quantity"]);
    mysqli_query($linkMY,'use farm;');
    $insert = "INSERT INTO auto_parts (name,Mark_ID,price,quantity) VALUES('$name', '$Mark','$price', '$quantity')";
    mysqli_query($linkMY,$insert);
    mysqli_close($linkMY);
    echo "<a href='addinfo.php'>Запрос выполнен,вернуться</a>";
    ?>