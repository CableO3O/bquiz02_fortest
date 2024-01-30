<fieldset>
    <legend>目前位置:首頁>問卷調查</legend>
    <div class="container">
        <div style="display: flex;">
            <div style="width: 10%;text-align:center;">編號</div>
            <div style="width: 40%;">問卷題目</div>
            <div style="width: 20%;text-align:center;">投票總數</div>
            <div style="width: 15%;text-align:center;">結果</div>
            <div style="width: 15%;text-align:center;">狀態</div>
        </div>
        <?php
    $ques=$Que->all(['subject_id'=>0,'sh'=>1]);
    foreach ($ques as $idx => $que) {
        ?>
        <div style="display: flex;">
            <div style="width: 10%;text-align:center;"><?=$idx+1;?></div>
            <div style="width: 40%;"><?=$que['text'];?></div>
            <div style="width: 20%;text-align:center;"><?=$que['vote'];?></div>
            <div style="width: 15%;text-align:center;"><a href="./index.php?do=result&&id=<?=$que['id'];?>">結果</a></div>
            <div style="width: 15%;text-align:center;">
        <?php
if (isset($_SESSION['user'])) {
    echo "<a href='./index.php?do=vote&&id={$que['id']}'>參與投票</a>";
}else{
    echo "請先登入";
}
        ?>
        </div>
        </div>
        <?php
        }
        ?>
    </div>
</fieldset>