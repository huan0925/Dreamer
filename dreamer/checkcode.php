<?php
if(!isset($_SESSION)){
    session_start();
    }  //判斷session是否已啟動

if((!empty($_SESSION['check_word'])) && (!empty($_POST['checkword']))){  //判斷此兩個變數是否為空
    
     if($_SESSION['check_word'] == $_POST['checkword']){
         
          $_SESSION['check_word'] = ''; //比對正確後，清空將check_word值
         
          header('content-Type: text/html; charset=utf-8');
         
          exit();
     }else{
         echo '<p> </p><p> </p><a href="./register.php">Error輸入錯誤，請重新試一次</a>';
         echo '<meta http-equiv="refresh" content="1; url=./register.php">';
     }

}
?>