<?php
session_start();
include("funcs.php");
sessionCheck();

// $pdo = db_conn();


$rus = 0;
$usa = 0;
$can = 0;


//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_kadai1;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
    //ヘッダー
    $view .= "<table border=1>";
    $view .= '<tr>';
    $view .= '<td width="100px">'.'ID'.'</td>';
    $view .= '<td width="100px">'.'indate'.'</td>';
    $view .= '<td width="200px">'.'name'.'</td>';
    $view .= '<td width="300px">'.'country'.'</td>';
    $view .= '<td width="100px">'.'star'.'</td>';
    $view .= '<td width="300px">'.'comment'.'</td>';
    $view .= '<td width="150px">'.'delete from here'.'</td>';
    $view .= '</tr>';

    //よみとり
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

    $view .= '<tr>';

    $view .= '<td>';
    $view .= '<a href="detail.php?id='. $result["id"].'">';
    $view .= $result['id'];
    $view .= '</a>';
    $view .= '</td>';


    $view .= '<td>'.$result['indate'].'</td>';
    $view .= '<td>'.$result['name'].'</td>';


    $view .= '<td>';
    // $view .= '<a href="detail.php?id='. $result["id"].'">';
    $view .= $result['country'];
    // $view .= '</a>';
    $view .= '</td>';

    $view .= '<td>'.$result['star'].'</td>';
    $view .= '<td>'.$result['comment'].'</td>';


    $view .= '<td>';
    $view .= '<a href="delete.php?id='. $result["id"].'">';
    $view .= 'delete';
    $view .= '</a>';
    $view .= '</tr>';
    $view .= '</td>';


    //国名がロシアだったら
    if( $result['country'] == "Russia"){
    //星の数
    if($result['star'] =="★"){
        $rus =1;
      }
      elseif($result['star'] =="★★"){
        $rus =2;
      }
      elseif($result['star'] =="★★★"){
        $rus =3;
      }
      elseif($result['star'] =="★★★★"){
        $rus =4;
      }
      else{
        $rus =5;
      }
    }
    else if( $result['country'] == "United States of America"){
      if($result['star'] =="★"){
        $usa =1;
      }
      elseif($result['star'] =="★★"){
        $usa =2;
      }
      elseif($result['star'] =="★★★"){
        $usa =3;
      }
      elseif($result['star'] =="★★★★"){
        $usa =4;
      }
      else{
        $usa =5;
      }
    }
    else if( $result['country'] == "Canada"){
      if($result['star'] =="★"){
        $can =1;
      }
      elseif($result['star'] =="★★"){
        $can =2;
      }
      elseif($result['star'] =="★★★"){
        $can =3;
      }
      elseif($result['star'] =="★★★★"){
        $can =4;
      }
      else{
        $can =5;
      }
    }



  }
  $view .= "</table>";

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>where you've been</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">return to top</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- 地図表示ゾーン -->
<script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.3/d3.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/topojson/1.6.9/topojson.min.js"></script>
<script src="./datamaps.world.min.js"></script>

<center>
<div id="container" style="position:center ; width: 500px; height: 300px;"></div>
</center>

<script>
  
var rus = <?php echo $rus?>;
var usa = <?php echo $usa?>;
var can = <?php echo $can?>;

//Datamapの関数を発動
var basic_choropleth = new Datamap({
    element: document.getElementById("container"),
    projection: 'mercator',
    //マップの色を定義
    fills: {
        defaultFill: "#ABDDA4",
        authorHasTraveledTo: "#4169e1",
        star1: "#0000cd",
        star2: "#87ceeb",
        star3: "#f0e68c",
        star4: "#dda0dd",
        star5: "#dc143c"
    },

    //初期に色表示させる対象国
    data: {
    // JPN: { fillKey: "authorHasTraveledTo" },
  }
});

////////////////////////////////////////////
if(rus==1){
    basic_choropleth.updateChoropleth({
        RUS: { fillKey: "star1" },
        });    
}
else if(rus==2){
    basic_choropleth.updateChoropleth({
        RUS: { fillKey: "star2" },
        });    
}
else if(rus==3){
    basic_choropleth.updateChoropleth({
        RUS: { fillKey: "star3" },
        });    
}
else if(rus==4){
    basic_choropleth.updateChoropleth({
        RUS: { fillKey: "star4" },
        });    
}
else if(rus==5){
    basic_choropleth.updateChoropleth({
        RUS: { fillKey: "star5" },
        });    
}
////////////////////////////////////////////
////////////////////////////////////////////
if(usa==1){
    basic_choropleth.updateChoropleth({
      USA: { fillKey: "star1" },
        });    
}
else if(usa==2){
    basic_choropleth.updateChoropleth({
      USA: { fillKey: "star2" },
        });    
}
else if(usa==3){
    basic_choropleth.updateChoropleth({
      USA: { fillKey: "star3" },
        });    
}
else if(usa==4){
    basic_choropleth.updateChoropleth({
      USA: { fillKey: "star4" },
        });    
}
else if(usa==5){
    basic_choropleth.updateChoropleth({
      USA: { fillKey: "star5" },
        });    
}
////////////////////////////////////////////
////////////////////////////////////////////
if(can==1){
    basic_choropleth.updateChoropleth({
      CAN: { fillKey: "star1" },
        });    
}
else if(can==2){
    basic_choropleth.updateChoropleth({
      CAN: { fillKey: "star2" },
        });    
}
else if(can==3){
    basic_choropleth.updateChoropleth({
      CAN: { fillKey: "star3" },
        });    
}
else if(can==4){
    basic_choropleth.updateChoropleth({
      CAN: { fillKey: "star4" },
        });    
}
else if(can==5){
    basic_choropleth.updateChoropleth({
      CAN: { fillKey: "star5" },
        });    
}
////////////////////////////////////////////
//Datamapの関数を終了
</script>

<center>
<table>
  <tr>
    <td style="color:#0000cd;">◆</td>
    <td>：★</td>
  </tr>
  <tr>
    <td style="color:#87ceeb;">◆</td>
    <td>：★★</td>
  </tr>
  <tr>
    <td style="color:#f0e68c;">◆</td>
    <td>：★★★</td>
  </tr>
  <tr>
    <td style="color:#dda0dd;">◆</td>
    <td>：★★★★</td>
  </tr>
  <tr>
    <td style="color:#dc143c;">◆</td>
    <td>：★★★★★</td>
  </tr>

</table>
</center>


<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
      <?= $view ?>
    </div>
</div>
<!-- Main[End] -->


<!-- ここまで地図表示ゾーン -->


</body>
</html>
