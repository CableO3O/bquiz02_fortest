<?php include_once "db.php";
$row=$Que->find($_POST['id']);
$row['sh']=($row['sh']==1)?0:1;
$Que->save($row);