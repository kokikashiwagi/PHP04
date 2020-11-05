<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>行った国リスト</title>
  <script src="js/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style3.css">
</head>
<body>
<div class="wrapper">
    <div class="header"><h3>行った国リスト</h3></div>
    
<script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.3/d3.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/topojson/1.6.9/topojson.min.js"></script>
<script src="./datamaps.world.min.js"></script>
<div id="container" style="position: relative; width: 500px; height: 300px;"></div>


<!-- 表の開始 -->
<div class="rec">
    <table border="1" style="border-collapse: collapse">
        <tr>
            <th width="25%">行った国</th>
            <th width="25%">滞在日数</th>
            <th width="50%">行った日</th>
        </tr>

 <!--PHPはじまりはじまり  -->
 <!--PHPはじまりはじまり  -->
 <!--PHPはじまりはじまり  -->
 <?php
$uk = 0;
$fr = 0;
$de = 0;
$rus = 0;
$usa = 0;
$can = 0;
$chi = 0;
$aus = 0;
$bra = 0;
$ind = 0;

// ファイルを開いて、読み込み
$openfile = fopen('./data/data.txt','r');
while ($str_base = fgets($openfile)){
    $str = explode(",", $str_base);   // コンマで区切る
    // 表で表示させるもの達
    echo '<tr>';
    echo '<td>'.$str[0].'</td>';
    echo '<td>'.$str[1].'</td>';
    echo '<td>'.$str[2].'</td>';
    echo '</tr>';
    echo '<br>';

// 国の渡航回数をカウント
if($str[0] =="イギリス"){
    $uk =$uk +1;
}
else if($str[0] =="フランス"){
    $fr =$fr +1;
}
else if($str[0] =="ドイツ"){
    $de =$de +1;
}
else if($str[0] =="ロシア"){
    $rus =$rus +1;
}
else if($str[0] =="アメリカ"){
    $usa =$usa +1;
}
else if($str[0] =="中国"){
    $chi =$chi +1;
}
else if($str[0] =="オーストラリア"){
    $aus =$aus +1;
}
else if($str[0] =="ブラジル"){
    $bra =$bra +1;
}
else if($str[0] =="インド"){
    $ind =$ind +1;
}
// 国の渡航回数をカウント終了
}
// ファイル開く関数終了


// 合計表示するならここに追加（見栄えよくないので、割愛）
// echo "◆合計";
// echo "<br>";

// echo "イギリス ";
// echo $uk;
// echo "回";
// echo "<br>";


// ファイルを閉じる
fclose($file);
?>
<!--PHP終了 -->
<!--PHP終了 -->

</div>
<!--表終了 -->
<!--表終了 -->


<!-- マップに関する操作ここから -->
<!-- マップに関する操作ここから -->
<script>
// 変数を定義してPHPから変数を持ってくる
var de = <?php echo $de ?>;
var fr = <?php echo $fr ?>;
var uk = <?php echo $uk ?>;
var rus = <?php echo $rus?>;
var usa = <?php echo $usa ?>;
var chi = <?php echo $chi ?>;
var aus = <?php echo $aus ?>;


//Datamapの関数を発動
var basic_choropleth = new Datamap({
    element: document.getElementById("container"),
    projection: 'mercator',
    //マップの色を定義
    fills: {
        defaultFill: "#ABDDA4",//デフォルトの色
        authorHasTraveledTo: "#fa0fa0"//変更する色
    },

    //初期に色表示させる対象国
    data: {
    JPN: { fillKey: "authorHasTraveledTo" },
  }
});
//Datamapの関数を終了


//フォームの入力項目に応じて、色をつけるゾーン
//フォームの入力項目に応じて、色をつけるゾーン
//メモ：一括でやりたい。if文を関数の入れられたら楽になりそうだけどできなかった。
//メモ：jsonとか使えばもっと楽になるのだろうか、全然やりかたわからないの今後の課題
if(de>0){
var colors = d3.scale.category10();
window.setInterval(function() {
  basic_choropleth.updateChoropleth({
    DEU: colors(Math.random() * 10),
  });
}, 2000);
}

if(fr>0){
    var colors = d3.scale.category10();
    window.setInterval(function() {
    basic_choropleth.updateChoropleth({
        FRA: colors(Math.random() * 10),
        });
    }, 2000);
}

if(uk>0){
    var colors = d3.scale.category10();
    window.setInterval(function() {
    basic_choropleth.updateChoropleth({
        GBR: colors(Math.random() * 10),
        });
    }, 2000);
}

if(rus>0){
    var colors = d3.scale.category10();
    window.setInterval(function() {
    basic_choropleth.updateChoropleth({
        RUS: colors(Math.random() * 10),
        });
    }, 2000);
}

if(usa>0){
    var colors = d3.scale.category10();
    window.setInterval(function() {
    basic_choropleth.updateChoropleth({
        USA: colors(Math.random() * 10),
        });
    }, 2000);
}

if(chi>0){
    var colors = d3.scale.category10();
    window.setInterval(function() {
    basic_choropleth.updateChoropleth({
        CHN: colors(Math.random() * 10),
        });
    }, 2000);
}

if(aus>0){
    var colors = d3.scale.category10();
    window.setInterval(function() {
    basic_choropleth.updateChoropleth({
        AUS: colors(Math.random() * 10),
        });
    }, 2000);
}
//フォームの入力項目に応じて、色をつけるゾーン終了
//フォームの入力項目に応じて、色をつけるゾーン終了

</script>
<!-- マップに関する操作ここまで -->
<!-- マップに関する操作ここまで -->


</body>
</html>