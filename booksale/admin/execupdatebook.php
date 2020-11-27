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
			$author=$_POST['author'];
			$publish=$_POST['publish'];
			$number=$_POST['number'];
			$price=$_POST['price'];
			$sql="update bookinfo set author='{$author}',publish='{$publish}',number=$number,price=$price where bookid=$bookid";
			$res=mysqli_query($link,$sql);
			header("Location:manage.php");
		}
	}
?>
