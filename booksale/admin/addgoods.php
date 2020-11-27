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
			$typelist=array(1=>"教材",2=>"文学",3=>"人文社科",4=>"科技",5=>"其他");
		}	
	}
?>
 <h3>发布商品信息</h3>
 <div id="left">
   <form action="execaddbooks.php" method="post" enctype="multipart/form-data">
   <table>
    <tr>
            <th class="info"></th>
            <th class="input"></th>
        </tr>
        <tr>
            <td class="info">书名</td>
            <td class="input"><input type="text" name="bookname" id="bookname"></td>
        </tr>
        <tr>
            <td class="info">类型</td>
            <td class="input">
                <select name="typeid" id="typeid">
                <?php
                    foreach ($typelist as $k=>$v)
                    {
                        echo "<option value='$k'>$v</option>";
                    }
                ?>
                </select>

            </td>
        </tr>
        <tr>
            <td class="info">作者</td>
            <td class="input"><input type="text" name="author" id="author"></td>
        </tr>
        <tr>
            <td class="info">出版社</td>
            <td class="input"><input type="text" name="publish" id="publish"></td>
        </tr>
        <tr>
            <td class="info">出版日期</td>
            <td class="input"><input type="date" name="cbdate" id="cbdate"></td>
        </tr>
        <tr>
            <td class="info">数量</td>
            <td class="input"><input type="text" name="number" id="number"></td>
        </tr>
        <tr>
            <td class="info">单价</td>
            <td class="input"><input type="text" name="price" id="price"></td>
        </tr>
        <tr>
            <td class="info">图片</td>
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000000"/>
            <td class="input"><input type="file" name="filename" id="filename"/></td>
        </tr>
        <tr>
            <td></td>
            <td class="input">
               <input type="submit" value="添加" id="submit" onclick="mysubmit()">

            <input type="reset" value="重置" id="reset"></td>
        </tr>
        </table>
      </form>
    </div>
</body>
</html>