<?php
	session_start();
	if (!isset($_SESSION['username'])||$_SESSION['username']==null)
	{
		echo "<script>alert('请先登录！');window.location.href='index.html';</script>";	
	}
	else
	{
		require("compoents/coon.php");	
		$userid=$_SESSION['userid'];
		$password=$_POST['password'];
		$tel=$_POST['tel'];
		$addr=$_POST['addr'];
		$sql="update users set password='{$password}',tel='{$tel}',addr='{$addr}' where userid=$userid";
		$res=mysqli_query($link,$sql);
		echo "<script>alert('修改成功！');window.location.href='show.php';</script>";
	}
?>