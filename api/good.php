<?php include_once "db.php";
$news=$News->find($_POST['id']);
if ($Log->count(['news'=>$_POST['id'],'acc'=>$_SESSION['user']])>0) {
    $Log->del(['news'=>$_POST['id'],'acc'=>$_SESSION['user']]);
    $news['goods']--;
}else{
    $Log->save(['news'=>$_POST['id'],'acc'=>$_SESSION['user']]);
    $news['goods']++;
}
$News->save($news);