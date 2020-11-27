<?php
	session_start();
	if(!isset($_SESSION['username'])||($_SESSION['username']==null))
	{
		echo "<script>alert('请先登录！');window.location.href='index.html';</script>";
	}
	else
	{
		require("../compoents/coon.php");
		$userid=$_SESSION['userid'];
		$bookid=$_GET['bookid'];
		$sql="select bookid from orders where userid=$userid";
		$res=mysqli_query($link,$sql);
		$status=false;
		while($row=mysqli_fetch_assoc($res))
		{
			if($bookid==$row['bookid'])
			{
				$status=true;	
			}	
		}
		if($status)
		{
			$sql="update orders set number=number+1,total=total+
			(select price from bookinfo where bookid=$bookid)
			where userid=$userid and bookid=$bookid";
			$res=mysqli_query($link,$sql);
			header('location:../show.php');	
		}
		else
		{
			$sql="select price from bookinfo where bookid=$bookid";
			$res=mysqli_query($link,$sql);
			$row=mysqli_fetch_assoc($res);
			$total=$row['price'];	
			$sql="insert into orders(userid,bookid,number,total) values($userid,$bookid,1,$total)";	
			$res=mysqli_query($link,$sql);
			$sql="select orderid from orders where userid=$userid and bookid=$bookid";
			$res=mysqli_query($link,$sql);
			$row=mysqli_fetch_assoc($res);
			$orderid=$row['orderid'];
			$sql="insert into usercart values($userid,$orderid)";
			$res=mysqli_query($link,$sql);
			header('location:../show.php');
		}
	}
?>