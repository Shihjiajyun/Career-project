<?php
session_start();

if (isset($_POST['un'])) {
    // 從 AJAX 請求中獲取用戶名
    $username = $_POST['un'];
    $_SESSION['username'] = $username;

    // 返回成功的回應
    echo "存儲用戶名成功";
} else {
    // 返回錯誤的回應
    echo "未接收到用戶名";
}
?>
