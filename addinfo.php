<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Авто-сервис</title>
    </head>
    <body>
        <div class = "topnav">
            <a href="index.php">Главная страница</a>
            <a href = "parts.php">Детали в ассортименте</a>
            <a class = "active" href = "addinfo.php">Редактировать ассортимент</a>
            <a href = "#sell_product">Продажи деталей</a>
        </div>
        <h2>
        <fieldset>
            <Legengd> Добавление деталей </Legengd>
                <form action="insert_t.php" method="post">
                    <p><input name="Name" size="50" type="text"> Название детали<br></p>
                    <?php 
                    $linkMY = mysqli_connect("localhost","root","root","farm") or die ("Невозможно подключиться к серверу"); 

                        mysqli_query($linkMY,'SET NAMES utf8'); // тип кодировки
                        mysqli_select_db($linkMY,"farm") or die ("Нет такой базы!");
                        
                        $namer = mysqli_query($linkMY,"select id,Name from mark;");
                        
                        echo "<select name = 'marks'>";
                        while($object = mysqli_fetch_object($namer))
                        {
                            echo "<option value = '$object->id' > $object->Name </option>";
                        }
                        echo "</select>"
                        ?>
                    <a>Марка автомобиля</a>
                    <p><input name="price" size="50" type="text"> Цена за шт.<br></p>
                    <p><input name="quantity" size="50" type="text"> В наличии<br></p>
                    <p><input name="add" type="submit" value="Добавить"></p>
                    <input name="b2" type="reset" value="Очистить"></p>
                </form>
        </fieldset>
        <fieldset>
            <Legengd> Добавление марки автомобиля </Legengd>
                <form action="add_mark.php" method="post">
                    <p><input name="Name" size="50" type="text"> Название марки<br></p>
                    <input name="myFile" type="file">Изображение марки<br>
                    <p><input name="add" type="submit" value="Добавить"></p>
                    <input name="b2" type="reset" value="Очистить"></p>
                </form>
        </fieldset>
        <fieldset>
            <Legengd> Изменение информации о детали </Legengd>
                <form action="edit_p.php" method="post">
                    <p><?php
                    $linkMY = mysqli_connect("localhost","root","root","farm") or die ("Невозможно подключиться к серверу"); 

                    mysqli_query($linkMY,'SET NAMES utf8'); // тип кодировки
                    mysqli_select_db($linkMY,"farm") or die ("Нет такой базы!");
                    
                    $namer = mysqli_query($linkMY,"SELECT ID,Name,(Select mark.Name from mark Where mark.ID = auto_parts.Mark_ID) as Mark,price,quantity FROM `auto_parts`");
                    
                    echo "<select name = 'id_edit'>";
                    while($object = mysqli_fetch_object($namer))
                    {
                        echo "<option value = '$object->ID' > $object->ID $object->Name $object->Mark price (Цена): $object->price quantity (В ассортименте): $object->quantity </option>";
                    }
                    echo "</select>";
                    ?>
                    <a>Деталь для редактирования</a>
                    </p>
                    
                    <p>
                    <?php
                    $linkMY = mysqli_connect("localhost","root","root","farm") or die ("Невозможно подключиться к серверу"); 

                    mysqli_query($linkMY,'SET NAMES utf8'); // тип кодировки
                    mysqli_select_db($linkMY,"farm") or die ("Нет такой базы!");
                    
                    $namer = mysqli_query($linkMY,"select COLUMN_NAME from INFORMATION_SCHEMA.columns where TABLE_NAME = 'auto_parts';");
                    
                    echo "<select name = 'edit_column'>";
                    while($object = mysqli_fetch_object($namer))
                    {
                        echo "<option value = '$object->COLUMN_NAME' > $object->COLUMN_NAME </option>";
                    }
                    echo "</select>"
                    ?>
                    <a>Столбец для изменения</a></p>
                    <p><input name = "newvalue" size = "50" type = "text"> Новое значение <br></p>
                    <p><input name="add" type="submit" value="Изменить"></p>
                    <input name="b2" type="reset" value="Очистить"></p>
                </form>
        </fieldset>
        <p></p>
        </h2>
        <h3>

        </h3>
    </body>
</html>