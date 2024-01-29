<fieldset>
    <legend>最新文章管理</legend>
    <div class="container">
        <div style="display: flex;width:80%">
            <div style="width: 16%;text-align:center">編號</div>
            <div style="width: 50%;text-align:center">標題</div>
            <div style="width: 16%;text-align:center">顯示</div>
            <div style="width: 16%;text-align:center">刪除</div>
        </div>
        <?php
        $total = $News->count();
        $div = 3;
        $page = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $news = $News->all(['sh' => 1], "limit $start,$div");
        foreach ($news as $idx=>$new) {
        ?>
            <div style="display: flex;width:80%;align-items: center;">
                <div class="title" style="width: 30%;background-color:lightgray" ><?= $idx+1;?></div>
                <div class="title" data-id="<?= $new['id']; ?>" style="width: 30%;background-color:lightgray" ><?= $new['title']; ?></div>
               
            </div>
            <br>
        <?php
        }
        ?>
    </div>
    <div>
        <?php
        if ($now - 1 > 0) {
            $prev = $now - 1;
            echo "<a href='index.php?do=news&p=$prev'>";
            echo "<";
            echo "</a>";
        }
        for ($i = 1; $i <= $page; $i++) {
            echo "<a href='index.php?do=news&p=$i'>";
            echo $i;
            echo "</a>";
        }
        if ($now + 1 <= $page) {
            $next = $now + 1;
            echo "<a href='index.php?do=news&p=$next'>";
            echo ">";
            echo "</a>";
        }

        ?>
    </div>
</fieldset>
<script>
    $('.title').on('click',(e)=>{
        let id=$(e.target).data('id');
        $("#s"+id).toggle();
        $("#a"+id).toggle();
    })

    function good(id) {
        $.post("./api/good.php",{id}, () => {
            location.reload()
        })
    }
</script>