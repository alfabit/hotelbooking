<?php
  include("securimage.php");
  $img = new Securimage();
  $valid = $img->check($_POST['code']);

  if($valid == true) {
    echo "{valid:true}";
  } else {
    echo "{valid:false}";
  }

?>