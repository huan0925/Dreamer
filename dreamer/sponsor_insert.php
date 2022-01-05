<?php 
session_start();
include('conn.php');

$user = $_SESSION['email'];
$get_user = "SELECT * FROM user WHERE email='$user'"; 
$run_user = mysqli_query($link,$get_user);
$row=mysqli_fetch_array($run_user);  
$user_id = $row['user_id'];

$sponsor_post_id = $_SESSION['sponsor_post_id'];
$sponsor_price = $_SESSION['sponsor_price'];

//get post title and project priciple
$get_from_post = "select * from post where post_id = '$sponsor_post_id'";
$run_post = mysqli_query($link,$get_from_post);
while($row_post = mysqli_fetch_array($run_post)){
    $proj_title = $row_post['title'];
    $proj_priciple = $row_post['proj_name'];
    $sponsor_total = $row_post['sponsor_total'];
}
$total = $sponsor_price+$sponsor_total;
$insert = "insert into sponsor (sponsor_user_id,post_id,title,principle_name,sponsor_price) 
values ('$user_id','$sponsor_post_id','$proj_title','$proj_priciple',$sponsor_price)";
$run = mysqli_query($link,$insert);	

$update = "update post set sponsor_total='$total' where post_id = '$sponsor_post_id'"; 
$run_update = mysqli_query($link,$update); 

?>
