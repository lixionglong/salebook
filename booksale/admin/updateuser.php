<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" href="../css/add.css">
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
			$userid=$_GET['userid'];
			$sql="select * from users where userid=$userid";
			$res=mysqli_query($link,$sql);	
		}
	}
?>
<h3>修改客户信息</h3>
<?php
	while($row=mysqli_fetch_assoc($res))
	{
		echo "
		<div id='left'>
   		<form action='execupdateuser.php?userid={$userid}' method='post'>
   		<table>
			<tr>
            <td class='info'>用户名</td>
            <td class='input'>{$row['username']}</td>
			</tr>
			<tr>
            <td class='info'>密码</td>
            <td class='input'><input type='text' name='password' value='{$row['password']}' ></td>
        </tr>
		<tr>
            <td class='info'>电话号码</td>
            <td class='input'><input type='text' name='tel' value='{$row['tel']}' ></td>
        </tr>
		<tr>
            <td class='info'>收货地址</td>
            <td class='input'><input type='text' name='addr' value='{$row['addr']}' ></td>
        </tr>
		";	
	}   
?>
<tr>
            <td></td>
            <td class="input">
            <input type="submit" value="修改" id="submit">

            <input type="reset" value="重置" id="reset"></td>
        </tr>
        </table>
      </form>
</body>
</html>