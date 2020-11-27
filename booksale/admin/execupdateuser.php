<?php
	session_start();
	if (!isset($_SESSION['username'])||$_SESSION['username']==null)
	{
		echo "<script>alert('请先登录！');window.location.href='../index.html';</script>";	
	}
	else
	{
		if(!isset($_SESSION['status'])||($_SESSION['status']==null))
		{
			echo "<script>alert('您没有权限！');history.go(-1);</script>";	
		}	
		else
		{
			require("../compoents/coon.php");	
			require("menu.html");
			$userid=$_GET['userid'];
			$password=$_POST['password'];
			$tel=$_POST['tel'];
			$addr=$_POST['addr'];
			$sql="update users set password='{$password}',tel='{$tel}',addr='{$addr}' where userid=$userid";
			$res=mysqli_query($link,$sql);
			header("Location:usermanage.php");
		}
	}
?>