<?php
	session_start();
	require("../compoents/coon.php");
	/*$msg=array('code'=>0,'msg'=>'未知错误');
	$username=@trim($_POST['username']);
	$password=@trim($_POST['password']);
	$id=@$_POST['id'];
	if(@$username=="")
	{
		$msg['code']=0;
		$msg['msg']="用户名不能为空";
	}
	else if(@$password=="")
	{
		$msg['code']=0;
		$msg['msg']="密码不能为空";	
	}
	else if($id=='1')
	{
		$sql="select * from users where username='{$username}' and password='{$password}'";
		$res=mysqli_query($link,$sql);
		$row=mysqli_fetch_assoc($res);
		$num=mysqli_num_rows($res);
		if($num>0)
		{
			$msg['code']=1;
			$msg['msg']="登陆成功";
			$_SESSION['username']=$row['username'];
			$_SESSION['userid']=$row['userid'];	
		}
		else
		{
			$msg['code']=0;
			$msg['msg']="用户名或密码错误";	
		}
	}
	else
	{
		$sql="select * from admins where account='{$username}' and password='{$password}'";
		$res=mysqli_query($link,$sql);
		$row=mysqli_fetch_assoc($res);
		$num=mysqli_num_rows($res);
		if($num>0)
		{
			$msg['code']=2;
			$msg['msg']="登陆成功";
			$_SESSION['username']=$row['username'];
			$_SESSION['userid']=$row['userid'];
			$_SESSION['status']='admin';	
		}
		else
		{
			$msg['code']=0;
			$msg['msg']="用户名或密码错误";	
		}
	}
	 echo json_encode($msg);*/
	 if(@$_POST['username']==null)
	{
		echo "<script>alert('用户名不能为空!');window.location.href='../index.html';</script>";
	}
	else if($_POST['password']==null)
	{
		echo "<script>alert('密码不能为空!');window.location.href='../index.html';</script>";
	}
	else
	{
		$id=$_POST['id'];
		if($id=='1')
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$sql="select * from users where username='{$username}' and password='{$password}'";
			$res=mysqli_query($link,$sql);
			$row=mysqli_fetch_assoc($res);
			$num=mysqli_num_rows($res);
			if($num>0)
			{
				$_SESSION['username']=$username;
				$_SESSION['userid']=$row['userid'];
				echo "<script>window.location.href='../show.php';</script>";
			}
			else
			{
				echo "<script>alert('用户名或密码错误!');history.go(-1);</script>";
			}		
		}
		else
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$sql="select * from admins where account='{$username}' and password='{$password}'";
			$res=mysqli_query($link,$sql);
			$row=mysqli_fetch_assoc($res);
			$num=mysqli_num_rows($res);
			if($num>0)
			{
				$_SESSION['username']=$username;
				$_SESSION['status']='admin';
				echo "<script>window.location.href='manage.php';</script>";
			}
			else
			{
				echo "<script>alert('用户名或密码错误!');history.go(-1);</script>";
			}
		}
	}
?>
