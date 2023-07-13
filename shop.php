<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>shop.php</title>
</head>
<body >
<div class="outer">
<section id="main">
<article class="article-type-poat">
<table>
<tr>
   <td><p class="container">編號</p></td><p class="container"><td>公司名稱</p></td>
   <td><p class="container">料件名稱</p></td><td><p class="container">統編</p></td>
</tr>
<?php
// 插入函式庫的PHP檔案
require_once("dataAccess.php");
// 建立dataAccess物件的資料庫連接
$dao = new dataAccess("localhost","root",
                      "A12345678","myschool");
$sql = "SELECT * FROM renjie";  // 建立SQL指令字串
$dao->fetchDB($sql);  // 執行SQL查詢指令字串
$flag = false;
// 顯示資料庫內容
while ( $row = $dao->getRecord() ) {
?>
<tr>
<td class="sql"><?php echo $row["id"] ?></td>
<td class="sql"><?php echo $row["name"] ?></td>
<td class="sql"><?php echo $row["address"] ?></td>
<td class="sql"><?php echo $row["number"] ?></td>
</tr>
<?php
} ?>
</table>
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
