<fieldset>
    <legend>忘記密碼</legend>
    <h3>請輸入信箱以查詢密碼</h3>
    <input type="text" name="email" id="email" style="width: 300px;">
    <br>
    <button onclick="search()">尋找</button>
    <br>
    <span id="result"></span>
</fieldset>
<script>
    function search(){
        let email=$("#email").val()
        $.post("./api/forget.php",{email},(res)=>{
            if (parseInt(res)==0) {
                $("#result").html("查無此資料")
            }else{
                $("#result").html("您的密碼為:"+res)
            }
        })
    }
</script>