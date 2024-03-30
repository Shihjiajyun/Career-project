<?php
require_once 'php/db.php';

//如過有 $_SESSION['is_login'] 這個值，以及 $_SESSION['is_login'] 為 true 都代表已登入
if(isset($_SESSION['is_login']) && $_SESSION['is_login'])
{
  //直接轉跳到 index.html 後端首頁
  header("Location: index.html");
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
  <head>
    <title>職涯卡牌網站</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 載入 bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
    <link rel="shortcut icon" href="../images/favicon.ico">
  </head>

  <body>
    <!-- 網站內容 -->
    <div class="content">
      <div class="container">
        <!-- 建立第一個 row 空間，裡面準備放格線系統 -->
        <div class="row">
          <!-- 在 xs 尺寸，佔12格-->
          <div class="col-xs-12 col-sm-4 col-sm-offset-4">
          	<h1>登入帳號</h1>
            <form class="login">
              <div class="form-group">
                <label for="username">帳號</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="請輸入帳號" required>
              </div>
              <div class="form-group">
                <label for="password">密碼</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="請輸入密碼" required>
              </div>
              <button type="submit" class="btn btn-default">
                登入
              </button>
              <button onclick="window.location.href='register.php'" class="btn btn-default">
                註冊帳號
              </button>

            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- 在表單送出前，檢查確認密碼是否輸入一樣 -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
      //當文件準備好時，
      $(document).on("ready", function() {
				//當表單 sumbit 出去的時候
				$("form.login").on("submit", function(){
				  //使用 ajax 送出 帳密給 verify_user.php
					$.ajax({
            type : "POST",
            url : "php/verify_user.php", 
            data : {
              un : $("#username").val(), //使用者帳號
              pw : $("#password").val() //使用者密碼
            },
            dataType : 'html'
          }).done(function(data) {
            console.log(data);
            if(data == "yes")
            {              
              //登入成功，跳轉首頁
              window.location.href = "index.html"; 
              console.log(data);
              var un = $("#username").val();
              $.ajax({
                type: "POST",
                url: "php/store_username.php", 
                data: {un: un},
                success: function(response) {
                  // console.log(response); 
                }
              });
            }
            else
            {
              alert("登入失敗，請確認帳號密碼");
            }
            
          }).fail(function(jqXHR, textStatus, errorThrown) {
            //失敗的時候
            alert("有錯誤產生，請看 console log");
            // console.log(jqXHR.responseText);
          });
	        //回傳 false 為了要阻止 from 繼續送出去。由上方ajax處理即可
          return false;
				});
      });
    </script>
  </body>
</html>
