<?php

//最初にSESSIONを開始！！ココ大事！！
session_start();

//POST値を受け取る
$lid =  $_POST['lid'];
$lpw =  $_POST['lpw'];

//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

//2. データ登録SQL作成
// gs_user_tableに、IDとWPがあるか確認する。
$stmt = $pdo->prepare('SELECT 
                         * 
                       FROM 
                           users
                        --    フォームから送られてきたIDとパスワードのどちらも一致しないとだめ
                        WHERE lid = :lid ');

$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);


// 実行する
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
// IDとパスワードを入れてその値が登録されていない場合エラーが出る
if($status === false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
// 成功した場合
$val = $stmt->fetch();

// if(password_verify($lpw, $val['lpw'])){ //* PasswordがHash化の場合はこっちのIFを使う
// IDとパスワードが一致するよとなった場合
if( $val['id'] != ''){

    session_regenerate_id(true);
   $_SESSION['chk_ssid'] = session_id();
$_SESSION['kanri_flg'] = $val['kanri_flg'];

    //Login成功時 該当レコードがあればSESSIONに値を代入
    header('Location: select.php');
}else{
    //Login失敗時(Logout経由)
    header('Location: login.php');
}

exit();
