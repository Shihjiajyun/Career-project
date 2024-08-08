<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>職涯卡牌網站</title>
  <!-- 引入Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  <!-- 引入index.CSS -->
  <link rel="stylesheet" href="./css/index.css">
</head>

<body>
  <!-- 主容器 -->
  <div class="container-fluid">
    <!-- 主視覺區塊 -->
    <div class="row">
      <div class="col-12 hero" style="background-image: url('./img/work.jpg');">
        <div class="text-center text-white">
          <!-- 標題和打字效果 -->
          <h1>
            <span class="static-text">這不是遊戲，而是</span>
            <span class="type" style="color: #EDDE5D; font-weight:bold;"></span>
          </h1>
          <!-- 副標題說明 -->
          <p class="text-white-75 mb-5">在這裡，每一次抽牌都可能是關於未來的啟示。發現屬於您的職業路徑。</p>
          <!-- 動作按鈕 -->
          <a class="btn btn-danger btn-custom" href="./first.php" style="margin-right:auto;margin-left:auto;">開啟旅程</a>
        </div>
      </div>
    </div>
    <!-- 特色區塊 -->
    <div class="row text-center mt-5">
      <!-- 特色一：創新的探索方式 -->
      <div class="col-12 col-md-6 col-lg-3 mb-4">
        <img class="feature-image" src="./img/idea.png" alt="優點一">
        <h3 class="mb-4">創新的探索方式</h3>
        <p class="text-muted mb-0">結合卡牌的樂趣與職業探索的實用性，提供一種全新、互動式的探索體驗。</p>
      </div>
      <!-- 特色二：個性化路徑發現 -->
      <div class="col-12 col-md-6 col-lg-3 mb-4">
        <img class="feature-image" src="./img/person.png" alt="優點二">
        <h3 class="mb-4">個性化路徑發現</h3>
        <p class="text-muted mb-0">透過使用者對卡牌的選擇與回饋，系統能夠提供更貼合使用者需求的職涯建議。</p>
      </div>
      <!-- 特色三：動態互動體驗 -->
      <div class="col-12 col-md-6 col-lg-3 mb-4">
        <img class="feature-image" src="./img/interactive.png" alt="優點三">
        <h3 class="mb-4">動態互動體驗</h3>
        <p class="text-muted mb-0">增加探索人生航道時的趣味性和互動性。</p>
      </div>
      <!-- 特色四：進度保存 -->
      <div class="col-12 col-md-6 col-lg-3 mb-4">
        <img class="feature-image" src="./img/save.png" alt="優點四">
        <h3 class="mb-4">進度保存</h3>
        <p class="text-muted mb-0">允許用戶在任何時候回到他們離開的地方繼續他們的探索旅程。</p>
      </div>
    </div>
  </div>
  <!-- 引入Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- 引入index.JS -->
  <script src="./js/index.js"></script>
</body>

</html>