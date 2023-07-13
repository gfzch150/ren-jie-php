<!DOCTYPE html>
<html>    
<head>
<meta charset="utf-8" />
<title>search.php</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="outer">
<section id="main">
<article class="article-type-poat">
<?php
session_start();  // 啟用交談期
if (isset($_POST["Search"])) {
   // 建立SQL字串
   $sql = "SELECT * FROM renjie ";
   // 檢查是否輸入姓名
   if (chop($_POST["Name"]) != "" )
      $name = "name LIKE '%".$_POST["Name"]."%' ";
   else
      $name = "";
   // 檢查是否輸入電話號碼
   if (chop($_POST["Address"]) != "" )
      $address = "address LIKE '%".$_POST["Address"]."%' ";
   else
      $address = "";
   if (chop($_POST["Number"]) != "" )
      $number = "number LIKE '%".$_POST["Number"]."%' ";
   else
      $address = "";
   
   // if條件組合SQL字串
   if ( chop($name) != "" && chop($address) != "" && chop($number) != "" )
      $sql.= "WHERE ".$name." AND ".$address .$number;
   elseif ( chop($name) != "" )  // 只有姓名
          $sql .= "WHERE ".$name;
   elseif ( chop($address) != "" )  // 只有電話號碼
          $sql .= "WHERE ".$address;
   elseif ( chop($number) != "" )  // 只有電話號碼
          $sql .= "WHERE ".$number;
   $sql.= " ORDER BY name";  // 最後加上排序
   $_SESSION["SQL"] = $sql;
   header("Location: contacts.php");  // 轉址
}
?>
<form action="search.php" method="post">
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
   <input type="submit" name="Search" value="搜尋資料庫"/></div>
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