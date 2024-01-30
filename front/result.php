<?php
$que = $Que->find($_GET['id']);
$opts = $Que->all(['subject_id' => $_GET['id']]);
?>
<fieldset>
    <legend>目前位置:首頁>問卷調查><?= $que['text']; ?></legend>
    <h3><?= $que['text']; ?></h3>
    <?php
    foreach ($opts as $key => $opt) {
        $total=($que['vote']!=0)?$que['vote']:1;
        $rate=round($opt['vote']/$total,2);
        $width=35*$rate;
        $all=$rate*100;
    ?>
        <div class="container" style="display: flex;margin-bottom:20px">
            <div style="width: 50%;">
                <?= $opt['text']; ?>
            </div>
            <div style="width:<?=$width;?>%;height:20px;background-color:#ccc"></div>
            <div style="width: 15%;"><?= $opt['vote']; ?>票(<?=$all;?>%)</div>

        </div>
    <?php
    }
    ?>
    <div class="ct">
        <button><a href="./index.php?do=que">返回</a></button>
    </div>
</fieldset>