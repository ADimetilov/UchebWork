<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title>Авто-сервис</title>
    </head>
    <body>
    <div class = "topnav">
            <a href="index.php">Главная</a>
            <a class = "active" href="#home">Редактирование</a>
    </div>

    <p>
<fieldset>
    <legend>Результаты поиска</legend>
        <fieldset>
            <legend>Удаление</legend>
            <form action = "delete.php" method = "POST">
            <?php
            $linkMY = mysqli_connect("localhost","root","root","farm") or die ("Невозможно подключиться к серверу"); 
            $value = $linkMY->real_escape_string($_POST["search"]);
            mysqli_query($linkMY,'SET NAMES utf8'); // тип кодировки
            mysqli_select_db($linkMY,"farm") or die ("Нет такой базы!");
                        
            $namer = mysqli_query($linkMY,"SELECT ID,Name,(Select mark.Name from mark Where mark.ID = auto_parts.Mark_ID) as Mark,price,quantity FROM `auto_parts`WHERE Name LIKE '%$value'");
                        
            echo "<select name = 'id_edit'>";
            while($object = mysqli_fetch_object($namer))
            {
                    echo "<option value = '$object->ID' > $object->ID $object->Name $object->Mark price (Цена): $object->price quantity (В ассортименте): $object->quantity </option>";
            }
            echo "</select>";
            ?>
            <a>Найденные детали</a>
            <p><input name="delete" type="submit" value="Удалить"></p>
            </form>
        </fieldset>
    <fieldset>
            <legend>Редактирование</legend>
            <form action = "edit_p2.php" method = "POST">
            <?php
            $linkMY = mysqli_connect("localhost","root","root","farm") or die ("Невозможно подключиться к серверу"); 
            $value = $linkMY->real_escape_string($_POST["search"]);
            mysqli_query($linkMY,'SET NAMES utf8'); // тип кодировки
            mysqli_select_db($linkMY,"farm") or die ("Нет такой базы!");
                        
            $namer = mysqli_query($linkMY,"SELECT ID,Name,(Select mark.Name from mark Where mark.ID = auto_parts.Mark_ID) as Mark,price,quantity FROM `auto_parts`WHERE Name LIKE '%$value'");
                        
            echo "<select name = 'id_edit'>";
            while($object = mysqli_fetch_object($namer))
            {
                    echo "<option value = '$object->ID' > $object->ID $object->Name $object->Mark price (Цена): $object->price quantity (В ассортименте): $object->quantity </option>";
            }
            echo "</select>";
            ?>
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
</fieldset>
<p></p>
</p>
</form>
    </body>
</html>