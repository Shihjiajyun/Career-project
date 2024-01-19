<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫，另外後台都會用 session 判別暫存資料，所以要請求 db.php 因為該檔案最上方有啟動session_start()。
require_once 'php/db.php';
//print_r($_SESSION); //查看目前session內容

//如過沒有 $_SESSION['is_login'] 這個值，或者 $_SESSION['is_login'] 為 false 都代表沒登入
if(!isset($_SESSION['is_login']) || !$_SESSION['is_login'])
{
	//直接轉跳到 login.php
	header("Location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Card Selection</title>
  <link rel="stylesheet" href="css/card.css">
  <link rel="stylesheet" href="css/all.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- 引入 Bootstrap CSS -->
</head>

<body>
  <ul class="nav-pills" style="position: absolute;top: 20px;right: 100px;">
    <li role="presentation" style="list-style:none;" ><a href="php/logout.php" style="text-decoration: none;color: rgb(0, 0, 0);font-size:25px;"><span >登出</span></a></li>
  </ul>

  <div class="select">
    <h1 style="text-align: center;">請選擇三個字母，並且按照志願排序</h1>
    <h2 style="text-align: center;">您所選擇的字母是：</h2>
  </div>
  <div class="cards">
    <div class="card" data-letter="S" id="S1">
      <div class="card__image-holder">
        <img class="card__image" src="img/helper.png" height="200px" />
      </div>
      <div class="card-title">
        <a href="#" class="toggle-info btn">
          <span class="left"></span>
          <span class="right"></span>
        </a>
        <!-- <div class="checkmark"></div> -->
        <h2>
          助人者Social
          <p>#社工心理&ensp;#教育&ensp;#醫護&ensp;#宗教</p>
        </h2>
      </div>
      <div class="card-flap flap1">
        <p style="width: 90%;margin-left: auto;margin-right: auto;">助人者個性友善且極具包容力，喜歡和人
          互動與幫助他人。關懷社會、生態或周圍
          的人群，經常教導、協助、照顧別人、解決
          他人的困難懂得傾聽與溝通,擅長解決
          人際衝突。在生涯選擇上適合與人互、
          協助他人和教導培訓等工作。</p>
        <p style="margin-bottom: 0px;">【優勢】</p>
        <p style="margin-top: 0px;width: 90%;margin-left: auto;margin-right: auto;">協調人際活動<br>發現與解決他人問題<br>優秀的人際與情緒管理能力
        </p>
        <p style="margin-bottom: 0px;margin-top: 5px;">【典型對應職業】</p>
        <p style="margin-top: 0px;width: 90%;margin-left: auto;margin-right: auto;">教育、社工心理、醫護或宗教等領域</p>
        <div class="card-flap flap2">
          <div class="card-actions" id="cardS">
            <div class="button-container">
              <button class="btn1" onclick="storeLetter('S', 0)">1</button>
              <button class="btn2" onclick="storeLetter('S', 1)">2</button>
              <button class="btn3" onclick="storeLetter('S', 2)">3</button>
            </div>
            <div class="cancel">
              <button class="cancelButton" onclick="cancelSelection('S')" id="cancelBtnS">取消</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card" data-letter="E" id="E1">
      <div class="card__image-holder">
        <img class="card__image" src="img/influence.png" height="200px" />
      </div>
      <div class="card-title">
        <a href="#" class="toggle-info btn">
          <span class="left"></span>
          <span class="right"></span>
        </a>
        <!-- <div class="checkmark"></div> -->
        <h2>
          影響者Enterprising
          <p>#企管領導&ensp;#行銷企劃&ensp;#法律&ensp;#政治</p>
        </h2>
      </div>
      <div class="card-flap flap1">
        <p style="width: 90%;margin-left: auto;margin-right: auto;">影響者自信果敢且充滿精力，勇於競爭與
          冒險，喜歡商業活動與策。擅長運用自
          己的資源和能力影響或說服別人，讓別人
          贊同自己提出的想法或執行方式。適合當
          企業家，鼓舞他人合作並發起計劃。在生
          涯選擇上，會追求聲望地位較高的工作。</p>
        <p style="margin-bottom: 0px;">【優勢】</p>
        <p style="margin-top: 0px;width: 90%;margin-left: auto;margin-right: auto;">能找出商業或獲利機會
          <br>適合管理與監督工作
          <br>
          具有銷售與說服技巧的潛力
        </p>
        <p style="margin-bottom: 0px;margin-top: 5px;">【典型對應職業】</p>
        <p style="margin-top: 0px;width: 90%;margin-left: auto;margin-right: auto;">企管領導、行銷企劃、法律政治等領域</p>
        <div class="card-flap flap2">
          <div class="card-actions" id="cardE">
            <div class="button-container">
              <button class="btn1" onclick="storeLetter('E', 0)">1</button>
              <button class="btn2" onclick="storeLetter('E', 1)">2</button>
              <button class="btn3" onclick="storeLetter('E', 2)">3</button>
            </div>
            <div class="cancel">
              <button class="cancelButton" onclick="cancelSelection('E')" id="cancelBtnE">取消</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card" data-letter="R" id="R1">
      <div class="card__image-holder">
        <img class="card__image" src="img/practitioner.png" height="200px" />
      </div>
      <div class="card-title">
        <a href="#" class="toggle-info btn">
          <span class="left"></span>
          <span class="right"></span>
        </a>
        <!-- <div class="checkmark"></div> -->
        <h2>
          實踐者Realistic
          <p>#機械電子&ensp;#農林漁牧&ensp;#建築工藝&ensp;#運動</p>
        </h2>
      </div>
      <div class="card-flap flap1">
        <p style="width: 90%;margin-left: auto;margin-right: auto;">實踐者注重實際行動，常獨自完成任務
          喜歡機械或可操作的工具。喜歡戶外活動
          、肢體運動和各種冒險探索。面對問題時，
          比起討論或空想，更喜歡直接當試。在生
          涯選擇上，喜歡能產生具體作品或成果的
          工作。</p>
        <p style="margin-bottom: 0px;">【優勢】</p>
        <p style="margin-top: 0px;width: 90%;margin-left: auto;margin-right: auto;">機械與設備操作,對工具運用、設備操作、廚藝手工與飼動物有天賦
        </p>
        <p style="margin-bottom: 0px;margin-top: 5px;">【典型對應職業】</p>
        <p style="margin-top: 0px;width: 90%;margin-left: auto;margin-right: auto;">機械電子、農林漁牧、運動或建築工藝領域</p>
        <div class="card-flap flap2">
          <div class="card-actions" id="cardR">
            <div class="button-container">
              <button class="btn1" onclick="storeLetter('R', 0)">1</button>
              <button class="btn2" onclick="storeLetter('R', 1)">2</button>
              <button class="btn3" onclick="storeLetter('R', 2)">3</button>
            </div>

            <div class="cancel">
              <button class="cancelButton" onclick="cancelSelection('R')" id="cancelBtnR">取消</button>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="card" data-letter="I" id="I1">
      <div class="card__image-holder">
        <img class="card__image" src="img/thinker.png" height="200px" />
      </div>
      <div class="card-title">
        <a href="#" class="toggle-info btn">
          <span class="left"></span>
          <span class="right"></span>
        </a>
        <!-- <div class="checkmark"></div> -->
        <h2>
          思考者Investigative
          <p>#統計分析#人文科學#理工研究#生醫研發</p>
        </h2>
      </div>
      <div class="card-flap flap1">
        <p style="width: 90%;margin-left: auto;margin-right: auto;">思考者好奇心強，喜歡分析、思考與解決
          複雜問題。擅長觀察、構想、追尋真理並提
          出各種假設，常接觸人文科學或科技領域
          的資訊。在資料分析與理論建構方面，是
          不可多得的人才。在生涯選擇上，喜歡需
          要思考與研究的專業工作。</p>
        <p style="margin-bottom: 0px;">【優勢】</p>
        <p style="margin-top: 0px;width: 90%;margin-left: auto;margin-right: auto;">理解、解決科學或數學問題
          <br>
          研究分析與解釋資料、構想與理論
          <br>抽象思考
        </p>
        <p style="margin-bottom: 0px;margin-top: 5px;">【典型對應職業】</p>
        <p style="margin-top: 0px;width: 90%;margin-left: auto;margin-right: auto;">理工生醫或人文科學領域</p>
        <div class="card-flap flap2">
          <div class="card-actions" id="cardI">
            <div class="button-container">
              <button class="btn1" onclick="storeLetter('I', 0)">1</button>
              <button class="btn2" onclick="storeLetter('I', 1)">2</button>
              <button class="btn3" onclick="storeLetter('I', 2)">3</button>
            </div>

            <div class="cancel">
              <button class="cancelButton" onclick="cancelSelection('I')" id="cancelBtnI">取消</button>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="card" data-letter="A" id="A1">
      <div class="card__image-holder">
        <img class="card__image" src="img/website-creator.png" height="200px" />
      </div>
      <div class="card-title">
        <a href="#" class="toggle-info btn">
          <span class="left"></span>
          <span class="right"></span>
        </a>
        <!-- <div class="checkmark"></div> -->
        <h2>
          創造者Artistic
          <p>#造型設計&ensp;#藝術設計&ensp;#藝術家&ensp;#導演</p>
        </h2>
      </div>
      <div class="card-flap flap1">
        <p style="width: 90%;margin-left: auto;margin-right: auto;">創造者充滿創意與想像力，總是有很多新
          穎的想法。喜歡設計、戲劇、文學、舞蹈、音
          樂等活動。具有強大的直覺與靈感，對美
          的追求更勝於科學。在生涯選擇上，喜歡
          待在充滿變化與挑戰的環境，讓自己的獨
          特性能充分發揮。</p>
        <p style="margin-bottom: 0px;">【優勢】</p>
        <p style="margin-top: 0px;width: 90%;margin-left: auto;margin-right: auto;">運用想像力與創造力產生靈感
          <br>
          做事創新、彈性而靈活
          <br>
          善於設計與創造，具有文藝天賦
        </p>
        <p style="margin-bottom: 0px;margin-top: 5px;">【典型對應職業】</p>
        <p style="margin-top: 0px;width: 90%;margin-left: auto;margin-right: auto;">藝術、設計等領域</p>
        <div class="card-flap flap2">
          <div class="card-actions" id="cardA">
            <div class="button-container">
              <button class="btn1" onclick="storeLetter('A', 0)">1</button>
              <button class="btn2" onclick="storeLetter('A', 1)">2</button>
              <button class="btn3" onclick="storeLetter('A', 2)">3</button>
            </div>

            <div class="cancel">
              <button class="cancelButton" onclick="cancelSelection('A')" id="cancelBtnA">取消</button>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="card" data-letter="C" id="C1">
      <div class="card__image-holder">
        <img class="card__image" src="img/organizer.png" height="200px" />
      </div>
      <div class="card-title">
        <a href="#" class="toggle-info btn">
          <span class="left"></span>
          <span class="right"></span>
        </a>
        <!-- <div class="checkmark"></div> -->
        <h2>
          組織者Conventional
          <p>#財務金融&ensp;#特助秘書&ensp;#會計&ensp;#行政</p>
        </h2>
      </div>
      <div class="card-flap flap1">
        <p style="width: 90%;margin-left: auto;margin-right: auto;">組織者喜歡有系統、組織和效率的SOP
          工作方式無法接受混高、沒有秩序的環
          境,在乎事情的精確細節並一絲不苟。在
          生涯選擇上偏好規則清楚且明的環境
          ,善於透過行政處理讓事情順利運轉。</p>
        <p style="margin-bottom: 0px;">【優勢】</p>
        <p style="margin-top: 0px;width: 90%;margin-left: auto;margin-right: auto;">善於數字運算
          資訊處理、組織、規劃與統整
          文書、行政方面具備精確的處理技巧</p>
        <p style="margin-bottom: 0px;margin-top: 5px;">【典型對應職業】</p>
        <p style="margin-top: 0px;width: 90%;margin-left: auto;margin-right: auto;">財務金融、特助秘書、會計、行政等領域</p>
        <div class="card-flap flap2">
          <div class="card-actions" id="cardC">
            <div class="button-container">
              <button class="btn1" onclick="storeLetter('C', 0)">1</button>
              <button class="btn2" onclick="storeLetter('C', 1)">2</button>
              <button class="btn3" onclick="storeLetter('C', 2)">3</button>
            </div>
            <div class="cancel">
              <button class="cancelButton" onclick="cancelSelection('C')" id="cancelBtnC">取消</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <a href="first-conclusion.html"><button id="nextButton" onclick="showSelectedCards()"
      style="z-index: 100;">查看分析結果</button></a>

  <script>
    const selectedLetters = [null, null, null];

    function storeLetter(letter, position) {
      selectedLetters[position] = letter;
      // console.log(`Letter ${letter} stored at position ${position}`);
      // console.log(selectedLetters);
      checkLetter();
      checkAndUpdateButtons();
      checkCard();
      updateSelectedLetters();
      updateNextButtonVisibility();
      saveSelectedLetters();
      checkmark();
    }

    function cancelSelection(cardId) {
      const cardIndex = selectedLetters.indexOf(cardId);
      console.log(cardIndex)
      selectedLetters[cardIndex] = null;
      // console.log(`Card ${cardId} selection canceled`);
      checkLetter();
      checkAndUpdateButtons();
      checkCard();
      // console.log(selectedLetters);
      updateSelectedLetters();
      updateNextButtonVisibility();
      saveSelectedLetters();
      checkmark();
    }

    // 儲存陣列在本地
    function saveSelectedLetters() {
      localStorage.setItem('selectedLetters', JSON.stringify(selectedLetters));
    }

    // 把選擇結果列印出來
    function updateSelectedLetters() {
      const selectDiv = document.querySelector('.select');
      const h2Element = selectDiv.querySelector('h2');
      h2Element.textContent = `您所選擇的字母是：${selectedLetters.join(', ')}`;
    }

    // 檢查是否可以再將該字母加入陣列
    function checkLetter() {
      const letters = ['S', 'E', 'R', 'I', 'A', 'C'];
      for (let i = 0; i < letters.length; i++) {
        const letter = letters[i];
        const selectBtn = document.getElementById(`card${letter}`);
        if (selectedLetters.includes(letter)) {
          const btns = selectBtn.querySelectorAll('.btn1, .btn2, .btn3');
          btns.forEach(btn => {
            btn.classList.add('purple-button');
          });
        } else {
          const btns = selectBtn.querySelectorAll('.btn1, .btn2, .btn3');
          btns.forEach(btn => {
            btn.classList.remove('purple-button');
          });
        }
      }
    }


    // 檢查是否增加checkmark
    function checkmark() {
      const letters = ['S', 'E', 'R', 'I', 'A', 'C'];
      for (let i = 0; i < letters.length; i++) {
        const letter = letters[i];
        const container = document.getElementById(`${letter}1`);

        // 先檢查 .card-title 中是否已經有 checkmark
        const existingCheckmark = container.querySelector('.card-title .checkmark');

        if (selectedLetters.includes(letter)) {
          // 如果 selectedLetters 包含該字母且還未有 checkmark，則添加 checkmark
          if (!existingCheckmark) {
            const checkmark = document.createElement('div');
            checkmark.className = 'checkmark';
            container.querySelector('.card-title').appendChild(checkmark);
          }
        } else {
          // 如果 selectedLetters 不包含該字母且已經有 checkmark，則移除 checkmark
          if (existingCheckmark) {
            existingCheckmark.remove();
          }
        }
      }
    }




    // 檢查是否可以按取消
    function checkCard() {
      const letters = ['S', 'E', 'R', 'I', 'A', 'C'];
      for (let i = 0; i < letters.length; i++) {
        const letter = letters[i];
        const cancelBtn = document.getElementById(`cancelBtn${letter}`);
        if (selectedLetters.includes(letter)) {
          cancelBtn.classList.remove('cancelButton');
        } else {
          cancelBtn.classList.add('cancelButton');
        }
      }
    }



    // 檢查是否要將選擇按鈕增加樣式
    function checkAndUpdateButtons() {
      const btn1Elements = document.getElementsByClassName('btn1');
      for (let i = 0; i < btn1Elements.length; i++) {
        const btn1 = btn1Elements[i];
        if (selectedLetters[0] !== null) {
          btn1.classList.add('blue-button');
        } else {
          btn1.classList.remove('blue-button');
        }
      }

      const btn2Elements = document.getElementsByClassName('btn2');
      for (let i = 0; i < btn2Elements.length; i++) {
        const btn2 = btn2Elements[i];
        if (selectedLetters[1] !== null) {
          btn2.classList.add('blue-button');
        } else {
          btn2.classList.remove('blue-button');
        }
      }

      const btn3Elements = document.getElementsByClassName('btn3');
      for (let i = 0; i < btn3Elements.length; i++) {
        const btn3 = btn3Elements[i];
        if (selectedLetters[2] !== null) {
          btn3.classList.add('blue-button');
        } else {
          btn3.classList.remove('blue-button');
        }
      }
    }


    function updateNextButtonVisibility() {
      const filteredLetters = selectedLetters.filter(letter => typeof letter === 'string');
      document.getElementById('nextButton').style.display = filteredLetters.length === 3 ? 'block' : 'none';
    }


    $(document).ready(function () {
      var zindex = 10;

      $("div.card").click(function (e) {
        e.preventDefault();

        var isShowing = false;

        if ($(this).hasClass("show")) {
          isShowing = true
        }

        if ($("div.cards").hasClass("showing")) {
          // a card is already in view
          $("div.card.show")
            .removeClass("show");

          if (isShowing) {
            // this card was showing - reset the grid
            $("div.cards")
              .removeClass("showing");
          } else {
            // this card isn't showing - get in with it
            $(this)
              .css({ zIndex: zindex })
              .addClass("show");

          }

          zindex++;

        } else {
          // no cards in view
          $("div.cards")
            .addClass("showing");
          $(this)
            .css({ zIndex: zindex })
            .addClass("show");

          zindex++;
        }

      });
    });
  </script>
  <footer></footer>
</body>

</html>