<script>
// window.confirm("削除しますか？？");
    // if (window.confirm("削除しますか？")) {
//   OKが選択された時の処理
// }
// result = window.confirm("削除しますか？？");
// if(result==false){
//     alert("削除キャンセルしたいけど、実装できてない");
//     window.location.href ="select.php";
//     // exit;
// };

</script>

<?php
require_once('funcs.php');
$id = $_GET['id'];
// $id = $_GET['country'];
//2. DB接続します
$pdo=db_conn();

//３．データ登録SQL作成
// $stmt = $pdo->prepare('DELETE FROM gs_bm_table WHERE country = "Russia"');
$stmt = $pdo->prepare('DELETE FROM gs_user_table WHERE id = :id');
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
    sql_error($stmt);
    //*** function化する！*****************
}else{
    //*** function化する！*****************
    // redirect('select.php');
}
// echo 'id='.$id.'を削除しました';
$alert = "<script type='text/javascript'>alert('ID='+$id+'を削除しました。');</script>";
// redirect('select.php');
echo $alert;

?>
<a href="select.php">
戻る
</a>
