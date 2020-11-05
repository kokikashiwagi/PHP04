<?php
session_start();

//１．PHP
// $ctn =$_GET['country'];
// $id =$_GET['country'];
$id =$_GET['id'];
// echo $id;

//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs.php");
$pdo = db_conn();
sessionCheck();


// $ctn= strval($id); 

//２．データ登録SQL作成
// $stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE country=" . $ctn);//これだとうまくいかない。理由不明
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=" . $id);
// $stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE country = 'Russia'");
// echo $id;
//実行して結果を代入
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
            $result = $stmt->fetch();
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フリーアンケート表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="detail.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->

<!-- Main[Start] -->
<!-- <form method="POST" action="insert.php"> -->
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>to update</legend>
    <table>
    <!-- <tr>
        <td>
            <label>your name：
        </td>
        <td>
            <input type="text" name="name" value=<?=$result["name"]?>></label><br>
        </td> -->
    <!-- </tr> -->
    
    <tr>
        <td>
            <label>counrty
        </td>
        <td>
         <textArea name="cname" rows="1" cols="30" style="background-color:#dcdcdc;" readonly ><?=$result['country']?></textArea></label><br>        
        </td>
    </tr>


     <!-- <label>how was it?：<input type="text" name="star" value=<?=$result["star"]?>></label><br> -->
     <tr>
        <td>
             <label>star
        </td>
        <td>
            <select name=star value=<?=$result["star"]?>>
                <option value=★>★</option>
                <option value=★★>★★</option>
                <option value=★★★>★★★</option>
                <option value=★★★★>★★★★</option>
                <option value=★★★★★>★★★★★</option>
            </select>
        </td>
     </label><br>
    </tr>
    
    <tr>
        <td>
            <label>comment
        </td>
        <td>
            <textArea name="comment" rows="4" cols="40" ><?=$result['comment']?></textArea></label><br>        
        </td>
    </tr>
    
     <input type="hidden" name='id' value=<?=$result["id"]?>> 
     <tr>
     <td></td>
     <td>
         <input type="submit" value="送信">
     </td>
    </tr>

     </table>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

</body>

</html>


