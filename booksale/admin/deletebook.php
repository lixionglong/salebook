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
			$bookid=$_GET['bookid'];
			$sql="delete from bookinfo where bookid=$bookid";
			$res=mysqli_query($link,$sql);	
			$sql="select orderid from orders where bookid=$bookid";
			$res=mysqli_query($link,$sql);
			while($row=mysqli_fetch_assoc($res))
			{
				$sql="delete from usercart where orderid={$row['orderid']}";
				$res1=mysqli_query($link,$sql);	
			}
			$sql="delete from orders where bookid=$bookid";
			$res=mysqli_query($link,$sql);
			header("Location:manage.php");	
		}	
	}
?>