<fieldset>
    <legend>會員登入</legend>
    <label for="acc">帳號:</label>
    <input type="text" name="acc" id="acc">
    <br>
    <label for="pw">密碼:</label>
    <input type="text" name="pw" id="pw">
    <br>
    <button onclick="login()">登入</button>
    <button>清除</button>
    <a href="?do=forget">忘記密碼</a>
    <a href="?do=reg">尚未註冊</a>
</fieldset>
<script>
    function login() {
        $.post("./api/acc_chk.php", {
            acc: $("#acc").val()
        }, (res) => {
            if (parseInt(res) == 0) {
                alert("帳號不存在");
            } else {
                $.post("./api/pw_chk.php", {
                    acc: $("#acc").val(),
                    pw: $("#pw").val()
                }, (chk) => {
                    if (parseInt(chk) == 0) {
                        alert("密碼錯誤");
                    } else {
                        alert("登入成功");
                        if ($("#acc").val() == 'admin') {
                            location.href = 'back.php';
                        } else {
                            location.href = "index.php";
                        }
                    }
                })
            }
        })
    }
</script>