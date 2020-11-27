<?php
	session_start();
	if(!isset($_SESSION['username'])||($_SESSION['username']==null))
	{
		echo "<script>alert('请先登录！');window.location.href='index.html';</script>";
	}
	require("../compoents/coon.php");
	$bookid=$_GET['bookid'];
	$number=$_GET['num'];
	$userid=$_SESSION['userid'];
	$sql="select price from bookinfo where bookid='{$bookid}'";
	$res=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($res);
	$price=$row['price'];
	$sql="update orders set number=number+{$number},total=total+{$number}*{$price}
		where userid='{$userid}' and bookid='{$bookid}'";
	$res=mysqli_query($link,$sql);
	header('location:../mycart.php');	
?>
