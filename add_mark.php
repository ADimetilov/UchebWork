<?php
    $linkMY = mysqli_connect("localhost","root","root","farm") or die ("Невозможно подключиться к серверу");
    mysqli_query($linkMY,'SET NAMES utf8');
    $name = $linkMY->real_escape_string( $_POST["Name"]);
    $file = $linkMY->real_escape_string( $_POST["myFile"]);
    mysqli_query($linkMY,'use farm;');
    $insert = "INSERT INTO mark (Name,img) VALUES('$name','$file')";
    mysqli_query($linkMY,$insert);
    mysqli_close($linkMY);
    echo "<a href='addinfo.php'>Запрос выполнен,вернуться</a>";
    ?>