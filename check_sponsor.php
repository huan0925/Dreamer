<?php 
    session_start();
    include("conn.php");
    $sponsor_user_id = $_SESSION['sponsor_user_id'];
    $sponsor_post_id = $_SESSION['sponsor_post_id'];
    //get sponsor price
    $sponsor_price = $_SESSION['sponsor_price'];
    //get post title and project priciple
    $get_from_post = "select * from post where post_id = '$sponsor_post_id'";
    $run_post = mysqli_query($link,$get_from_post);
    while($row_post = mysqli_fetch_array($run_post)){
        $proj_title = $row_post['title'];
        $proj_priciple = $row_post['proj_name'];
    }

    //get sponsor user name
    $get_from_user = "select * from user where user_id = '$sponsor_user_id'";
    $run_user = mysqli_query($link,$get_from_user);
    while($row_user = mysqli_fetch_array($run_user)){
        $user_name = $row_user['user_name'];
    }
    //session值的銷毀
    //unset($_SESSION['sponsor_user_id']);
    //unset($_SESSION['sponsor_post_id']);
    //echo $_SESSION['sponsor_user_id'];
?>
<style>
    body{
        background:url("images/21.png") no-repeat center; 
    }
    *{
		margin:0px;
		padding: 0px;
		box-sizing: border-box;
	}
	.rg_layout{
		width: 500px;
		height: 400px;
		border: 8px solid #EEEEEE;
		background-color: white;
		margin:auto;
		margin-top:80px;
		padding: 20px;
	}
	.rg_center{
		
		width: 450px;
	}
</style>

<center>
<div class="rg_layout">
	<div class="rg_center">
		<div class="rg_form">
				<div class="input-group">
                        <h1>請確認您的贊助資訊<br>確認後請利用Paypal付款</h1><hr><br>
                        <h2>贊助者： <?php echo"$user_name";?></h2><br>
                        <h2>專案名稱： <?php echo"$proj_title";?></h2><br>
                        <h2>專案負責人： <?php echo"$proj_priciple";?></h2><br>
                        <h2>贊助金額：<?php echo"$sponsor_price";?></h2><br>
                        <form action="https://ipnpb.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        	<input type="hidden" name="cmd" value="_xclick">
                        	<input type="hidden" name="business" value="sb-ow4fy8371920@business.example.com">
                        	<input type="hidden" name="lc" value="TW">
                        	<input type="hidden" name="item_name" value=<?php echo $proj_title?>>
                        	<input type="hidden" name="item_number" value=<?php echo $sponsor_post_id?>>
                        	<input type="hidden" name="amount" value=<?php echo $sponsor_price?>>
                        	<input type="hidden" name="currency_code" value="TWD">
                        	<input type="hidden" name="button_subtype" value="services">
                        	<input type="hidden" name="no_note" value="1">
                        	<input type="hidden" name="no_shipping" value="2">
                        	<input type="hidden" name="rm" value="1">
                        	<input type="hidden" name="return" value="http://localhost/dreamer/sponsor.php">
                        	<input type="hidden" name="cancel_return" value="http://localhost/dreamer/index.php">
                        	<input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynow_LG.gif:NonHosted">
                            <input type="hidden" name="notify_url" value="http://localhost/dreamer/sponsor_insert.php">
                        	<input type="image" style="width:150px;" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_paynow_SM.gif" border="0" name="submit" alt="PayPal － 更安全、更簡單的線上付款方式！">
                        	<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>
				</div>
		</div>
	</div>
</div>
</center>
