<?php
if(isset($_COOKIE['posts_success'])){
    echo $_COOKIE['posts_success'];
    echo $_COOKIE['comments_success'];
}
if(isset($_COOKIE['less3'])){
    echo $_COOKIE['less3'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузить в базу данных</title>
</head>

<body>
    <main>
    <h1>Страница загрузки в базу данных</h1>
    <form action="conf.php" method="post" name="uploadForm">
    <button type="submit" name="getInfo">Подгрузить в базу данных</button>
</form>
<h2>Найти слово</h2>
    <form action="try.php" method="post" name="searchForm">
        <input type="text" name="search_text" minlength="3" placeholder="Поиск по слову"/>
        <button type="submit">Найти</button>

</form>
</main>
</body>
</html>
