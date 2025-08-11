<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


//1. POSTデータ取得
$spot = $_POST['spot'];
$schedule = $_POST['schedule'];
$memo= $_POST['memo'];

//2. DB接続
require_once('funcs.php');
$pdo= db_conn();


//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO contents(id, spot, schedule, memo)
VALUES(NULL, :spot, :schedule, :memo)");

//  2. バインド変数を用意
$stmt->bindValue(':spot', $spot, PDO::PARAM_STR);
$stmt->bindValue(':schedule', $schedule, PDO::PARAM_STR);
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
} else {
  // 成功時の表示ページを表示
  ?>

  <!DOCTYPE html>
  <html lang="ja">
  <head>
      <meta charset="UTF-8">
      <title>記録完了</title>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    <div class="body-insert">
  <div class="form-card">
  <div class="complete-message">
        旅行記録が登録されました <i class="fa-solid fa-face-smile-beam"></i>
    </div>
    <div class="button-container">
        <a href="select.php" class="link-button"><i class="fa-solid fa-list"></i> 一覧を見る</a>
        <a href="index.php" class="link-button"><i class="fa-solid fa-pen"></i> 続けて記録する</a>
    </div>
  </div>
  </div>
</body>
  </html>

  <?php
}
