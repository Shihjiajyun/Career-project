<?php
require_once 'php/db.php';
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Add your stylesheets or other head elements here -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/first-conclusion.css">
  <link rel="stylesheet" href="css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <title>職涯卡牌網站</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid d-flex align-items-center">
    <p class="navbar-brand" style="font-size: 22px;">
      <?php
        require_once 'php/db.php';
        require_once 'php/function.php';
        @session_start();
        if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']) {
          // header("Location: login.php");
          echo "您目前尚未登入帳號";
        }else{
          $user_name = $_SESSION['username'];
          echo "歡迎回來，$user_name";
        }
        
      ?>
    </p>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto list-unstyled justify-content-end" style="font-size: 22px;">
        <?php if(isset($_SESSION['is_login']) && $_SESSION['is_login']) { ?>
          <li class="nav-item">
            <a class="nav-link" href="#"><span style="color: #C5CBD3;">登入</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./php/logout.php"><span style="color: black;">登出</span></a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php"><span style="color: black;">登入</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><span style="color: #C5CBD3;">登出</span></a>
          </li>
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



  <a href="second-choose.html.php"><button class="nextButton">進行第二項測驗</button></a>

  <script>

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







  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>