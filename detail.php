<?php

session_start();
require_once('funcs.php');
logincheck();





 /**
 * [ここでやりたいこと]
 * 1. クエリパラメータの確認 = GETで取得している内容を確認する
 * 2. select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * 3. SQL部分にwhereを追加
 * 4. データ取得の箇所を修正。
 */



 $id=$_GET['id'];


 require_once('funcs.php');
 $pdo= db_conn();
 

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM contents WHERE id = :id;');
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$result = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
$result=$stmt->fetch();
// データを取得

}


// var_dump($result);


?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

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
            
            <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?= h($result['id']) ?>">
                <div class="form-group">
                    <label for="diary-contents" class="form-label">
                        <i class="fas fa-map-marker-alt"></i> 行き先
                    </label>
                    <input type="text" id="spot" name="spot" class="form-input" value="<?= h($result['spot']) ?>" placeholder="例：京都" required>
                </div>

            <div class="form-group">
                <label for="schedule" class="form-label">
                    <i class="fas fa-plane"></i> 行程
                </label>
            <textarea id="schedule" name="schedule" class="form-textarea" placeholder="例：7:00　京都駅出発" required><?= h($result['schedule']) ?></textarea>
            </div>

                <div class="form-group">
                     <label for="memo" class="form-label">
                     <i class="fas fa-comment"></i> メモ
                    </label>
                 <textarea id="memo" name="memo" class="form-textarea" placeholder="例：八ツ橋が美味しかった" required><?= h($result['memo']) ?></textarea>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-pen"></i>
                    更新する
                </button>
                <div class="button-container" >
      <a href="select.php" class="link-button">戻る</a>

            </form>
        </div>
    </main>
</body>

</html>