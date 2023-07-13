<!DOCTYPE html>
<html>    
<head>
<meta charset="utf-8" />
<title>add.php</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="outer">
<section id="main">
<article class="article-type-poat">
<?php
// 取得欄位資料
if (isset($_POST["Name"]) && isset($_POST["Address"])&& isset($_POST["Number"]) ) {
   $name = $_POST["Name"];
   $address = $_POST["Address"];
   $number = $_POST["Number"];
   // 檢查是否有輸入欄位資料
   if ($name != "" && $address != "" && $number != "") {
      require_once("mycontacts_open.inc");
      // 建立SQL字串
      $sql = "INSERT INTO renjie (name, address,number) values('";
      $sql.= $name."', '".$address."','".$number."')";        
      if ( mysqli_query($link, $sql) ) { // 執行SQL指令
         echo "<p class='container'><font color=red>新增聯絡資料成功!";
         echo "</font></p>";
      }
      require_once("mycontacts_close.inc");
   }
}
?>
<form action="add.php" method="post">
<td><p class="container">公司名稱</p></td>
   <input type="text" name="Name" 
              size="20" maxlength="20"/>
<td><p class="container">料件名稱</p> </td>
  <input type="text" name="Address" 
              size="20" maxlength="20"/>
<td><p class="container">統編</p></td>
   <input type="text" name="Number" 
              size="20" maxlength="20"/>
            <tr><td colspan="2" align="center">
   <input type="submit" value="新增聯絡資料"/></div>
</form>
</article>
</section>
</div>
<div class="outer">
<section id="main">
<article class="article-type-poat">
<div class="card"><a href="shop.php">首頁</a></div>
<div class="card"><a href="add.php">新增聯絡資料</a></div>
<div class="card"><a href="search.php">搜尋通訊錄</a></div>

</article>
</section>
</div>

</body>
</html>