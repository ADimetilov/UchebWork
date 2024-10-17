<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Авто-сервис</title>
    </head>
    <body>
        <div class = "topnav">
            <a href="index.php">Главная страница</a>
            <a class = "active" href = "parts.php">Детали в ассортименте</a>
            <a href = "addinfo.php">Редактировать ассортимент</a>
            <a href = "#sell_product">Продажи деталей</a>
        </div>
        <h2>
            <?php
            $linkMY = mysqli_connect("localhost","root","root","farm");
            mysqli_query($linkMY,"SET NAMES UTF8");
            mysqli_select_db($linkMY, "farm") or die("Нет такой базы!");

            $namer = mysqli_query($linkMY, "Select COLUMN_NAME from INFORMATION_SCHEMA.columns where Table_name = 'auto_parts';");
            $query = mysqli_query($linkMY,"SELECT ID,Name,(Select mark.Name from mark Where mark.ID = auto_parts.Mark_ID) as Mark,price,quantity FROM `auto_parts`");
            
            echo "<table border = '1'>";
            echo "<tr>";
            echo "<td> ID </td>";
            echo "<td> Название </td>";
            echo "<td> Марка </td>";
            echo "<td> Цена </td>";
            echo "<td> Кол-во в наличии </td>";
            echo "</tr>";
            while ($result = mysqli_fetch_assoc($query))
            {
                echo "<tr>";
                echo "<td> {$result['ID']}</td>";
                echo "<td> {$result['Name']}</td>";
                echo "<td> {$result['Mark']}</td>";
                echo "<td> {$result['price']}</td>";
                echo "<td> {$result['quantity']}</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_close($linkMY);
            ?>
        </h2>
    </body>
</html>