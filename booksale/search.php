<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/show.css" rel="stylesheet" />
<style>
	a
	{text-decoration:none;}
</style>
</head>

<body>
<?php
	session_start();
	if(!isset($_SESSION['username'])||($_SESSION['username']==null))
	{
		echo "<script>alert('请先登录！');window.location.href='index.html';</script>";
	}
	else
	{
	require("compoents/coon.php");
	$content='';
	if(@$_POST['content']==null)
	{
		 echo"<script>alert('请输入查询关键字！');history.go(-1);</script> ";	
	}
	else
	{
		$content=$_POST['content'];
		$sql="select * from bookinfo where bookname like '%".$content."%' or author like '%".$content."%' 
		or publish  like '%".$content."%'";	
		$res=mysqli_query($link,$sql);
		$num=mysqli_num_rows($res);
		if($num>0)
		{
			echo '
				<form action="search.php" method="post">
				<div id="nav">
				<form action="search.php" method="post">
							<label>请输入要搜索的内容</label>
							<input type="text" name="content" />
							<button type="submit" value="搜索">搜索</button>
							<a id="one"href="show.php">浏览商品</a>
							<a id="one" href="mycart.php">我的购物车</a>
							<a id="one" href="userupdate.php">修改信息</a>
				</div>
				</form>
			';
			echo "<font color='red'><h2 align='center'>为您找到{$num}条记录</h2></font>";
			while($row=mysqli_fetch_assoc($res))
			{
				echo"
				<div id='container'>
					<img src='picture/{$row['pic']}'>
					<p>书名:{$row['bookname']}</p>
					<p>作者:{$row['author']}</p>
					<p>出版社:{$row['publish']}</p>
					<p>库存:{$row['number']}本</p>
					<label>价格:{$row['price']}</label>
					<br><br><a href='admin/addcart.php?bookid={$row['bookid']}'>加入购物车</a>
				</div>
				"; 
			}
		}
		else
		{
			echo '
				<form action="search.php" method="post">
				<div id="nav">
				<form action="search.php" method="post">
							<label>请输入要搜索的内容</label>
							<input type="text" name="content" />
							<button type="submit" value="搜索">搜索</button>
							<a id="one"href="show.php">浏览商品</a>
							<a id="one" href="mycart.php">我的购物车</a>
							<a id="one" href="userupdate.php">修改信息</a>
				</div>
				</form>
			';
				echo "<font color='red'><h2 align='center'>没有找到相关记录</h2></font>";
		}
 	}
	}
?>
</body>
</html>