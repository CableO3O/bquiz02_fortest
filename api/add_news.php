<?php include_once "db.php";
$_POST['sh']=1;
$_POST['goods']=0;
$News->save($_POST);
to("../back.php?do=news");