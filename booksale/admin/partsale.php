<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
	table
	{
		width:600px;
		border: 1px solid #000;
		margin: 100px auto;	
	}
	th
	{
		font-size:30px;
		color:black;
		text-align: center;
		border: 1px solid #000;
	}
	td
	{
		font-size:30px;
		color:black;
		text-align: center;
		border: 1px solid #000;
	}
</style>
<style type="text/css">
 	body{background-image:url(../picture/back.JPG);
	background-repeat:no-repeat;
	background-size:100%;}
 </style>
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
			$year=$_POST['year'];
			$month=$_POST['month'];
			$sql="call sale_rank($year,$month)";
			$res=mysqli_query($link,$sql);	
			echo "<h2 align='center'>{$year}年{$month}月的销售记录如下</h2>";
		}		
	}
?>
<table>
<tr>
<th>书名</th>
<th>数量</th>
</tr>
<?php
	while($row=mysqli_fetch_assoc($res))
	{
		echo "
			<tr>
				<td>{$row['书名']}</td>
				<td>{$row['总数']}</td>
				</tr>
			";	
	}
?>
</table>
</body>
</html>