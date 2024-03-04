<?php
require_once 'php/db.php';
@session_start();

if(!isset($_SESSION['is_login']) || !$_SESSION['is_login'])
{
	header("Location: login.php");
}

$user_name = $_SESSION['username'];

if ($user_name) {
  echo "歡迎回來， $user_name";
} else {}



$host = '34.81.127.213';
$dbuser = 'root';
$dbpw = '20031208';
$dbname = 'career';

// 連接到資料庫
$conn = new mysqli($host, $dbuser, $dbpw, $dbname);


// 檢查連接
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// 使用 prepared statements 避免 SQL 注入
$sql = "SELECT user_id FROM user WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_name); // "s" 表示字串，這裡是用戶名

// 執行 SQL 查詢
$stmt->execute();
$result = $stmt->get_result();

// 檢查查詢結果
if ($result->num_rows > 0) {
  // 獲取用戶信息
  $row = $result->fetch_assoc();
  $_SESSION['user_id'] = $row['user_id'];
  $user_id = $_SESSION['user_id'];
} else {
  // 如果找不到用戶名，你可能需要採取相應的處理方式
  echo "找不到用戶名";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/second-choose.css">
  <!-- <link rel="stylesheet" href="second-conslusion.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

  <title>123</title>
</head>
<style>
  /* .card3-container {
    margin-left: 12%;
  } */
</style>

<body style="margin: 20px;">
  <h1 id="selectedcard3" style="color: #000;font-family:PMingLiU;"></h1>

  <h1><span style="color: #000;  font-family:PMingLiU;">職能面試問題:</span>
  </h1>

  <div class="card3-container" id="card3Container">
    <div class="card3" data-card3-id="1">
      <div class="in">
        <h3>行動與做事</h3>
        <h1>專注目標
        </h1>
        <p>#集中時間心力達成目標</p>
        <p>#不喜歡漫無目的的討論</p>
        <p>#忍不住想先做重要的事</p>
        <p>#常問「這跟目標有關嗎？」</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="2">
      <div class="in">
        <h3>行動與做事</h3>
        <h1>責任與承諾</h1>
        <p>#責任感高</p>
        <p>#對事情有高度心理承諾</p>
        <p>#易承擔權責不清的任務</p>
        <p>#條件困難仍想完成工作</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">2</p>
      </div>
    </div>
    <div class="card3" data-card3-id="3">
      <div class="in">
        <h3>行動與做事</h3>
        <h1>廣泛收集</h1>
        <p>#好奇心</p>
        <p>#未來可能會用到</p>
        <p>#主動挖掘、調查研究</p>
        <p>#想要知道或擁有好東西</p>
        <p>#收藏家(人脈/資源/資料)</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">3</p>
      </div>
    </div>
    <div class="card3" data-card3-id="4">
      <div class="in">
        <h3>行動與做事</h3>
        <h1>規範秩序</h1>
        <p>#對混亂的流程或環境感到苦惱</p>
        <p>#有架構的整理知識資料或環境</p>
        <p>#監督自己和他人的流程和成果</p>
        <p>#細微差異對比、校正與糾錯</p>
        <p>#遵守明確標準，SOP</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">4</p>
      </div>
    </div>
    <div class="card3" data-card3-id="5">
      <div class="in">
        <h3>行動與做事</h3>
        <h1>靈活應變</h1>
        <p>#靈活運用工具或規則</p>
        <p>#根據情況調整行為或方法</p>
        <p>#能快速應對預料之外的突發狀況</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">5</p>
      </div>
    </div>
    <div class="card3" data-card3-id="6">
      <div class="in">
        <h3>行動與做事</h3>
        <h1>統籌組合</h1>
        <p>#找到資源或人力的最佳配置</p>
        <p>#面對複雜情況產出靈活方案</p>
        <p>#考量所有變數找出最佳作法</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">6</p>
      </div>
    </div>
    <div class="card3" data-card3-id="7">
      <div class="in">
        <h3>行動與做事</h3>
        <h1>公平正義</h1>
        <p>#人人平等一視同仁</p>
        <p>#想要實現心中的公平</p>
        <p>#討厭現有規則造成的不公平</p>
        <p>#試圖讓每個人都有平等的機會</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">7</p>
      </div>
    </div>
    <div class="card3" data-card3-id="8">
      <div class="in">
        <h3>行動與做事</h3>
        <h1>解決難題</h1>
        <p>#突破瓶頸，讓事情起死回生</p>
        <p>#想要攻克尚未解決的問題</p>
        <p>#不斷研究解決問題的辦法</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">8</p>
      </div>
    </div>
    <div class="card3" data-card3-id="9">
      <div class="in">
        <h3>思考與心態</h3>
        <h1>創新思維</h1>
        <p>#想像力與靈感</p>
        <p>#追求不一樣</p>
        <p>#各式各樣的新穎獨特</p>
        <p>#對改變保持開放</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">9</p>
      </div>
    </div>
    <div class="card3" data-card3-id="10">
      <div class="in">
        <h3>思考與心態</h3>
        <h1>邏輯推理</h1>
        <p>#理性</p>
        <p>#脈絡清晰有條理</p>
        <p>#覺察因果關係</p>
        <p>#診斷評估、找出問題關鍵</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">10</p>
      </div>
    </div>
    <div class="card3" data-card3-id="11">
      <div class="in">
        <h3>思考與心態</h3>
        <h1>戰略思維</h1>
        <p>#下意識預測未來發展</p>
        <p>#大局觀、系統觀點</p>
        <p>#為複雜情境找出多種可行方案</p>
        <p>#軍師幕僚</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">11</p>
      </div>
    </div>
    <div class="card3" data-card3-id="12">
      <div class="in">
        <h3>思考與心態</h3>
        <h1>概念思考</h1>
        <p>#發現共同關係和類比模式</p>
        <p>#跳脫表象找出本質</p>
        <p>#樹狀思考和心智圖</p>
        <p>#歸納總結</p>
        <p>#建立思考模型</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">12</p>
      </div>
    </div>
    <div class="card3" data-card3-id="13">
      <div class="in">
        <h3>思考與心態</h3>
        <h1>熱愛學習</h1>
        <p>#好奇心和求知慾</p>
        <p>#主動向外界學習(資訊、他人)</p>
        <p>#投入時間或經費提升自我</p>
        <p>#享受學習過程</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">13</p>
      </div>
    </div>
    <div class="card3" data-card3-id="14">
      <div class="in">
        <h3>思考與心態</h3>
        <h1>回溯過往</h1>
        <p>#透過過往经驗和智慧找解答</p>
        <p>#避免重蹈覆微</p>
        <p>#傳承歷史、故事、文化和活動</p>
        <p>#追溯起源和沿革</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">14</p>
      </div>
    </div>
    <div class="card3" data-card3-id="15">
      <div class="in">
        <h3>思考與心態</h3>
        <h1>審慎周全</h1>
        <p>#習慣事先準備、未雨綢繆</p>
        <p>#減少變數和風險、警覺心高</p>
        <p>#面對外界態度比較保留</p>
        <p>#謹言慎行</p>

        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">15</p>
      </div>
    </div>
    <div class="card3" data-card3-id="16">
      <div class="in">
        <h3>思考與心態</h3>
        <h1>想像未來</h1>
        <p>#生動描繪未來願景</p>
        <p>#看見未來的機會、可能性</p>
        <p>#善於預測趨勢</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">16</p>
      </div>
    </div>
    <div class="card3" data-card3-id="17">
      <div class="in">
        <h3>思考與心態</h3>
        <h1>批判思考</h1>
        <p>#不會直接相信、照單全收</p>
        <p>#思考本質、指出問題</p>
        <p>#獨立見解</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">17</p>
      </div>
    </div>
    <div class="card3" data-card3-id="18">
      <div class="in">
        <h3>人際與領導</h3>
        <h1>察言觀色</h1>
        <p>#看見他人需求</p>
        <p>#通曉人情世故</p>
        <p>#洞察利害關係</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">18</p>
      </div>
    </div>
    <div class="card3" data-card3-id="19">
      <div class="in">
        <h3>人際與領導</h3>
        <h1>協調衝突</h1>
        <p>#化解對立</p>
        <p>#凝聚共識</p>
        <p>#追求和諧</p>
        <p>#衝突管理</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">19</p>
      </div>
    </div>
    <div class="card3" data-card3-id="20">
      <div class="in">
        <h3>人際與領導</h3>
        <h1>協助他人</h1>
        <p>#解決他人問題</p>
        <p>#滿足他人需要或期待</p>
        <p>#關懷、照顧、治療等身心靈協助</p>
        <p>#付出實際行動或物質協助</p>
        <p>#給予他人資源、資訊</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">20</p>
      </div>
    </div>
    <div class="card3" data-card3-id="21">
      <div class="in">
        <h3>人際與領導</h3>
        <h1>推動影響</h1>
        <p>#讓他人接受或支持自己的主張</p>
        <p>#有意地透過言行影他人</p>
        <p>#運用政治手腕引導局勢</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">21</p>
      </div>
    </div>
    <div class="card3" data-card3-id="22">
      <div class="in">
        <h3>人際與領導</h3>
        <h1>培養他人</h1>
        <p>#相信他人想要成長或可以成長</p>
        <p>#言語表達對他人成長的期待</p>
        <p>#给予他人行為明確的回饋</p>
        <p>#培訓、教學、教樂</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">22</p>
      </div>
    </div>
    <div class="card3" data-card3-id="23">
      <div class="in">
        <h3>人際與領導</h3>
        <h1>團隊意識</h1>
        <p>#相互支援、認可付出</p>
        <p>#關心團隊動態和伙伴</p>
        <p>#為了團隊調整自己</p>
        <p>#分享資源與成果</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">23</p>
      </div>
    </div>
    <div class="card3" data-card3-id="24">
      <div class="in">
        <h3>人際與領導</h3>
        <h1>表達技巧</h1>
        <p>#容易把想法化為語言或文字</p>
        <p>#能把事情說明得讓人簡單好懂</p>
        <p>#善於用字造詞</p>
        <p>#說服談判</p>
        <p>#公眾演說</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">24</p>
      </div>

    </div>
    <div class="card3" data-card3-id="25">
      <div class="in">
        <h3>人際與領導</h3>
        <h1>善於識人</h1>
        <p>#不會一概而論</p>
        <p>#每個人都獨一黑二</p>
        <p>#對每個人的差異和獨特很敏銳</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">25</p>
      </div>
    </div>
    <div class="card3" data-card3-id="26">
      <div class="in">
        <h3>人際與領導</h3>
        <h1>深化關係</h1>
        <p>#人際關係重質不重量</p>
        <p>#重感情、念舊長情</p>
        <p>#彼此深入瞭解和真誠的關係</p>
        <p>#想要知道或擁有好東西</p>
        <p>#建立長期的深度信任</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">26</p>
      </div>
    </div>
  </div>
  <div class="card3-container" id="card3Container2">
    <div class="card3" data-card3-id="1" id="1">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">進公司後，你會做的前三件事情是什麼？以達成你在職場上的目標</p>
        <input v-model="userInput1" @input="updateCardHeight(1)" placeholder="輸入文字回答問題">
        <p>{{ displayedText1 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">1-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="2" id="2">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">在專案一團亂的情況下，你會選擇如何處理</p>
        <input v-model="userInput2" @input="updateCardHeight(2)" placeholder="輸入文字回答問題">
        <p>{{ displayedText2 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">2-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="3" id="3">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">你有什麼建議可以協助公司往更好的方向發展？</p>
        <input v-model="userInput3" @input="updateCardHeight(3)" placeholder="輸入文字回答問題">
        <p>{{ displayedText3 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">3-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="4" id="4">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">在建立公司SOP(標準作業程序)裡，
          請按照優先順序提出你在意的事項。</p>
        <input v-model="userInput4" @input="updateCardHeight(4)" placeholder="輸入文字回答問題">
        <p>{{ displayedText4 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">4-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="5" id="5">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">當原本的布局被打亂，例如：專案
          取消，你會如何因應、面對或接受
          這樣的變化？</p>
        <input v-model="userInput5" @input="updateCardHeight(5)" placeholder="輸入文字回答問題">
        <p>{{ displayedText5 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">5-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="6" id="6">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">面對快速變動的組織，你會如何
          在不影響既有工作產值下，規劃整合與各部門溝通以改善現狀?</p>
        <input v-model="userInput6" @input="updateCardHeight(6)" placeholder="輸入文字回答問題">
        <p>{{ displayedText6 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">6-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="7" id="7">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">今天你的同事或主管，做了達反公
          司规定但並不建法的事情，你會怎
          麼處理？</p>
        <input v-model="userInput7" @input="updateCardHeight(7)" placeholder="輸入文字回答問題">
        <p>{{ displayedText7 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">7-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="8" id="8">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">你會如何處理一件棘手的任務？</p>
        <input v-model="userInput8" @input="updateCardHeight(8)" placeholder="輸入文字回答問題">
        <p>{{ displayedText8 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">8-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="9" id="9">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">你認為，公司或部門目前面臨到
          的挑戰是什麼？你會如何突破
          與創新？</p>
        <input v-model="userInput9" @input="updateCardHeight(9)" placeholder="輸入文字回答問題">
        <p>{{ displayedText9 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">9-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="10" id="10">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">請舉例過去曾經和跨團隊合作
          及解決問題的經驗。</p>
        <input v-model="userInput10" @input="updateCardHeight(10)" placeholder="輸入文字回答問題">
        <p>{{ displayedText10 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">10-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="11" id="11">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">你會怎麼看自己的過去職場經驗
          及未來發展的期待。</p>
        <input v-model="userInput11" @input="updateCardHeight(11)" placeholder="輸入文字回答問題">
        <p>{{ displayedText11 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">11-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="12" id="12">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">請說明你認知的這份工作
          在團隊中的重要性。</p>
        <input v-model="userInput12" @input="updateCardHeight(12)" placeholder="輸入文字回答問題">
        <p>{{ displayedText12 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">12-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="13" id="13">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">你如何持續自己的學習
          成長與突破？</p>
        <input v-model="userInput13" @input="updateCardHeight(13)" placeholder="輸入文字回答問題">
        <p>{{ displayedText13 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">13-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="14" id="14">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align:left ;">你如何檢視自己過去的
          成長經驗值？</p>
        <input v-model="userInput14" @input="updateCardHeight(14)" placeholder="輸入文字回答問題">
        <p>{{ displayedText14 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">14-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="15" id="15">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">有多份合約或報表需要你審閱，
          你認為最該注意的事項是什麼？</p>
        <input v-model="userInput15" @input="updateCardHeight(15)" placeholder="輸入文字回答問題">
        <p>{{ displayedText15 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">15-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="16" id="16">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align:left ;">請說明目前公司產業定位
          及與競爭對手的分析。</p>
        <input v-model="userInput16" @input="updateCardHeight(16)" placeholder="輸入文字回答問題">
        <p>{{ displayedText16 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">16-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="17" id="17">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">近期你最關心的世界趨勢是什麼?
          你的觀點又是什麼？</p>
        <input v-model="userInput17" @input="updateCardHeight(17)" placeholder="輸入文字回答問題">
        <p>{{ displayedText17 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">17-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="18" id="18">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">與來自不同文化景的人交流時，
          你在意什麼？請舉具體的例子。</p>
        <input v-model="userInput18" @input="updateCardHeight(18)" placeholder="輸入文字回答問題">
        <p>{{ displayedText18 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">18-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="19" id="19">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align:left;">你會怎麼解決組織中，
          對上/同/對下/對客戶管理
          之間的衝突？</p>
        <input v-model="userInput19" @input="updateCardHeight(19)" placeholder="輸入文字回答問題">
        <p>{{ displayedText19 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">19-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="20" id="20">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">上級採用了其他同儕或新人的提案，
          讓你感受威脅，你會如何處理應對？</p>
        <input v-model="userInput20" @input="updateCardHeight(20)" placeholder="輸入文字回答問題">
        <p>{{ displayedText20 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">20-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="21" id="21">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">對你來說一個人才
          最難改變的心態是什麼？</p>
        <input v-model="userInput21" @input="updateCardHeight(21)" placeholder="輸入文字回答問題">
        <p>{{ displayedText21 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">21-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="22" id="22">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">你如何協助新加入的成員
          在短期内快速適應他的工作？</p>
        <input v-model="userInput22" @input="updateCardHeight(22)" placeholder="輸入文字回答問題">
        <p>{{ displayedText22 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">22-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="23" id="23">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">你如何處理與應對在團隊中
          價值觀不合的夥伴？</p>
        <input v-model="userInput23" @input="updateCardHeight(23)" placeholder="輸入文字回答問題">
        <p>{{ displayedText23 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">23-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="24" id="24">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;">當你對上級/同儕/客戶的
          決策有異議時，
          你會如何訴說你的需求？</p>
        <input v-model="userInput24" @input="updateCardHeight(24)" placeholder="輸入文字回答問題">
        <p>{{ displayedText24 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">24-1</p>
      </div>

    </div>
    <div class="card3" data-card3-id="25" id="25">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;"></p>
        <input v-model="userInput25" @input="updateCardHeight(25)" placeholder="輸入文字回答問題">
        <p>{{ displayedText25 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">25-1</p>
      </div>
    </div>
    <div class="card3" data-card3-id="26" id="26">
      <div class="in">
        <h1>職能面試問題</h1>
        <p style="text-align: left;"></p>
        <input v-model="userInput26" @input="updateCardHeight(26)" placeholder="輸入文字回答問題">
        <p>{{ displayedText26 }}</p>
        <p style="position: absolute; bottom: 1px; left: 50%; transform: translateX(-50%);">26-1</p>
      </div>
    </div>
  </div>

  <a href="conclusion.html.php"><button class="nextButton" style="display: block;"><span
        style="font-family:PMingLiU;">最終比對</span></button></a>
  <a href="second-choose.html.php"><button class="lastButton" style="display: block;"><span
        style="font-family:PMingLiU;">回到上一頁</span></button></a>

  <script>
    const selectedcard3Element = document.getElementById('selectedcard3');
    const selectedcard3String = localStorage.getItem('selectedcard2');


    const selectedcard3Array = selectedcard3String ? JSON.parse(selectedcard3String) : [];
    selectedcard3Element.textContent = '您所選擇的職業編號為：' + selectedcard3Array.join(', ');
    if (selectedcard3Array.length > 1) {
      document.querySelectorAll('.card3').forEach(card3Element => {
        const card3Id = card3Element.getAttribute('data-card3-id');
        const isSelected = selectedcard3Array.includes(parseInt(card3Id));
        card3Element.style.display = isSelected ? 'block' : 'none';
      });

    } else {
      // Fix here: Use designedcard3sElement instead of card3Div
      card3Element.style.display = 'none'; // Hide the card3
      selectedcard3Element.textContent = '適合您的職業較為廣泛!!';
    }
  </script>
  <script>
    new Vue({
      el: '#card3Container2',
      data: {
        userInput1: '',
        userInput2: '',
        userInput3: '',
        userInput4: '',
        userInput5: '',
        userInput6: '',
        userInput7: '',
        userInput8: '',
        userInput9: '',
        userInput10: '',
        userInput11: '',
        userInput12: '',
        userInput13: '',
        userInput14: '',
        userInput15: '',
        userInput16: '',
        userInput17: '',
        userInput18: '',
        userInput19: '',
        userInput20: '',
        userInput21: '',
        userInput22: '',
        userInput23: '',
        userInput24: '',
        userInput25: '',
        userInput26: '',
      },
      computed: {
        displayedText1() {
          return this.userInput1.toUpperCase();
        },
        displayedText2() {
          return this.userInput2.toUpperCase();
        },
        displayedText3() {
          return this.userInput3.toUpperCase();
        },
        displayedText4() {
          return this.userInput4.toUpperCase();
        },
        displayedText5() {
          return this.userInput5.toUpperCase();
        },
        displayedText6() {
          return this.userInput6.toUpperCase();
        },
        displayedText7() {
          return this.userInput7.toUpperCase();
        },
        displayedText8() {
          return this.userInput8.toUpperCase();
        },
        displayedText9() {
          return this.userInput9.toUpperCase();
        },
        displayedText10() {
          return this.userInput10.toUpperCase();
        },
        displayedText11() {
          return this.userInput11.toUpperCase();
        },
        displayedText12() {
          return this.userInput12.toUpperCase();
        },
        displayedText13() {
          return this.userInput13.toUpperCase();
        },
        displayedText14() {
          return this.userInput14.toUpperCase();
        },
        displayedText15() {
          return this.userInput15.toUpperCase();
        },
        displayedText16() {
          return this.userInput16.toUpperCase();
        },
        displayedText17() {
          return this.userInput17.toUpperCase();
        },
        displayedText18() {
          return this.userInput18.toUpperCase();
        },
        displayedText19() {
          return this.userInput19.toUpperCase();
        },
        displayedText20() {
          return this.userInput20.toUpperCase();
        },
        displayedText21() {
          return this.userInput21.toUpperCase();
        },
        displayedText22() {
          return this.userInput22.toUpperCase();
        },
        displayedText23() {
          return this.userInput23.toUpperCase();
        },
        displayedText24() {
          return this.userInput24.toUpperCase();
        },
        displayedText25() {
          return this.userInput25.toUpperCase();
        },
        displayedText26() {
          return this.userInput26.toUpperCase();
        },
      },
      methods: {
        updateCardHeight(questionNumber) {
          // 更新答案
          const answerKey = `userInput${questionNumber}`;
          localStorage.setItem(answerKey, this[answerKey]);
        },
      },
      mounted() {
        // 在頁面載入時從 localStorage 中獲取答案
        this.userInput1 = localStorage.getItem('userInput1') || '';
        this.userInput2 = localStorage.getItem('userInput2') || '';
        this.userInput3 = localStorage.getItem('userInput3') || '';
        this.userInput4 = localStorage.getItem('userInput4') || '';
        this.userInput5 = localStorage.getItem('userInput5') || '';
        this.userInput6 = localStorage.getItem('userInput6') || '';
        this.userInput7 = localStorage.getItem('userInput7') || '';
        this.userInput8 = localStorage.getItem('userInput8') || '';
        this.userInput9 = localStorage.getItem('userInput9') || '';
        this.userInput10 = localStorage.getItem('userInput10') || '';
        this.userInput11 = localStorage.getItem('userInput11') || '';
        this.userInput12 = localStorage.getItem('userInput12') || '';
        this.userInput13 = localStorage.getItem('userInput13') || '';
        this.userInput14 = localStorage.getItem('userInput14') || '';
        this.userInput15 = localStorage.getItem('userInput15') || '';
        this.userInput16 = localStorage.getItem('userInput16') || '';
        this.userInput17 = localStorage.getItem('userInput17') || '';
        this.userInput18 = localStorage.getItem('userInput18') || '';
        this.userInput19 = localStorage.getItem('userInput19') || '';
        this.userInput20 = localStorage.getItem('userInput20') || '';
        this.userInput21 = localStorage.getItem('userInput21') || '';
        this.userInput22 = localStorage.getItem('userInput22') || '';
        this.userInput23 = localStorage.getItem('userInput23') || '';
        this.userInput24 = localStorage.getItem('userInput24') || '';
        this.userInput25 = localStorage.getItem('userInput25') || '';
        this.userInput26 = localStorage.getItem('userInput26') || '';
      },
    });

  </script>


</body>
<footer style="height: 200px;"></footer>

</html>