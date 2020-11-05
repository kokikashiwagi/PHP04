<?php 
session_start();
include("funcs.php");
$pdo = db_conn();
$name = $_SESSION["name"];
if($name == null){
  $name = "GUEST";
};
// echo $name;  
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>trip memory</title>
  <img src="https://lh3.googleusercontent.com/proxy/qRccxer8HoINPUwAgZFwuFuwes3sy0CulrdY78XbT3qiT5knQWKQivk-XcYzzB3by26t33mxXCpiyPOSzPScA9UHGbBWJKveQI2aJ7Y3d75tMf8wISiyToJc8w" alt="">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- <style>div{padding: 10px;font-size:16px;}</style> -->
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
    <!-- <div id = "map" ><a href="select.php"><font color = 'black'>move to your map</a></div> -->
    <div id = "map" >
      <a href="select.php">
        <input type="button" value="move to your map" >
      </a>
    </div>

    <div id = "login" ><a href="login.php">
    <input type="button" value="login" >
    </a></div>

    <div id = "loginanother" ><a href="login.php">
    <input type="button" value="login with another account" >
    </a></div>


    <div id = "logout" >
        <a href="logout.php">
          <input type="button" value="logout" >
        </a>
    </div>

    <!-- <div id = "logout" ><a href="logout.php"><font color = 'black'>log out</a></div> -->

    </div>
    </div>
  </nav>
</header>
<br>


<!-- Head[End] -->

<?php 
    if(!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()){
      echo 'Status: LOGGED OUT ';
      echo '<script>document.getElementById("map").style.display ="none";</script>';
      echo '<script>document.getElementById("logout").style.display ="none";</script>';
      echo '<script>document.getElementById("loginanother").style.display ="none";</script>';
   }
   else{
      echo 'Status: LOGGED IN';  
        echo '<script>document.getElementById("login").style.display ="none";</script>';
        // echo '<script>document.getElementById("login").innerHTML = "login with another account";</script>';
      };
?>

<!-- <script>
  document.getElementById('login-name').innerHTML = "logged in";
</script> -->



<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <!-- <legend>Trip Memory</legend> -->
    <table>
    <tr>
      <td width=200px>
        <label>your name 
      </td>
      <td>
        <input type="text" name="name" id='ynm' style="background-color:#dcdcdc;"  readonly value = <?= $name ?> > </label><br>
      </td>
    </tr>
    <tr>
      <td>
        <label> country <br> (tap the map below)
        </td>
        <td>
         <input type="text" name="cname" id='ctn' value='Japan' style="background-color:#dcdcdc;" readonly></label><br>
      </td>
    </tr>
     <tr>
     <td>
     <label>how was it?
     </td>
      <td>
       <select name=star>
            <option value=★>★</option>
            <option value=★★>★★</option>
            <option value=★★★>★★★</option>
            <option value=★★★★>★★★★</option>
            <option value=★★★★★>★★★★★</option>
        </select><br>
      </td>
      </tr>
      <tr>
      <td>
        <label>comment
        </td>
        <td>
          <textArea name="comment" rows="4" cols="40"></textArea></label><br>
      </td>
      </tr>
      <tr>
      <td>
      </td>
      <td>
        <input type="submit" value="submit">
      </tr>
      </td>
    </table>

    <!-- <a href="select.php">
      <input type="button" value="see your map" >
    </a> -->
    </fieldset>
  </div>
</form>


<script>
var a ='GUEST'
a =<?php $neko?>;
alert(a);
document.getElementById("ynm").value =a;
</script>

<!-- ここやる -->

<!-- <script> -->
  <!-- // document.getElementById("ynm").value = lname; -->
<!-- </script> -->
<!-- ここまでやる -->



<!-- 地図表示ゾーン -->
<script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.3/d3.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/topojson/1.6.9/topojson.min.js"></script>
<script src="./datamaps.world.min.js"></script>
<div id="container" style="position: relative; width: 500px; height: 300px;"></div>


<script>
    var map = new Datamap({
        element: document.getElementById('container'),
        done: function(datamap) {
            datamap.svg.selectAll('.datamaps-subunit').on('click', function(geography) {
                document.getElementById("ctn").value = geography.properties.name ;

            });
        }
    });
</script>
<!-- ここまで地図表示ゾーン -->

<!-- Main[End] -->

  
</body>
</html>
