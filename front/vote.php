<?php 
$que=$Que->find($_GET['id']);
$opts=$Que->all(['subject_id'=>$_GET['id']]);
?>
<fieldset>
<legend>目前位置:首頁>問卷調查><?=$que['text'];?></legend>
<h3><?=$que['text'];?></h3>
<form action="./api/vote.php" method="post">
    <?php
foreach ($opts as $opt) {
    ?>
<div class="container" style="display: flex;">
    <input type="radio" name="opt" value="<?=$opt['id'];?>"><?=$opt['text'];?>
</div>
<?php
}
?>
<div class="ct">
    <input type="submit" value="我要投票">
</div>
</form>
</fieldset>