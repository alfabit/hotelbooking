<?php
if(!isset($_POST["comment"])){
    return;
}

$comment = $_POST["comment"];


$myFile = "../config/comment.php";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $comment;
fwrite($fh, $stringData);
fclose($fh);

echo "<h1>Сохранено</h1><pre>$comment</pre>
";
?>
<a href="../index.php">Вернутся на сайт</a>
