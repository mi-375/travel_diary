<!DOCTYPE html>
<html lang="ja">


<body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📝 旅行日記アプリ</title>

    <!-- アイコン読み込み -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>


    <!-- 装飾要素 -->
    <div class="decoration"></div>
    <div class="decoration"></div>


    <!-- メインコンテンツ -->
    <header class="header">
   <div class="nav-container">

   <div class="nav-left">

            <a href="#" class="logo">
                <i class="fas fa-paw"></i>
            旅行日記登録
            </a>

    </div>

    <div class="nav-right">
            <a class="login-button" href="login.php">ログイン</a>
            <a class="logout-button" href="logout.php">ログアウト</a>


            <a href="select.php" class="nav-link">
                <i class="fas fa-file-alt"></i>
                旅行日記記録一覧
            </a>

    </div>
    </div>

        </header>

    <main class="main-container form-page">
        <div class="form-card">

          <h1 class="form-title">旅行日記</h1>
            <p class="form-subtitle">行き先・行程などを記録しましょう☺︎</p>
            
            <form method="post" action="insert.php">
                <div class="form-group">
                    <label for="diary-contents" class="form-label">
                        <i class="fas fa-map-marker-alt"></i> 行き先
                    </label>
                    <input type="text" id="spot" name="spot" class="form-input" placeholder="例：京都" required>
                </div>

                <div class="form-group">
                    <label for="diary-contents" class="form-label">
                        <i class="fas fa-plane"></i> 行程
                    </label>
                    <textarea id="schedule" name="schedule" class="form-textarea" placeholder="例：7:00　京都駅出発" required></textarea>
                </div>

                <div class="form-group">
                    <label for="content" class="form-label">
                        <i class="fas fa-comment"></i> メモ
                    </label>
                    <textarea id="content" name="memo" class="form-textarea" placeholder="例：八ツ橋が美味しかった" required></textarea>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-pen"></i>
                    記録する
                </button>
            </form>
        </div>
    </main>
</body>

</html>