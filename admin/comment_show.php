<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Коментарий внизу формы печати счёта:</h2>
        <form action="comment_save.php" method="POST">
        <textarea name="comment" cols="120" rows="20">
<?php
include '../config/comment.php';
?>
</textarea>
            <br/>
            <input type="submit" value="Сохранить"/>
        </form>
        <a href="../index.php">Вернутся на сайт</a>
    </body>
</html>
