<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<link rel="stylesheet" type= "text/css" href ="style.css"/>
<meta charset="UTF-8">
<body>
  <?php
    
     ?>
<div id="content">
 
  <form action="artcon.php" method="POST" action="" enctype="multipart/form-data">
      <input type="text" name="title" placeholder="請輸入標題！">
      <input type="textarea" name="content" placeholder="請輸入內容！">
      <input type="file" name="uploadfile" value=""/>
      
      <div>
          <button type="submit" name="upload" value="upload">UPLOAD</button>
        </div>
  </form>
</div>
</body>
</html>