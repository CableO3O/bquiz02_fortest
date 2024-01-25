<?php include_once "db.php";
$user=$User->find(['email'=>$_POST['email']]);
if ($user==[]) {
    echo 0;
}else{
    echo $user['pw'];
}