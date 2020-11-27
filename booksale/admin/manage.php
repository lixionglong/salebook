<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../css/manage.css" rel="stylesheet" />
<link href="../css/show.css" rel="stylesheet" />
</head>

<body>
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
			$res=mysqli_query($link,"select * from bookinfo");
			while($row=mysqli_fetch_assoc($res))
			{
				echo"
				<div id='container'>
					<img src='../picture/{$row['pic']}'>
					<p>书名:{$row['bookname']}</p>
					<p>作者:{$row['author']}</p>
					<p>出版社:{$row['publish']}</p>
					<p>库存:{$row['number']}本</p>
					<label>价格:{$row['price']}</label>
					<br><a id='one' href='updatebook.php?bookid={$row['bookid']}'>修改</a>
					<a id='one' href='deletebook.php?bookid={$row['bookid']}'>删除</a>
				</div>
				"; 
			}
		}	
	}
?>
</body>
</html>