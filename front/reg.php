<fieldset>
    <legend>會員註冊</legend>
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
</fieldset>
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
                        $.post("./api/reg.php",user, (res) => {
                            alert("註冊完成")
                            location.href = "?do=login"
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
    }
</script>