<?php
//啟動 session ，這樣才能夠取用 $_SESSION['link'] 的連線，做為資料庫的連線用
@session_start();

$host = 'hkg1.clusters.zeabur.com';
$port = 31522;
$dbuser = 'root';
$dbpw = 'yExzLv7UDIf91G84KX0hdF23mop6SV5a';
$dbname = 'career';

//宣告一個 link 變數，並執行連結資料庫函式 mysqli_connect()，連結結果會帶入 link 當中
$_SESSION['link'] = mysqli_connect($host, $dbuser, $dbpw, $dbname, $port);
/**
 * 檢查資料庫有無該使用者名稱
 */
function check_has_username($username)
{
  //宣告要回傳的結果
  $result = null;

  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `user` WHERE `username` = '{$username}';";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query) {
    //使用 mysqli_num_rows 方法，判別執行的語法，其取得的資料量，是否有一筆資料
    if (mysqli_num_rows($query) >= 1) {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }

    //釋放資料庫查詢到的記憶體
    mysqli_free_result($query);
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

/**
 * 檢查資料庫有無該使用者名稱
 */
function add_user($username, $password, $name)
{
  //宣告要回傳的結果
  $result = null;
  //先把密碼用md5加密
  $password = md5($password);
  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "INSERT INTO `user` (`username`, `password`, `name`) VALUE ('{$username}', '{$password}', '{$name}');";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query) {
    //使用 mysqli_affected_rows 判別異動的資料有幾筆，基本上只有新增一筆，所以判別是否 == 1
    if (mysqli_affected_rows($_SESSION['link']) == 1) {
      //取得的量大於0代表有資料
      //回傳的 $result 就給 true 代表有該帳號，不可以被新增
      $result = true;
    }
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

// 把使用者選擇的卡片加入資料庫
function add_SelectedLetters($user_id, $un, $l1, $l2, $l3)
{
  // 宣告要回傳的結果
  $result = null;

  // 將查詢語法當成字串，記錄在 $sql 變數中
  $sql = "INSERT INTO `first` (`user_id`, `username`, `first_letter`, `second_letter`, `third_letter`)
          VALUES ('{$user_id}', '{$un}', '{$l1}', '{$l2}', '{$l3}')
          ON DUPLICATE KEY UPDATE 
          `username` = '{$un}',
          `first_letter` = '{$l1}',
          `second_letter` = '{$l2}',
          `third_letter` = '{$l3}';";

  // 用 mysqli_query 方法執行請求
  $query = mysqli_query($_SESSION['link'], $sql);

  // 如果請求成功
  if ($query) {
    // 使用 mysqli_affected_rows 判別異動的資料有幾筆
    // 對於 INSERT ON DUPLICATE KEY UPDATE 來說，這個值可能是 1 或 2
    if (mysqli_affected_rows($_SESSION['link']) >= 0) {
      $result = true;
    }
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  // 回傳結果
  return $result;
}

// 把使用者選擇的卡片加入資料庫
function add_number($user_id, $un, $n1, $n2, $n3)
{
  // 宣告要回傳的結果
  $result = null;

  // 將查詢語法當成字串，記錄在 $sql 變數中
  $sql = "INSERT INTO `second` (`user_id`, `username`, `first_number`, `second_number`, `third_number`)
          VALUES ('{$user_id}', '{$un}', '{$n1}', '{$n2}', '{$n3}')
          ON DUPLICATE KEY UPDATE 
          `username` = '{$un}',
          `first_number` = '{$n1}',
          `second_number` = '{$n2}',
          `third_number` = '{$n3}';";

  // 用 mysqli_query 方法執行請求
  $query = mysqli_query($_SESSION['link'], $sql);

  // 如果請求成功
  if ($query) {
    // 使用 mysqli_affected_rows 判別異動的資料有幾筆
    // 對於 INSERT ON DUPLICATE KEY UPDATE 來說，這個值可能是 1 或 2
    if (mysqli_affected_rows($_SESSION['link']) >= 0) {
      $result = true;
    }
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  // 回傳結果
  return $result;
}

/**
 * 檢查資料庫有無該使用者名稱
 */
function verify_user($username, $password)
{
  //宣告要回傳的結果
  $result = null;
  //先把密碼用md5加密
  $password = md5($password);
  //將查詢語法當成字串，記錄在$sql變數中
  $sql = "SELECT * FROM `user` WHERE `username` = '{$username}' AND `password` = '{$password}'";

  //用 mysqli_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
  $query = mysqli_query($_SESSION['link'], $sql);

  //如果請求成功
  if ($query) {
    //使用 mysqli_num_rows 回傳 $query 請求的結果數量有幾筆，為一筆代表找到會員且密碼正確。
    if (mysqli_num_rows($query) == 1) {
      //取得使用者資料
      $user = mysqli_fetch_assoc($query);

      //在session李設定 is_login 並給 true 值，代表已經登入
      $_SESSION['is_login'] = TRUE;
      //紀錄登入者的id，之後若要隨時取得使用者資料時，可以透過 $_SESSION['login_user_id'] 取用
      $_SESSION['login_user_id'] = $user['user_id'];
      $_SESSION['username'] = $user['username'];
      //回傳的 $result 就給 true 代表驗證成功
      $result = true;
    }
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
  }

  //回傳結果
  return $result;
}

// 取得使用者第一個選擇結果
function get_user_choices($user_id)
{
  $host = 'hkg1.clusters.zeabur.com';
  $port = 31522;
  $dbuser = 'root';
  $dbpw = 'yExzLv7UDIf91G84KX0hdF23mop6SV5a';
  $dbname = 'career';

  $conn = new mysqli($host, $dbuser, $dbpw, $dbname, $port);

  // 檢查連接是否成功
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // 使用 prepared statement 避免 SQL 注入
  $sql = "SELECT first_letter, second_letter, third_letter FROM first WHERE user_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();

  // 獲取查詢結果
  $result = $stmt->get_result();

  // 處理結果
  $user_choices = array();
  while ($row = $result->fetch_assoc()) {
    $user_choices[] = array(
      $user_choices[0] = $row['first_letter'],
      $user_choices[1] = $row['second_letter'],
      $user_choices[2] = $row['third_letter'],
    );
  }

  return $user_choices;
}

// 取得使用者第二個選擇結果
function get_user_choices2($user_id)
{
  $host = 'hkg1.clusters.zeabur.com';
  $port = '31522';
  $dbuser = 'root';
  $dbpw = 'yExzLv7UDIf91G84KX0hdF23mop6SV5a';
  $dbname = 'career';

  $conn = new mysqli($host, $dbuser, $dbpw, $dbname, $port);

  // 檢查連接是否成功
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // 使用 prepared statement 避免 SQL 注入
  $sql = "SELECT first_number, second_number, third_number FROM second WHERE user_id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();

  // 獲取查詢結果
  $result = $stmt->get_result();

  // 處理結果
  $user_choices2 = array();
  while ($row = $result->fetch_assoc()) {
    $user_choices2[] = array(
      $user_choices2[0] = $row['first_number'],
      $user_choices2[1] = $row['second_number'],
      $user_choices2[2] = $row['third_number'],
    );
  }

  return $user_choices2;
}
?>