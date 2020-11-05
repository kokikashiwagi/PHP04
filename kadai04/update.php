<?php
require_once('funcs.php');

//1. POSTデータ取得
$name = $_POST['name'];
$cname = $_POST['cname'];
$star = $_POST['star'];
$comment = $_POST['comment'];
$id    = $_POST["id"]; //追加されています

// echo $name;
// echo $cname;
// echo $star;
// echo $comment;
// echo $id;

//2. DB接続します
//*** function化する！  *****************
$pdo=db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE 
        gs_bm_table
        SET 
            name=:name, 
            country=:country, 
            star=:star, 
            comment=:comment,
            indate=sysdate()
        WHERE 
        id =:id;");

$stmt->bindValue(':name', h($name), PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':country', h($cname), PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':star', h($star), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', h($comment), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
    //*** function化する！*****************
    // $error = $stmt->errorInfo();
    // exit("SQLError:".$error[2]);
}else{
    //*** function化する！*****************
    // redirect('index.php');
    redirect('select.php');
    // header("Location: index.php");
    // exit();
}

?>
