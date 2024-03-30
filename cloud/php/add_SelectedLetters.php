<?php
require_once 'db.php';
require_once 'function.php';


// 呼叫函式，傳遞 user_id 和選擇的字母
$add_result = add_SelectedLetters($_POST['user_id'],$_POST['un'],$_POST['l1'], $_POST['l2'], $_POST['l3']);


if($add_result)
{
	//若為true 代表新增成功，印出yes
	echo 'yes';
}
else
{
	//若為 null 或者 false 代表失敗
	echo 'no';	
}

?>