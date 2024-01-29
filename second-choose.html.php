<?php
require_once 'php/db.php';
require_once 'php/function.php';
@session_start();

if(!isset($_SESSION['is_login']) || !$_SESSION['is_login'])
{
	header("Location: login.php");
}

$user_name = $_SESSION['username'];

if ($user_name) {
  echo "歡迎回來， $user_name";
} else {}



$host = 'localhost';
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

$user_choices2 = get_user_choices2($user_id);
// print_r($user_choices2[0]);
// print_r($user_choices2[1]);
// print_r($user_choices2[2]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>卡片測試
  </title>
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/second-choose.css">
  <link rel="stylesheet" href="css/second-conclusion.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
  <h1 style="color: black;">請選擇一項，您覺得您可以勝任的職業</h1>
  <div id="designedcard2s">
    <div class="page-content">
      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="3,12,15">
        <div class="content">
          <h2 class="title">企劃</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">行銷</p>
          <p>文案/社群及專案整體規劃</p>
          <ul>
            <li>創意力</li>
            <li>協作力</li>
            <li>整合力</li>
          </ul>
          <p class="copy">#市場資訊太雜亂，常常計畫敢不上變化</p>
          <P class="number" style="font-size: small">3，12，15</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="4,7,9">
        <div class="content">
          <h2 class="title">數位行銷</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">行銷</p>
          <p>因應市場/消費者喜好規劃<br>整體數位行銷內容策略</p>
          <ul>
            <li>社群力</li>
            <li>數據力</li>
            <li>市場力</li>
          </ul>
          <p class="copy">#創新壓力較高，須及時關切數位科技因應跨世代需求而調整策略，資安/公關與法律風險</p>
          <P class="number" style="font-size: small">4，7，9</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="18,21,23">
        <div class="content">
          <h2 class="title">多元共榮</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;"></p>
          <p>為企業打造多元化及多樣的工作環境，及包含多元價值團隊。</p>
          <ul>
            <li>包容力</li>
            <li>文化力</li>
            <li>國際力</li>
          </ul>
          <p class="copy">#人際關係處理需要圓融，隨時需要關注最新世界人才議題</p>
          <P class="number" style="font-size: small">18，21，23</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="1,2,12">
        <div class="content">
          <h2 class="title">產品經理</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">行銷</p>
          <p>從研發到銷售整體市場規劃，負責整體產品/服務生命週期</p>
          <ul>
            <li>市場力</li>
            <li>領導力</li>
            <li>判斷力</li>
          </ul>
          <p class="copy">#因應快速策略更動，需頻繁與各部門溝通</p>
          <P class="number" style="font-size: small">1，2，12</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="2,8,26">
        <div class="content">
          <h2 class="title">客戶經理</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">業務</p>
          <p>維繫/新增客戶名單，持續產生業績</p>
          <ul>
            <li>應變力</li>
            <li>洞察力</li>
            <li>服務導向思維</li>
          </ul>
          <p class="copy">#随時需要調整服務策略對應合作窗口。</p>
          <P class="number" style="font-size: small">2，8，26</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="8,10,24">
        <div class="content">
          <h2 class="title">工程師</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">工程</p>
          <p>技術專業職</p>
          <ul>
            <li>學習力</li>
            <li>思考力</li>
            <li>商業力</li>
          </ul>
          <p class="copy">#多數工作内容須與機器協作。</p>
          <P class="number" style="font-size: small">8，10，24</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="8,24,26">
        <div class="content">
          <h2 class="title">通路業務</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">業務</p>
          <p>依照產品/地區/市場開發對象做分類</p>
          <ul>
            <li>溝通力</li>
            <li>談判力</li>
            <li>在地化經驗</li>
          </ul>
          <p class="copy">#相對受地區通路/服務對象限制。</p>
          <P class="number" style="font-size: small">8，24，26</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="6,11,24">
        <div class="content">
          <h2 class="title">顧問</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;"></p>
          <p>透過專業背景知識經驗，提供企業解決方案</p>
          <ul>
            <li>簡報力</li>
            <li>洞察力</li>
            <li>邏輯力</li>
          </ul>
          <p class="copy">#時常需要應對多數人沒有解決過的難題。</p>
          <P class="number" style="font-size: small">6，11，24</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="10,17,18">
        <div class="content">
          <h2 class="title">客戶關係</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">業務</p>
          <p>藉由數據分析/經驗與長期合作關係。為客戶創造價值</p>
          <ul>
            <li>數據力</li>
            <li>洞察力</li>
            <li>分析力</li>
          </ul>
          <p class="copy">#需頻繁更新市場資訊,並在
            跨部門溝通時產生拉扯</p>
          <P class="number" style="font-size: small">10，17，18</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="3,6,15">
        <div class="content">
          <h2 class="title">物流</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">SCM</p>
          <p>供應鏈管理，確保公司商品出貨流程及建置SOP，危機處理及報關作業。</p>
          <ul>
            <li>談判力</li>
            <li>組織力</li>
            <li>協調力</li>
          </ul>
          <p class="copy">#需要隨時應對突發狀態</p>
          <P class="number" style="font-size: small">3，6，15</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="3,9,10">
        <div class="content">
          <h2 class="title">使用者介面/體驗設計師</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">UI/UX</p>
          <p>優化人與產品間的體驗服務設計</p>
          <ul>
            <li>提問力</li>
            <li>溝通力</li>
            <li>設計力</li>
          </ul>
          <p class="copy">#需持續符合大眾對於
            產品的使用行為。</p>
          <P class="number" style="font-size: small">3，9，10</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="7,10,15">
        <div class="content">
          <h2 class="title">法遵/法務</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">法務</p>
          <p>公司法務重大決策/糾紛調解/合約審核/撰寫/專利申請等。</p>
          <ul>
            <li>溝通力</li>
            <li>協作力</li>
            <li>情商力</li>
          </ul>
          <p class="copy">#相對在组織内部容易
            私底下樹敵。</p>
          <P class="number" style="font-size: small">7，10，15</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="6,22,24">
        <div class="content">
          <h2 class="title">通路行銷</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">行銷</p>
          <p>針對經銷商/代理商做教育訓練，及客戶行銷策略規劃</p>
          <ul>
            <li>市場力</li>
            <li>分析力</li>
            <li>企劃力</li>
          </ul>
          <p class="copy">#相對受地區路/服務對象/
            預算限制。</p>
          <P class="number" style="font-size: small">6，22，24</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="3,6,15">
        <div class="content">
          <h2 class="title">採購</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">SCM</p>
          <p>確保公司用最符合的預算達到採買標準；確保供應商可信度</p>
          <ul>
            <li>敏銳力</li>
            <li>分析力</li>
            <li>談判力</li>
          </ul>
          <p class="copy">#道德標準與誠信度容易
            被放大觀察。</p>
          <P class="number" style="font-size: small">3，6，15</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="3,10,24">
        <div class="content">
          <h2 class="title">售前規劃顧問</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">業務</p>
          <p>具備專業技術/能力的業務職，因應客戶與業務端需求提供資源與建議</p>
          <ul>
            <li>聆聽力</li>
            <li>協作力</li>
            <li>簡報力</li>
          </ul>
          <p class="copy" style="font-size: 12px;">#容易在自我定位(技術職/
            業務職)產生不確定性及
            內外溝通無力感產生。</p>
          <P class="number" style="font-size: small">3，10，24</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="11,16,24">
        <div class="content">
          <h2 class="title">商務開發</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">業務</p>
          <p>從零到一將客戶建立：為客戶創造價值</p>
          <ul>
            <li>陌生開發能力</li>
            <li>服務導向思維</li>
            <li>策略思維</li>
          </ul>
          <p class="copy">#對於公司内部策略推動及
            影響力較低。</p>
          <P class="number" style="font-size: small">11，16，24</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="3,22,23">
        <div class="content">
          <h2 class="title">教育訓練</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">HR</p>
          <p>針對內部員工成長規劃，協助新進員工適應環境，減少員工流動率</p>
          <ul>
            <li>引導力</li>
            <li>衝突管理能力</li>
            <li>持續力</li>
          </ul>
          <p class="copy">#教育訓練模式可能受制於
            公司政策。</p>
          <P class="number" style="font-size: small">3，22，23</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="5,11,21">
        <div class="content">
          <h2 class="title">人才策略夥伴</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">HR</p>
          <p>人才組織發展策略規劃：讓部門人才達到最有效應用</p>
          <ul>
            <li>說服力</li>
            <li>適應力</li>
            <li>商業力</li>
          </ul>
          <p class="copy">#在職位角色認定價值可能
            偏向執行者而非策略者。</p>
          <P class="number" style="font-size: small">5，11，21</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="2,14,15">
        <div class="content">
          <h2 class="title">審計</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">財務會計</p>
          <p>確保內外帳審核無誤符合政府標準</p>
          <ul>
            <li>分析力</li>
            <li>專注力</li>
            <li>洞察力</li>
          </ul>
          <p class="copy">#工作流程自動化以後
            相對沒有成就感；
            工作内容通常可企業外包。</p>
          <P class="number" style="font-size: small">2，14，15</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="4,14,15">
        <div class="content">
          <h2 class="title">薪酬管理</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">HR</p>
          <p>每月計算薪資/年度薪酬與福利規劃</p>
          <ul>
            <li>分析力</li>
            <li>數據力</li>
            <li>市場力</li>
          </ul>
          <p class="copy">#工作流程自動化以後相對
            沒有成就感。</p>
          <P class="number" style="font-size: small">4，14，15</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="4,19,20">
        <div class="content">
          <h2 class="title">客戶服務</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;"></p>
          <p>確保客戶對公司滿意度及解決客訴問題</p>
          <ul>
            <li>情商力</li>
            <li>聆聽力</li>
            <li>選輯力</li>
          </ul>
          <p class="copy">#IQ/EQ控制技巧相對
            被放大檢視。</p>
          <P class="number" style="font-size: small">4，19，20</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="6,15,20">
        <div class="content">
          <h2 class="title">秘書</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;"></p>
          <p>協助主管處理行政類內外事務</p>
          <ul>
            <li>情商力</li>
            <li>敏捷力</li>
            <li>表達力</li>
          </ul>
          <p class="copy">#依主管職位決定
            個人職場價值。</p>
          <P class="number" style="font-size: small">6，15，20</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="5,18,25">
        <div class="content">
          <h2 class="title">招募</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">HR</p>
          <p>依照部門人才需求篩選人才</p>
          <ul>
            <li>溝通力</li>
            <li>文化力</li>
            <li>商業力</li>
          </ul>
          <p class="copy">#人才流動或栽員時,
            可能相對會有無力感。</p>
          <P class="number" style="font-size: small">5，18，25</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="4,18,19">
        <div class="content">
          <h2 class="title">員工關係</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">HR</p>
          <p>勞資雙方關係建立及衝突管理；企業文化建立</p>
          <ul>
            <li>引導力</li>
            <li>共融力</li>
            <li>溝通力</li>
          </ul>
          <p class="copy">#需在勞資雙方關係及
            雙方利益矛盾中拉扯。</p>
          <P class="number" style="font-size: small">4，18，19</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="9,13,25">
        <div class="content">
          <h2 class="title">社群編輯</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">行銷</p>
          <p>文案產出及廣告/社群媒體操作</p>
          <ul>
            <li>創意力</li>
            <li>提問力</li>
            <li>故事力</li>
          </ul>
          <p class="copy">#每天產出大量文案,長期會
            沒有靈感。</p>
          <P class="number" style="font-size: small">9，13，25</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="6,11,16">
        <div class="content">
          <h2 class="title">品牌經理</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">行銷</p>
          <p>透過行銷及營運策略，將整體產品/服務達到營運目標。</p>
          <ul>
            <li>預算規劃力</li>
            <li>市場敏銳力</li>
            <li>簡報力</li>
          </ul>
          <p class="copy">#容易在預算與理發展
            狀態之間拉扯。</p>
          <P class="number" style="font-size: small">6，11，16</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="5,8,12">
        <div class="content">
          <h2 class="title">特助</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;"></p>
          <p>協助主管處理商業類內外事務</p>
          <ul>
            <li>商業力</li>
            <li>細節力</li>
            <li>敏銳力</li>
          </ul>
          <p class="copy">#依主管職位決定
            個人職場價值。(例:幕僚)</p>
          <P class="number" style="font-size: small">5，8，12</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="4,11,15">
        <div class="content">
          <h2 class="title">財務</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">財務會計</p>
          <p>公司財務重大決策/預算控制/財政狀態管理/資金調動/規避投資風險</p>
          <ul>
            <li>策略力</li>
            <li>溝通力</li>
            <li>人脈力</li>
          </ul>
          <p class="copy">#公司有重大財務決策時需負責任。</p>
          <P class="number" style="font-size: small">4，11，15</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this,1)" data-numbers="15,21,24">
        <div class="content">
          <h2 class="title">公關</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">行銷</p>
          <p>維繫雇主品牌及客戶關係，媒體/新聞稿發布及危機事件處理</p>
          <ul>
            <li>人脈力</li>
            <li>適應力</li>
            <li>觀察力</li>
          </ul>
          <p class="copy">#工作職責較有限,
            可能與個人價值觀有所衝突。</p>
          <P class="number" style="font-size: small">15，21，24</P>
        </div>
      </div>

      <div class="card2" onclick="toggleSelection(this)" data-numbers="2,4,15">
        <div class="content">
          <h2 class="title">會計</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">財務會計</p>
          <p>卻保證戶現金流，應收/應付帳款與呆帳處理；稅務處理</p>
          <ul>
            <li>專注力</li>
            <li>分析力</li>
            <li>數據力</li>
          </ul>
          <p class="copy">#工作流程自動化以後相對
            沒有成就感。</p>
          <P class="number" style="font-size: small">2，4，15</P>
        </div>
      </div>
    </div>
  </div>

  <a href="second-conclusion.html.php"><button id="nextButton" onclick="find()">查看分析結果</button></a>


  <script>
    window.onload = function () {
      localStorage.removeItem('selectedcard2');
    };
    const selectedcard2 = [];
    selectedcard2[0] = <?php echo json_encode($user_choices2[0]); ?>;
    selectedcard2[1] = <?php echo json_encode($user_choices2[1]); ?>;
    selectedcard2[2] = <?php echo json_encode($user_choices2[2]); ?>;
console.log(selectedcard2);

var cards = document.querySelectorAll('.card2');
var cardsArray = Array.from(cards);
    cardsArray.forEach(function(card) {
        var cardNumbers = card.getAttribute('data-numbers').split(',').map(Number);
          if (arraysEqual(cardNumbers, selectedcard2)) {
        card.classList.add('selected');
      }
    });

    function arraysEqual(arr1, arr2) {
      if (arr1.length !== arr2.length) return false;
        for (var i = 0; i < arr1.length; i++) {
      if (arr1[i] !== arr2[i]) return false;
      }return true;
    }
updateNextButtonVisibility()

    function toggleSelection(element) {
      const container = element.closest('.card2');
      container.classList.toggle('selected');
      updateNextButtonVisibility();
    }

    function find() {
      const selectedContainers = document.querySelectorAll('.selected');
      const selectedNumbersArray = [];
      selectedContainers.forEach(container => {
        const dataNumbers = container.getAttribute('data-numbers');
        if (dataNumbers) {
          const numbersArray = dataNumbers.split(',').map(Number);
          selectedNumbersArray.push(...numbersArray);
        }
      });
      localStorage.setItem('selectedcard2', JSON.stringify(selectedNumbersArray));
      selectedcard2.length = 0;
      selectedcard2.push(...selectedNumbersArray);

      console.log(selectedcard2);
    }



    function updateNextButtonVisibility() {
      const selectedCount = document.querySelectorAll('.selected').length;
      const nextButton = document.getElementById('nextButton');
      nextButton.style.display = selectedCount == 1 ? 'block' : 'none';
    }
  </script>
  <script>
    $("#nextButton").on("click", function (event) {
      console.log('123')
      // 使用 ajax 送出
      $.ajax({
        type: "POST",
        url: "php/add_number.php",
        data: {
          user_id: <?php echo json_encode($user_id); ?>,
          un: <?php echo json_encode($user_name); ?>,
          n1: selectedcard2[0],
          n2: selectedcard2[1],
          n3: selectedcard2[2],
      },

        dataType: 'html' // 設定該網頁回應的會是 html 格式
    }).done(function (data) {
          // 成功的時候
          console.log(data);
          if (data == "yes") {
            // alert("加入成功");
            // 新增成功，轉跳到結果頁面。
            // window.location.href="login.php";
          } else {
            alert("加入失敗，請與系統人員聯繫");
          }
        }).fail(function (jqXHR, textStatus, errorThrown) {
          // 失敗的時候
          // alert("有錯誤產生，請看 console log");
          console.log(jqXHR.responseText);
        });
  });
  </script>
</body>

</html>