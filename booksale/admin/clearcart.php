<?php
	session_start();
	if(!isset($_SESSION['username'])||($_SESSION['username']==null))
	{
		echo "<script>alert('请先登录！');window.location.href='../index.html';</script>";
	}
	else
	{
		require("../compoents/coon.php");
		$userid=$_SESSION['userid'];
		$bookid=$_GET['bookid'];
		$sql="select orderid from orders where userid=$userid and bookid=$bookid";
		$res=mysqli_query($link,$sql);
		$row=mysqli_fetch_assoc($res);
		$orderid=$row['orderid'];
		$sql="delete from orders where userid=$userid and bookid=$bookid";
		$res=mysqli_query($link,$sql);
		$sql="delete from usercart where userid=$userid and orderid=$orderid";
		$res=mysqli_query($link,$sql);
		header('location:../mycart.php');
	}
?>