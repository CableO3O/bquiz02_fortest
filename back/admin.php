<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/del.php" method="post">
        <div class="container">
            <div style="width: 80%; margin: auto;">
                <div class="title" style="display: flex;">
                    <div style="background-color: lightgray;width:40%;text-align:center ">帳號</div>
                    <div style="background-color: lightgray;width:30%;text-align:center ">密碼</div>
                    <div style="background-color: lightgray;width:30%;text-align:center ">刪除</div>
                </div>
                <?php
                $users = $User->all("where `acc`!='admin'");
                foreach ($users as $user) {
                ?>
                    <div class="admin" style="display: flex;">
                        <div style="width:40%;text-align:center"><?= $user['acc']; ?></div>
                        <div style="width:30%;text-align:center"><?= str_repeat("*", mb_strlen($user['pw'])); ?></div>
                        <div style="width:30%;text-align:center"><input type="checkbox" name="del[]"  value="<?= $user['id']; ?>"></div>
                    </div>
                <?php
                }
                ?>
                <div class="btn" style="text-align: center;">
                    <input type="submit" value="確定刪除">
                    <input type="reset" value="清除選取">
                </div>
            </div>
        </div>
    </form>
</fieldset>
<h1>新增會員</h1>
<h3 style="color: red;">*請設定您要註冊的帳號及密碼(最⾧12個字元)</h3>
<label for="acc">帳號:</label>
<input type="text" name="acc" id="acc" maxlength="12">
<br>
<label for="pw">密碼:</label>
<input type="text" name="pw" id="pw" maxlength="12">
<br>
<label for="pw2">確認密碼:</label>
<input type="text" name="pw2" id="pw2" maxlength="12">
<br>
<label for="email">信箱:</label>
<input type="text" name="email" id="email">
<br>
<button onclick="reg()">註冊</button>
<button onclick="clearinput()">清除</button>
<script>
    function reg() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val()
        }
        if (user.acc != '' && user.pw != '' && user.pw2 != '' && user.email != '') {
            if (user.pw == user.pw2) {
                $.post("./api/acc_chk.php", {
                    acc: user.acc
                }, (res) => {
                    if (parseInt(res) == 1) {
                        alert("帳號重複")
                    } else {
                        $.post("./api/reg.php", user, (res) => {
                            alert("註冊完成")
                            location.reload()
                        })
                    }
                })
            } else {
                alert("密碼錯誤")
            }
        } else {
            alert("不可空白");
        }
    }

    function clearinput() {
        $("#acc").val("")
        $("#pw").val("")
        $("#pw2").val("")
        $("#email").val("")
    }
</script>