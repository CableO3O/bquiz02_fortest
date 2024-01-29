<fieldset>
    <legend>最新文章管理</legend>
    <a href="./back.php?do=add_news"><button>新增文章</button></a>
    <div class="container">
        <div style="display: flex;width:100%">
            <div style="width: 16%;text-align:center">編號</div>
            <div style="width: 50%;text-align:center">標題</div>
            <div style="width: 16%;text-align:center">顯示</div>
            <div style="width: 16%;text-align:center">刪除</div>
        </div>
        <form action="./api/edit_news.php" method="post">
            <?php
            $total = $News->count();
            $div = 3;
            $page = ceil($total / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $news = $News->all("limit $start,$div");
            foreach ($news as $idx => $new) {
            ?>
                <div style="display: flex;width:100%;align-items: center;text-align:center">
                    <div style="width: 16%;background-color:lightgray"><?= $idx + 1 + $start; ?></div>
                    <div style="width: 50%;"><?= $new['title']; ?></div>
                    <div style="width: 16%;"><input type="checkbox" name="sh[]" value="<?= $new['id']; ?>" <?= ($new['sh'] == 1) ? 'checked' : ''; ?>></div>
                    <div style="width: 16%;"><input type="checkbox" name="del[]" value="<?= $new['id']; ?>"></div>
                    <div><input type="hidden" name="id[]" value="<?= $new['id']; ?>"></div>
                </div>
                <br>
            <?php
            }
            ?>
    </div>
    <div style="text-align:center">
        <?php

        if ($now - 1 > 0) {
            $prev = $now - 1;
            echo "<a href='back.php?do=news&p=$prev'>";
            echo "<";
            echo "</a>";
        }
        for ($i = 1; $i <= $page; $i++) {
            $size = ($i == $now) ? 'font-size:22px;' : 'font-size:16px;';
            echo "<a href='back.php?do=news&p=$i' style='{$size}'>";
            echo $i;
            echo "</a>";
        }
        if ($now + 1 <= $page) {
            $next = $now + 1;
            echo "<a href='back.php?do=news&p=$next'>";
            echo ">";
            echo "</a>";
        }

        ?>
    </div>
    <div class="ct">
        <input type="submit" value="確定修改">
    </div>
    </form>
</fieldset>