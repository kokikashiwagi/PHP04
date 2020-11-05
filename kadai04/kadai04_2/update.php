<?php
require_once('funcs.php');

//1. POSTデータ取得
$name   = $_POST["name"];
$lid  = $_POST["lid"];
$lpw  = $_POST["lpw"];
$kanri = $_POST["kanri"];
$life    = $_POST["life"]; //追加されています
$id    = $_POST["id"]; //追加されています

// echo $name."<br>";
// echo $lpw."<br>";
// echo $lid."<br>";
// echo $kanri."<br>";
// echo $life."<br>";
// echo $id."<br>";


//2. DB接続します
//*** function化する！  *****************
$pdo=db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE
        gs_user_table
        SET 
            name=:name, 
            lid=:lid, 
            lpw=:lpw, 
            kanri_flg=:kanri_flg, 
            life_flg=:life_flg 
        WHERE 
        id =:id;");

$stmt->bindValue(':name', h($name), PDO::PARAM_STR);
$stmt->bindValue(':lid', h($lid), PDO::PARAM_STR);
$stmt->bindValue(':lpw', h($lpw), PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', h($kanri), PDO::PARAM_STR);
$stmt->bindValue(':life_flg', h($life), PDO::PARAM_STR); 
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
    //*** function化する！*****************
    // $error = $stmt->errorInfo();
    // exit("SQLError:".$error[2]);
}else{
    //*** function化する！*****************
    // redirect('select.php');
    // header("Location: index.php");
    // exit();
}

?>
