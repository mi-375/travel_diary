<?php

// id追加
$id    = $_POST['id'];

$spot = $_POST['spot'];
$schedule = $_POST['schedule'];
$memo= $_POST['memo'];


//2. DB接続します
//*** function化する！  *****************
require_once('funcs.php');
$pdo= db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE contents
                        SET 
                            spot = :spot,
                            schedule = :schedule,
                            memo = :memo
                        WHERE id = :id;
                        ');

$stmt->bindValue(':spot', $spot, PDO::PARAM_STR);
$stmt->bindValue(':schedule', $schedule, PDO::PARAM_STR);
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {


    redirect('select.php');
} 