<fieldset style="">
    <legend>目前位置:首頁>最新文章區</legend>
    <div class="container">
        <div class="title" style="display: flex;width:80%">
            <div style="width: 30%;text-align:center">標題</div>
            <div style="width: 50%;text-align:center">內容</div>
            <div style="width: 20%;text-align:center"></div>
        </div>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $page = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $news = $News->all(['sh' => 1], "limit $start,$div");
        foreach ($news as $new) {
        ?>
            <div class="news" style="display: flex;width:80%;align-items: center;">
                <div style="width: 30%;background-color:lightgray"><?= $new['title']; ?></div>
                <div id="a<?= $new['id']; ?>" style="width: 50%"><?= mb_substr($new['news'], 0, 17); ?>...</div>
                <div id="s<?= $new['id']; ?>" style="width: 50%;display:none"><?= $new['news']; ?></div>
                <?php
                if (isset($_SESSION['user'])) {
                    if ($Log->count(['acc' => $_SESSION['user'], 'news' => $new['id']]) > 0) {
                        echo "<div style='width:20%'><a href='Javascript:good({$new['id']})'>收回讚</a></div>";
                    } else {
                        echo "<div style='width:20%'><a href='Javascript:good({$new['id']})'>讚</a></div>";
                    }
                }
                ?>
            </div>
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
    function good(id) {
        $.post("./api/good.php",{id}, () => {
            location.reload()
        })
    }
</script>