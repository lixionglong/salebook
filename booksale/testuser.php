<?php
	session_start();
	require("compoents/coon.php");
	$username=$_GET['username'];
	$sql="select userid from users where username='$username'";
	$res=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($res);
	$userid=$row['userid'];
	if($userid) echo '<font color="#FF0000">用户名存在</font>';
	else echo '<font color="#FF0000">可以注册</font>';
?>
