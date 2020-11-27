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
			$orderid=$_GET['orderid'];
			$sql="delete from orders where orderid=$orderid";
			$sql1="delete from usercart where orderid=$orderid";
			$res=mysqli_query($link,$sql);
			$res=mysqli_query($link,$sql1);
			header("Location:lookuporders.php");	
		}	
	}
?>
