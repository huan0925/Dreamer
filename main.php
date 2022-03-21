<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>主頁</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<style>
    body{
        background:url("images/21.png") no-repeat center;
        text-align: center;
    }
    .sign{
        width: 100%;
        display: flex;
    }
    .signup{
        text-align: center;
        width: 50%;
    }

    .signup button{
        width: 85%;
        text-align: center;
        border: 2px solid #00BFFF;
        color: 	#00BFFF;
        border-radius: 30px;
        margin-bottom: 20px;
        padding: 12px 0px;
        font-size: 18px;
        cursor: pointer;
    }
    .signup button:hover{
        background: #00BFFF;
        color: white;
    }
</style>
<body>
    <center>
        <form method="post" accept-charset="utf-8" >
                <div class="sign">     
                    <div class="signup" style="padding-left:25%; padding-top:8%;">
                        <img src="images/dream.jpg" >
                        <h3 style="font-size: 30px;">創造夢想的平台</h3>
                        <h3 style="font-size: 30px;">有夢最美，希望相隨！</h3>
                        <button id="login" name="login">login</button>
                        <?php 
                        if (isset($_POST['login'])) {
                            echo "<script>window.open('login.php','_self') </script>";
                        }
                        ?>
                        <button id="singup" name="signup">sign up</button>
                        <?php 
                        if (isset($_POST['signup'])) {
                            echo "<script>window.open('register.php','_self') </script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </form>
    </center>
</body>
</html>