<?php
require_once 'php/db.php';
@session_start();

$host = 'hkg1.clusters.zeabur.com';
$port = 31522;
$dbuser = 'root';
$dbpw = 'yExzLv7UDIf91G84KX0hdF23mop6SV5a';
$dbname = 'career';

// 連接到資料庫
$conn = new mysqli($host, $dbuser, $dbpw, $dbname, $port);


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
  echo "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>職涯卡牌網站</title>
  <link rel="stylesheet" href="css/second-conclusion.css">
  <link rel="stylesheet" href="css/conclusion.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/second-choose.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body style="margin: 0px;">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid d-flex align-items-center">
      <p class="navbar-brand" style="font-size: 22px;">
        <?php
        require_once 'php/db.php';
        require_once 'php/function.php';
        @session_start();
        if (!isset($_SESSION['is_login']) || !$_SESSION['is_login']) {
          // header("Location: login.php");
          echo "您目前尚未登入帳號";
        } else {
          $user_name = $_SESSION['username'];
          echo "歡迎回來，$user_name";
        }

        ?>
      </p>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto list-unstyled justify-content-end" style="font-size: 22px;">
          <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login']) { ?>
            <a class="nav-link nav-item" href="#"><span style="color: #C5CBD3;">登入</span></a>
            <a class="nav-link nav-item" href="./php/logout.php"><span style="color: black;">登出</span></a>
          <?php } else { ?>
            <a class="nav-link nav-item" href="login.php"><span style="color: black;">登入</span></a>
            <a class="nav-link nav-item" href="#"><span style="color: #C5CBD3;">登出</span></a>
          <?php } ?>
        </ul>
      </div>

    </div>
  </nav>
  <div class="select">
    <h2 style="text-align: center;">您所選擇的字母順序是：</h2>
  </div>
  <h2 style="margin-left: 20px;">主要符合職業：</h2>
  <div id="designedCareers" class="container">
    <div class="row d-flex flex-wrap">
      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="A,I">
          <div class="content2">
            <h2 class="title">多媒體設計師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">利用電腦、影片等多媒體素材、創作動畫、電影、特效、廣告等。</p>
            <P class="number" style="font-size: small">A、I</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,I,R">
          <div class="content2">
            <h2 class="title">資訊安全人員</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">保護網路、資訊和重要的電子設備:處理電腦安全漏洞和病毒。</p>
            <P class="number" style="font-size: small">C、I、R</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="A,R,E">
          <div class="content2">
            <h2 class="title">平面設計師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">按照客戶需求,以各種材料設計國案，於銷售或宜傳時使用</p>
            <P class="number" style="font-size: small">A、R、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R,C">
          <div class="content2">
            <h2 class="title">環工工程師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">設計、規劃或執行與環境衛生相關的工程，如廢棄物處理等</p>
            <P class="number" style="font-size: small">I、R、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,E,R">
          <div class="content2">
            <h2 class="title">行政人員</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">處理辦公室行政,可能包含接聽電話、設備操作、文件處理。</p>
            <P class="number" style="font-size: small">C、E、R</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,E">
          <div class="content2">
            <h2 class="title">採購</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">購買企業所需的物品或服務。採購原物料、設備或工具,以利生產。</p>
            <P class="number" style="font-size: small">C、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,S,C">
          <div class="content2">
            <h2 class="title">客服人員</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">回應並處理顧客所提出的問題。</p>
            <P class="number" style="font-size: small">E、S、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,A">
          <div class="content2">
            <h2 class="title">廣告文案</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">為產品或公司撰寫宣傳文案，於各種媒體與廣告中使用。</p>
            <P class="number" style="font-size: small">E、A</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,A,S">
          <div class="content2">
            <h2 class="title">公關</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">運用各種宣傳素材、廣告媒體和公開活動，進而提升個人或組織形象。</p>
            <P class="number" style="font-size: small">E、A、S</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,A">
          <div class="content2">
            <h2 class="title">數位行銷</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">於網路進行商業活動,規劃營運策略、販售商品服務、處理網路訂單等。</p>
            <P class="number" style="font-size: small">E、A</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,C">
          <div class="content2">
            <h2 class="title">業務人員</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">需熟悉公司產品並負責銷售,可能需要陌生開發、簽約報價、提供顧客服務。</p>
            <P class="number" style="font-size: small">E、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="A,R,E">
          <div class="content2">
            <h2 class="title">商業與工業設計師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">按照需求規格,設計兼具美感和功能的產品如家電用品、手機等。
            </p>
            <P class="number" style="font-size: small">A、R、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,E">
          <div class="content2">
            <h2 class="title">會計師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">分析企業财務現況,編製各種報表,包含資產負債、利潤虧損等項目。
            </p>
            <P class="number" style="font-size: small">C、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,C,S">
          <div class="content2">
            <h2 class="title">人力資源專員</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">從事企業的人力資源相關工作,包括招募、教育訓練、薪酬等層面。
            </p>
            <P class="number" style="font-size: small">E、C、S</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,C,S">
          <div class="content2">
            <h2 class="title">專案管理師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">負責專案計畫的控管和執行,需要掌握溝通、時間、成本等知識與能力。
            </p>
            <P class="number" style="font-size: small">E、C、S</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R,C">
          <div class="content2">
            <h2 class="title">機電工程師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">運用機械、電機與電腦工程原理,設計自動化或智慧型的系統與產品。
            </p>
            <P class="number" style="font-size: small">I、R、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,E,C">
          <div class="content2">
            <h2 class="title">市場調查人員
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">調查並研究市場現況與未來趨勢，提供行銷決策時所必需的資料。
            </p>
            <P class="number" style="font-size: small">I、E、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R,E">
          <div class="content2">
            <h2 class="title">材料工程師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">評估材料和製程,製造符合產品設計與規格的材料，如金屬、塑膠、陶瓷等。
            </p>
            <P class="number" style="font-size: small">I、R、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R">
          <div class="content2">
            <h2 class="title">航太工程師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">進行專案,設計、開發和測試飛機、飛彈和太空船等設備。
            </p>
            <P class="number" style="font-size: small">I、R</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,C">
          <div class="content2">
            <h2 class="title">程式設計師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">分析、編寫、修改、測試程式碼,開發電腦應用程式。
            </p>
            <P class="number" style="font-size: small">I、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,I,E">
          <div class="content2">
            <h2 class="title">金融投資分析師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">收集市場資訊進行分析，研判趨勢並引導投資者進行投資。
            </p>
            <P class="number" style="font-size: small">C、I、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,I,C">
          <div class="content2">
            <h2 class="title">網站行銷策畫
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">研究搜尋引擎的收錄規則、研究使用者行為,增加網路曝光程度。
            </p>
            <P class="number" style="font-size: small">E、I、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,I,E">
          <div class="content2">
            <h2 class="title">精算師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">分析人口統計資料,進行風險預測、預估資金流動、計算保險費率等。
            </p>
            <P class="number" style="font-size: small">C、I、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R">
          <div class="content2">
            <h2 class="title">化工工程師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">設計化工廠的製造流程及開發化工產品,
              如化妝品、塑膠、水泥等。
            </p>
            <P class="number" style="font-size: small">I、R</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,I,C">
          <div class="content2">
            <h2 class="title">企管顧問
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">與企業管理與和決策過程提出未来發展建議或現況改善方案。
            </p>
            <P class="number" style="font-size: small">E、I、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,E,C">
          <div class="content2">
            <h2 class="title">商業智慧分析師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">透過資料分析工具,研究過去企業資料,
              整理成報表輔佐決策。
            </p>
            <P class="number" style="font-size: small">I、E、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,C,E">
          <div class="content2">
            <h2 class="title">數據分析師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">收集並分析大量數據,依此歸納與預測
              未來趨勢、評估與訂定決策。
            </p>
            <P class="number" style="font-size: small">I、C、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,I,R">
          <div class="content2">
            <h2 class="title">網站開發人員
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">分析使用者需求,設計網站內容，包含文字、圖形、影像等。
            </p>
            <P class="number" style="font-size: small">C、I、R</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R,C">
          <div class="content2">
            <h2 class="title">電腦硬體工程師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">研究、設計、開發與測試電腦硬體設備,或是監測製造與安裝造程。
            </p>
            <P class="number" style="font-size: small">I、R、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R,C">
          <div class="content2">
            <h2 class="title">光電工程師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">運用工程與数學原理,研發光能利用的技術。
            </p>
            <P class="number" style="font-size: small">I、R、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R,C">
          <div class="content2">
            <h2 class="title">機械工程師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">規劃和設計工具、引擎、機器等裝備,也會負責安装、操作、维修等工作。
            </p>
            <P class="number" style="font-size: small">I、R、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R,C">
          <div class="content2">
            <h2 class="title">網管人員</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">負責維繫企業的網路環境，進行维護與檢測，確保網路環境顺暢運作。
            </p>
            <P class="number" style="font-size: small">I、R、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,I">
          <div class="content2">
            <h2 class="title">資料與檔案管理員</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">保存、维護並管理赏料、文件、檔案及相關系统,包含數位内容或實際物品。
            </p>
            <P class="number" style="font-size: small">C、I</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R">
          <div class="content2">
            <h2 class="title">生化工程師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">以生命科學與化學知識、技術開發產品，解決人、動植物、微生物相關問題。
            </p>
            <P class="number" style="font-size: small">I、R</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R">
          <div class="content2">
            <h2 class="title">電機工程師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">開發、監測電機設備或電機系統的製造和安裝
            </p>
            <P class="number" style="font-size: small">I、R</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R">
          <div class="content2">
            <h2 class="title">人因工程師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">根據人類行為,設計設備工具或工作環境,
              讓人與系统互動發揮更大效益。
            </p>
            <p class="number" style="font-size: small">I、R</p>
          </div>
        </div>
      </div>

    </div>
  </div>
  <h2 style="margin-left: 20px;">次要符合職業：</h2>
  <div id="designedCareers1" class="container">
    <div class="row d-flex flex-wrap">
      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="A,I">
          <div class="content2">
            <h2 class="title">多媒體設計師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">利用電腦、影片等多媒體素材、創作動畫、電影、特效、廣告等。</p>
            <P class="number" style="font-size: small">A、I</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,I,R">
          <div class="content2">
            <h2 class="title">資訊安全人員</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">保護網路、資訊和重要的電子設備:處理電腦安全漏洞和病毒。</p>
            <P class="number" style="font-size: small">C、I、R</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="A,R,E">
          <div class="content2">
            <h2 class="title">平面設計師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">按照客戶需求,以各種材料設計國案，於銷售或宜傳時使用</p>
            <P class="number" style="font-size: small">A、R、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R,C">
          <div class="content2">
            <h2 class="title">環工工程師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">設計、規劃或執行與環境衛生相關的工程，如廢棄物處理等</p>
            <P class="number" style="font-size: small">I、R、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,E,R">
          <div class="content2">
            <h2 class="title">行政人員</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">處理辦公室行政,可能包含接聽電話、設備操作、文件處理。</p>
            <P class="number" style="font-size: small">C、E、R</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,E">
          <div class="content2">
            <h2 class="title">採購</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">購買企業所需的物品或服務。採購原物料、設備或工具,以利生產。</p>
            <P class="number" style="font-size: small">C、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,S,C">
          <div class="content2">
            <h2 class="title">客服人員</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">回應並處理顧客所提出的問題。</p>
            <P class="number" style="font-size: small">E、S、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,A">
          <div class="content2">
            <h2 class="title">廣告文案</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">為產品或公司撰寫宣傳文案，於各種媒體與廣告中使用。</p>
            <P class="number" style="font-size: small">E、A</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,A,S">
          <div class="content2">
            <h2 class="title">公關</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">運用各種宣傳素材、廣告媒體和公開活動，進而提升個人或組織形象。</p>
            <P class="number" style="font-size: small">E、A、S</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,A">
          <div class="content2">
            <h2 class="title">數位行銷</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">於網路進行商業活動,規劃營運策略、販售商品服務、處理網路訂單等。</p>
            <P class="number" style="font-size: small">E、A</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,C">
          <div class="content2">
            <h2 class="title">業務人員</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">需熟悉公司產品並負責銷售,可能需要陌生開發、簽約報價、提供顧客服務。</p>
            <P class="number" style="font-size: small">E、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="A,R,E">
          <div class="content2">
            <h2 class="title">商業與工業設計師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">按照需求規格,設計兼具美感和功能的產品如家電用品、手機等。
            </p>
            <P class="number" style="font-size: small">A、R、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,E">
          <div class="content2">
            <h2 class="title">會計師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">分析企業财務現況,編製各種報表,包含資產負債、利潤虧損等項目。
            </p>
            <P class="number" style="font-size: small">C、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,C,S">
          <div class="content2">
            <h2 class="title">人力資源專員</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">從事企業的人力資源相關工作,包括招募、教育訓練、薪酬等層面。
            </p>
            <P class="number" style="font-size: small">E、C、S</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,C,S">
          <div class="content2">
            <h2 class="title">專案管理師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">負責專案計畫的控管和執行,需要掌握溝通、時間、成本等知識與能力。
            </p>
            <P class="number" style="font-size: small">E、C、S</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R,C">
          <div class="content2">
            <h2 class="title">機電工程師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">運用機械、電機與電腦工程原理,設計自動化或智慧型的系統與產品。
            </p>
            <P class="number" style="font-size: small">I、R、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,E,C">
          <div class="content2">
            <h2 class="title">市場調查人員
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">調查並研究市場現況與未來趨勢，提供行銷決策時所必需的資料。
            </p>
            <P class="number" style="font-size: small">I、E、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R,E">
          <div class="content2">
            <h2 class="title">材料工程師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">評估材料和製程,製造符合產品設計與規格的材料，如金屬、塑膠、陶瓷等。
            </p>
            <P class="number" style="font-size: small">I、R、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R">
          <div class="content2">
            <h2 class="title">航太工程師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">進行專案,設計、開發和測試飛機、飛彈和太空船等設備。
            </p>
            <P class="number" style="font-size: small">I、R</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,C">
          <div class="content2">
            <h2 class="title">程式設計師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">分析、編寫、修改、測試程式碼,開發電腦應用程式。
            </p>
            <P class="number" style="font-size: small">I、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,I,E">
          <div class="content2">
            <h2 class="title">金融投資分析師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">收集市場資訊進行分析，研判趨勢並引導投資者進行投資。
            </p>
            <P class="number" style="font-size: small">C、I、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,I,C">
          <div class="content2">
            <h2 class="title">網站行銷策畫
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">研究搜尋引擎的收錄規則、研究使用者行為,增加網路曝光程度。
            </p>
            <P class="number" style="font-size: small">E、I、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,I,E">
          <div class="content2">
            <h2 class="title">精算師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">分析人口統計資料,進行風險預測、預估資金流動、計算保險費率等。
            </p>
            <P class="number" style="font-size: small">C、I、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R">
          <div class="content2">
            <h2 class="title">化工工程師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">設計化工廠的製造流程及開發化工產品,
              如化妝品、塑膠、水泥等。
            </p>
            <P class="number" style="font-size: small">I、R</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="E,I,C">
          <div class="content2">
            <h2 class="title">企管顧問
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">與企業管理與和決策過程提出未来發展建議或現況改善方案。
            </p>
            <P class="number" style="font-size: small">E、I、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,E,C">
          <div class="content2">
            <h2 class="title">商業智慧分析師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">透過資料分析工具,研究過去企業資料,
              整理成報表輔佐決策。
            </p>
            <P class="number" style="font-size: small">I、E、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,C,E">
          <div class="content2">
            <h2 class="title">數據分析師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">收集並分析大量數據,依此歸納與預測
              未來趨勢、評估與訂定決策。
            </p>
            <P class="number" style="font-size: small">I、C、E</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,I,R">
          <div class="content2">
            <h2 class="title">網站開發人員
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">分析使用者需求,設計網站內容，包含文字、圖形、影像等。
            </p>
            <P class="number" style="font-size: small">C、I、R</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R,C">
          <div class="content2">
            <h2 class="title">電腦硬體工程師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">研究、設計、開發與測試電腦硬體設備,或是監測製造與安裝造程。
            </p>
            <P class="number" style="font-size: small">I、R、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R,C">
          <div class="content2">
            <h2 class="title">光電工程師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">運用工程與数學原理,研發光能利用的技術。
            </p>
            <P class="number" style="font-size: small">I、R、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R,C">
          <div class="content2">
            <h2 class="title">機械工程師
            </h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">規劃和設計工具、引擎、機器等裝備,也會負責安装、操作、维修等工作。
            </p>
            <P class="number" style="font-size: small">I、R、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R,C">
          <div class="content2">
            <h2 class="title">網管人員</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">負責維繫企業的網路環境，進行维護與檢測，確保網路環境顺暢運作。
            </p>
            <P class="number" style="font-size: small">I、R、C</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="C,I">
          <div class="content2">
            <h2 class="title">資料與檔案管理員</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">保存、维護並管理赏料、文件、檔案及相關系统,包含數位内容或實際物品。
            </p>
            <P class="number" style="font-size: small">C、I</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R">
          <div class="content2">
            <h2 class="title">生化工程師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">以生命科學與化學知識、技術開發產品，解決人、動植物、微生物相關問題。
            </p>
            <P class="number" style="font-size: small">I、R</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R">
          <div class="content2">
            <h2 class="title">電機工程師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">開發、監測電機設備或電機系統的製造和安裝
            </p>
            <P class="number" style="font-size: small">I、R</P>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-3" id="hide">
        <div class="card" data-letter="I,R">
          <div class="content2">
            <h2 class="title">人因工程師</h2>
            <p style="margin-top: 2px; margin-bottom: 0px;">根據人類行為,設計設備工具或工作環境,
              讓人與系统互動發揮更大效益。
            </p>
            <p class="number" style="font-size: small">I、R</p>
          </div>
        </div>
      </div>

    </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <h2 style="text-align: center;" id="selectedCardsResult2"></h2>
  <div id="designedcard2s" class="result-container">
    <div class="page-content center" style="margin-left: 25%;">
      <div class="card2" data-numbers="3,12,15">
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

      <div class="card2" data-numbers="4,7,9">
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

      <div class="card2" data-numbers="18,21,23">
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

      <div class="card2" data-numbers="1,2,12">
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

      <div class="card2" data-numbers="2,8,26">
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

      <div class="card2" data-numbers="8,10,24">
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

      <div class="card2" data-numbers="8,24,26">
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

      <div class="card2" data-numbers="6,11,24">
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

      <div class="card2" data-numbers="10,17,18">
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

      <div class="card2" data-numbers="3,6,15">
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

      <div class="card2" data-numbers="3,9,10">
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

      <div class="card2" data-numbers="7,10,15">
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

      <div class="card2" data-numbers="6,22,24">
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

      <div class="card2" data-numbers="3,6,15">
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

      <div class="card2" data-numbers="3,10,24">
        <div class="content">
          <h2 class="title">售前規劃顧問</h2>
          <p style="margin-top: 2px;margin-bottom: 0px;">業務</p>
          <p>具備專業技術/能力的業務職，因應客戶與業務端需求提供資源與建議</p>
          <ul>
            <li>聆聽力</li>
            <li>協作力</li>
            <li>簡報力</li>
          </ul>
          <p class="copy">#容易在自我定位(技術職/
            業務職)產生不確定性及
            內外溝通無力感產生。</p>
          <P class="number" style="font-size: small">3，10，24</P>
        </div>
      </div>

      <div class="card2" data-numbers="11,16,24">
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

      <div class="card2" data-numbers="3,22,23">
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

      <div class="card2" data-numbers="5,11,21">
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

      <div class="card2" data-numbers="2,14,15">
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

      <div class="card2" data-numbers="4,14,15">
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

      <div class="card2" data-numbers="4,19,20">
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

      <div class="card2" data-numbers="6,15,20">
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

      <div class="card2" data-numbers="5,18,25">
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

      <div class="card2" data-numbers="4,18,19">
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

      <div class="card2" data-numbers="9,13,25">
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

      <div class="card2" data-numbers="6,11,16">
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

      <div class="card2" data-numbers="5,8,12">
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

      <div class="card2" data-numbers="4,11,15">
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

      <div class="card2" data-numbers="15,21,24">
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

      <div class="card2" data-numbers="2,4,15">
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
  <br>
  <!-- Display selected card3s -->
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
  <!-- <button class="nextButton" style="display: block;" onclick="downloadPageAsPDF()">下載結果</button> -->
  <script>
    function downloadPageAsPDF() {
      html2pdf(document.body);
    }
    const selectedCareersString = localStorage.getItem('selectedLetters');
    const selectedCareersArray = selectedCareersString ? JSON.parse(selectedCareersString) : [];
    const combinations = getCombinations(selectedCareersArray);
    function updateSelectedLetters() {
      const selectDiv = document.querySelector('.select');
      const h2Element = selectDiv.querySelector('h2');
      h2Element.textContent = `您所選擇的字母順序是：${selectedCareersArray.join(', ')}`;
    }
    function updateSelectedLetters2() {
      const selectDiv = document.querySelector('.select');
      const h2Element = selectDiv.querySelector('h2');
      h2Element.textContent = `請回到上一頁面重新選擇卡片`;
    }
    function getCombinations(letters) {
      const results = [];

      function generateCombinations(current, remaining) {
        if (current.length === 2 || current.length === 3) {
          results.push(current.slice());
        }
        for (let i = 0; i < remaining.length; i++) {
          current.push(remaining[i]);
          generateCombinations(current, remaining.slice(i + 1));
          current.pop();
        }
      }
      generateCombinations([], letters);
      return results;
    }
    function areArraysEqual(arr1, arr2) {
      const str1 = JSON.stringify(arr1);
      const str2 = JSON.stringify(arr2);
      return str1 === str2;
    }


    // 主要符合
    if (selectedCareersArray.length === 3) {
      updateSelectedLetters();
      const designedCardsElement = document.getElementById('designedCareers');
      designedCardsElement.querySelectorAll('.card').forEach(cardDiv => {
        if (cardDiv) {
          const cardLetters = cardDiv.getAttribute('data-letter').split(',');
          const intersection = cardLetters.filter(letter => selectedCareersArray.includes(letter));
          // console.log(cardLetters);
          if (intersection.length >= 2) {
            for (let i = 0; i < 4; i++) {
              const currentCombination = combinations[i];
              const arraysEqual = areArraysEqual(currentCombination, cardLetters);
              // console.log(cardLetters);
              // console.log(currentCombination);
              // console.log(arraysEqual);
              cardDiv.closest('.col-lg-4.col-md-6.col-sm-12.mb-3').classList.remove('d-none');
              if (arraysEqual) {
                cardDiv.closest('.col-lg-4.col-md-6.col-sm-12.mb-3').classList.add('block');
              } else {
                cardDiv.closest('.col-lg-4.col-md-6.col-sm-12.mb-3').classList.add('hide');
              }
            }
          }
          else {
            cardDiv.closest('.col-lg-4.col-md-6.col-sm-12.mb-3').classList.add('d-none');
          }
        }
      });
    } else {
      const designedCardsElement = document.getElementById('designedCareers');
      designedCardsElement.querySelectorAll('.card').forEach(cardDiv => {
        cardDiv.closest('.col-lg-4.col-md-6.col-sm-12.mb-3').classList.add('d-none');
      });
      updateSelectedLetters2();
    }

    // 次要符合
    if (selectedCareersArray.length === 3) {
      updateSelectedLetters();
      const designedCardsElement = document.getElementById('designedCareers1');
      designedCardsElement.querySelectorAll('.card').forEach(cardDiv => {
        if (cardDiv) {
          const cardLetters = cardDiv.getAttribute('data-letter').split(',');
          const intersection = cardLetters.filter(letter => selectedCareersArray.includes(letter));
          // console.log(cardLetters);
          if (intersection.length >= 2) {
            for (let i = 0; i < 4; i++) {
              const currentCombination = combinations[i];
              const arraysEqual = areArraysEqual(currentCombination, cardLetters);
              // console.log(cardLetters);
              // console.log(currentCombination);
              // console.log(arraysEqual);
              cardDiv.closest('.col-lg-4.col-md-6.col-sm-12.mb-3').classList.remove('d-none');
              if (arraysEqual) {
                cardDiv.closest('.col-lg-4.col-md-6.col-sm-12.mb-3').classList.add('hide');
              } else {
                // cardDiv.closest('.col-lg-4.col-md-6.col-sm-12.mb-3').classList.add('block');
              }
            }
          }
          else {
            cardDiv.closest('.col-lg-4.col-md-6.col-sm-12.mb-3').classList.add('d-none');
          }
        }
      });
    } else {
      const designedCardsElement = document.getElementById('designedCareers');
      designedCardsElement.querySelectorAll('.card').forEach(cardDiv => {
        cardDiv.closest('.col-lg-4.col-md-6.col-sm-12.mb-3').classList.add('d-none');
      });
      updateSelectedLetters2();
    }



    document.addEventListener('DOMContentLoaded', function () {
      const selectedCareer2sResultElement = document.getElementById('selectedCardsResult2');
      const selectedCareer2String = localStorage.getItem('selectedcard2');
      const selectedCareers2Array = selectedCareer2String ? JSON.parse(selectedCareer2String) : [];

      // 使用 querySelectorAll 取得所有符合條件的 card2 元素
      const cardDivs2 = document.querySelectorAll('.card2');

      // 迴圈處理每個 card2 元素
      cardDivs2.forEach(cardDiv2 => {
        const cardNumber = cardDiv2.getAttribute('data-numbers').split(',');
        const cardNumberAsNumbers = cardNumber.map(element => parseInt(element, 10));
        const intersection2 = cardNumberAsNumbers.filter(numbers => selectedCareers2Array.includes(numbers));

        if (selectedCareers2Array.length >= 3) {
          selectedCareer2sResultElement.textContent = '您所選擇的職業編號為：' + selectedCareers2Array.join(', ');
        } else {
          selectedCareer2sResultElement.textContent = '適合您的職業較為廣泛!!';
        }

        if (intersection2.length == 3) {
          cardDiv2.closest('.card2').classList.remove('d-none');
        } else {
          cardDiv2.closest('.card2').classList.add('d-none');
        }
      });
    });
  </script>
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
  <footer style="height: 100px;">
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
</body>

</html>