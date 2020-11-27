<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>	
<style type="text/css">
	table
{
	width:90%;
	border: 1px solid #000;
	margin: 100px auto;
}
th
{
	font-size:20px;
	color:black;
	text-align: center;
	border: 1px solid #000;
}
td
{
	font-size:20px;
	color:black;
	text-align: center;
	border: 1px solid #000;
}
a
	{text-decoration:none;}
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
			$res=mysqli_query($link,"select * from users");	
		}	
	}
?>
<table>
<tr>
<th>用户名</th>
<th>密码</th>
<th>性别</th>
<th>联系方式</th>
<th>收获地址</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
<?php
	while($row=mysqli_fetch_assoc($res))
	{
		echo "
			<tr>
				<td>{$row['username']}</td>
				<td>{$row['password']}</td>
				<td>{$row['sex']}</td>
				<td>{$row['tel']}</td>
				<td>{$row['addr']}</td>
				<td><a href='deleteuser.php?userid={$row['userid']}'>删除</a></td>
				<td><a href='updateuser.php?userid={$row['userid']}'>修改</a></td>
			</tr>
		";
	}
?>
</table>
</body>
</html>