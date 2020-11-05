<?php
//１．PHP
// $ctn =$_GET['country'];
// $id =$_GET['country'];
$id =$_GET['id'];
// echo $id;

//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs.php");
$pdo = db_conn();


// $ctn= strval($id); 

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=" . $id);
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
                    <a class="navbar-brand" href="index.php">TOP</a>
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
   <legend>ユーザー登録</legend>
      <label>名前：<input type="text" name="name" value=<?=$result["name"];?>></label><br>
      <label>ID：<input type="text" name="lid" value=<?=$result["lid"];?> ></label><br>
      <label>PW：<input type="text" name="lpw" value=<?=$result["lpw"];?>></label><br>
      <label>管理者：
      <input name="kanri" type="hidden" value="0" />
      <input name="kanri" type="checkbox" value="1" />
      </label><br>
      <label>退会してる：
      <input name="life" type="hidden" value="0" />
      <input name="life" type="checkbox" value="1" />
      <input type="hidden" name='id' value=<?=$result["id"]?>> 
        <br>
        <input type="submit" value="送信">

     </table>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

</body>

</html>


