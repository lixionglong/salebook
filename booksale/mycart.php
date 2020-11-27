<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/show.css" rel="stylesheet" />
 <link rel="stylesheet" href="css/mycart.css">
 <style type="text/css">
 	a
	{text-decoration:none;
	color:#F00;
	margin-left:75px;
	font-size:20px;
	}
 </style>
</head>

<body>
<?php
	session_start();
	if(!isset($_SESSION['username'])||($_SESSION['username']==null))
	{
		echo "<script>alert('请先登录！');window.location.href='index.html';</script>";
	}
	require("compoents/coon.php");
?>
<form action="search.php" method="post">
<div id="nav">
<form action="search.php" method="post">
			<label>请输入要搜索的内容</label>
			<input type="text" name="content" />
			<button type="submit" value="搜索">搜索</button>
            <a href="show.php">浏览商品</a>
            <a href="mycart.php">我的购物车</a>
            <a href="userupdate.php">修改信息</a>
</div>
</form>
<h3>浏览我的购物车</h3>
<?php
	$sum=0;
	$userid=$_SESSION['userid'];
	$sql="select pic,bookname,price,orders.number,total,bookinfo.bookid from orders,bookinfo
			where userid='{$userid}' and orders.bookid=bookinfo.bookid";
	$res=mysqli_query($link,$sql);
	echo " <form method='post' action='admin/buy.php'>";
	 if(@(mysqli_num_rows($res)>0)) 
	 {
		  while ($row=mysqli_fetch_assoc($res))
		  {
					$sum=$sum+$row['total'];
                      echo "<div class='center'>
                                <div class='img'><img src='picture/{$row['pic']}' width='100px' height='100px' /></div>
                                <h4>{$row['bookname']}</h4><br>
                                <price><em>单价：</em>{$row['price']}</price><br><br>
                                <num>数量:<button type='button' onclick='window.location.href=\"admin/updatecart.php?bookid={$row['bookid']}&num=-1\"'>-</button>   
                                 {$row['number']}
                                <button type='button'  onclick='window.location.href=\"admin/updatecart.php?bookid={$row['bookid']}&num=1\"'>+</button></num>
                                <br><br>
                                <sum>合计:{$row['total']}元</sum>
                                <delete><a href='admin/clearcart.php?bookid={$row['bookid']}'>删除</a></delete>
                                <buy><a href='show.php'>购买</a></buy> 
                              </div>
							  ";	  
		  }
	 }
?>
<br>
<div id="total">
    <h5>总计金额
        <?php echo $sum."<a href='admin/deletecart.php?userid={$userid}'>结算</a>";?>
    </h5>
</div>
</body>
</html>