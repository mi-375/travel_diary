<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="css/style.css" rel="stylesheet">
    <title>ログイン</title>
</head>
<body>


<main class="main-container form-page">
  <div class="form-card">
    <h2 class="form-title">ログイン</h2>
    <form name="form1" action="login_act.php" method="post">
      <div class="form-group">
        <label class="form-label">ID</label>
        <input type="text" name="lid" class="form-input" />
      </div>
      <div class="form-group">
        <label class="form-label">パスワード</label>
        <input type="password" name="lpw" class="form-input" />
      </div>
      <input type="submit" value="ログイン" class="submit-btn" />
    </form>

    <div class="button-container" >
      <a href="index.php" class="link-button">ログインせず戻る</a>
    </div>
  </div>
</main>



</body>
</html>
