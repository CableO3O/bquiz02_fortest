<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <div style="display: flex;">
            <div>問卷名稱</div>
            <div>
                <input type="text" name="subject">
            </div>
        </div>
        <div>
            <div id="opt">
                選項<input type="text" name="option[]">
                <input type="button" value="更多" onclick="more()">
            </div>
        </div>
        <div class="ct">
            <input type="submit" value="送出">
            <input type="reset" value="清空">
        </div>
    </form>
</fieldset>
<fieldset>
    <legend>問卷列表</legend>
    <div class="container">
        <div style="display: flex;text-align:center">
            <div style="width: 70%; background-color:lightgray">問卷名稱</div>
            <div style="width: 15%; background-color:lightgray">投票數</div>
            <div style="width: 15%; background-color:lightgray">開放</div>
        </div>
        <?php
        $ques = $Que->all(['subject_id' => 0]);
        foreach ($ques as $que) {
        ?>
            <div style="display: flex;">
                <div style="width: 70%;"><?= $que['text']; ?></div>
                <div style="width: 15%;text-align:center"><?= $que['vote']; ?></div>
                <div style="width: 15%;text-align:center">
                    <button class="show-btn" data-id='<?= $que['id']; ?>'>
                        <?=($que['sh']==1)?'顯示':'隱藏';?>
                    </button>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</fieldset>
<script>
    function more() {
        let opt = `
        <div id="opt">
                選項<input type="text" name="option[]">
            </div>
        `
        $("#opt").before(opt);
    }
   $(".show-btn").on('click',function(){
    let id=$(this).data('id');
    $.post("./api/show.php",{id},()=>{
        $(this).text(($(this).text()=='顯示')?'隱藏':'顯示');
        location.reload();
    })
   })
</script>