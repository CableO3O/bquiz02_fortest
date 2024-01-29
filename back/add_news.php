<fieldset>
    <legend>新增文章</legend>
    <div class="container" style="width:80%;margin:auto">
        <form action="./api/add_news.php" method="post">
            <label for="title">文章標題</label>
            <input type="text" name="title" style="width: 80%;">
            <br>
            <label for="type">文章分類</label>
            <select name="type">
                <option value="1">健康新知</option>
                <option value="2">菸害防治</option>
                <option value="3">癌症防治</option>
                <option value="4">慢性病防治</option>
            </select>
            <br>
            <div style="display: flex;align-items:center">
                <label for="news">文章內容</label>
                <textarea name="news" cols="68" rows="20"></textarea>
            </div>
            <div class="ct">
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </div>
        </form>
    </div>
</fieldset>