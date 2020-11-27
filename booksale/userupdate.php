<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" href="css/add.css">
<link href="css/show.css" rel="stylesheet" />
<style type="text/css">
	body{background-image:url(picture/back.JPG);
	background-repeat:no-repeat;
	background-size:100%;}
</style>
</head>

<body>
<?php
	session_start();
	if (!isset($_SESSION['username'])||$_SESSION['username']==null)
	{
		echo "<script>alert('请先登录！');window.location.href='index.html';</script>";	
	}
	else
	{
		require("compoents/coon.php");	
	}
?>
<form action="search.php" method="post">
<div id="nav">
<form action="search.php" method="post">
			<label>请输入要搜索的内容</label>
			<input type="text" name="content" />
			<button type="submit" value="搜索">搜索</button>
            <a id='one' href="show.php">浏览商品</a>
            <a id="one" href="mycart.php">我的购物车</a>
            <a id="one" href="userupdate.php">修改信息</a>
</div>
</form>
<?php
	$userid=$_SESSION['userid'];
	$sql="select * from users where userid=$userid";
	$res=mysqli_query($link,$sql);	
?>
<h3>修改个人资料</h3>
<?php
	while($row=mysqli_fetch_assoc($res))
	{
		echo "
			<div id='left'>
   				<form action='execuserupdate.php' method='post'>
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
            <td class='info'>联系方式</td>
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