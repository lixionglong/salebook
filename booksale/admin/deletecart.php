<?php
	session_start();
	if(!isset($_SESSION['username'])||($_SESSION['username']==null))
	{
		echo "<script>alert('请先登录！');window.location.href='index.html';</script>";
	}
	else
	{
		require("../compoents/coon.php");
		$userid=$_GET['userid'];
		$sql="select bookid,number from usercart,orders where usercart.userid=$userid and
		orders.userid=$userid and usercart.userid=orders.userid and usercart.orderid=orders.orderid";
		$res1=mysqli_query($link,$sql);
		$date=date('Y-m-d');
		while($row=mysqli_fetch_assoc($res1))
		{
			$sql="select saleid from sale where bookid={$row['bookid']} and saledate='{$date}'";
			$res2=mysqli_query($link,$sql);
			$row2=mysqli_fetch_assoc($res2);
			$saleid=$row2['saleid'];
			//$num=mysqli_affected_rows($res2);
			if($saleid==null)
			{
				$sql="insert into sale(bookid,number,saledate) values({$row['bookid']},{$row['number']},'{$date}')";	
				$res3=mysqli_query($link,$sql);
				$sql="update bookinfo set number=number-{$row['number']} where bookid={$row['bookid']}";
				$res3=mysqli_query($link,$sql);
			}
			else
			{
				$sql="update sale set number=number+{$row['number']} where saleid=$saleid";
				$res3=mysqli_query($link,$sql);
				$sql="update bookinfo set number=number-{$row['number']} where bookid={$row['bookid']}";
				$res3=mysqli_query($link,$sql);
			}
			$sql1="delete from usercart where userid=$userid";
			$sql2="delete from orders where userid=$userid";
			$res3=mysqli_query($link,$sql1);
			$res3=mysqli_query($link,$sql2);
				
		}
		header('location:../mycart.php');
	}
?>
