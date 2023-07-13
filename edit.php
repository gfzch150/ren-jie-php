<!DOCTYPE html>
<html>    
<head>
<meta charset="utf-8" />
<title>edit.php</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="outer">
<section id="main">
<article class="article-type-poat">
<?php
$id = $_GET["id"];  // 取得URL參數的編號
$action = $_GET["action"];  // 取得操作種類
require_once("mycontacts_open.inc");
// 執行操作
switch ($action) {
   case "update": // 更新操作    
      $name = $_POST["Name"]; // 取得欄位資料
      $address = $_POST["Address"];
      $number = $_POST["Number"];
      $sql = "UPDATE renjie SET name='".$name."', address='".$address."',number='".$number."' WHERE id=".$id;
      mysqli_query($link, $sql);  // 執行SQL指令
      header("Location: contacts.php"); // 轉址
      break;
   case "del":    // 刪除操作
      $sql = "DELETE FROM renjie WHERE id=".$id;
      mysqli_query($link, $sql);  // 執行SQL指令
      header("Location: contacts.php"); // 轉址
      break;
   case "edit":   // 編輯操作
      $sql = "SELECT * FROM renjie WHERE id=".$id;
      $result = mysqli_query($link, $sql); // 執行SQL指令
      $row = mysqli_fetch_assoc($result); // 取回記錄
      $name = $row['name']; // 取得欄位name
      $address = $row['address'];   // 取得欄位tel
      $number = $row['number'];
?>

<form action="edit.php?action=update&id=<?php echo $id ?>"
      method="post">

<tr><td><font size="2">姓名: </font></td>
   <td><input type="text" name="Name" size="20" 
   maxlength="10" value="<?php echo $name ?>"/></td></tr>
<tr><td><font size="2">電話 : </font></td>
   <td><input type="text" name="Address" size="20"
   maxlength="20" value="<?php echo $address ?>"/></td></tr>
<tr><td><font size="2">電話 : </font></td>
   <td><input type="text" name="Number" size="20"
   maxlength="20" value="<?php echo $number ?>"/></td></tr>
<tr><td colspan="2" align="center">
    <input type="submit" value="更新連絡資料"/></td></tr>

</form>
<?php   
       break;
} 
require_once("mycontacts_close.inc");
?>
</article>
</section>
</div>

<div class="outer">
<section id="main">
<article class="article-type-poat">
<tr class="card" >
   <td><a href="shop.php">首頁</a></td>
   <td><a href="add.php">新增聯絡資料</a></td>
   <td ><a href="search.php">搜尋通訊錄</a></td>
</tr>
</article>
</section>
</div>

</body>
</html>

