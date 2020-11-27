<?php

	require("../compoents/coon.php");
	$msg=array('code'=>1,'msg'=>'注册成功');
	$username=@$_POST["username"];	//获取各个表单元素的值
	$password=@$_POST["password"];
	$sex=@$_POST['sex'];
	if($sex=='1') $sex='男';
	else $sex='女';
	$tel=@$_POST['tel'];
	$addr=@$_POST['addr'];
	$zcdate=date("Y-m-d");
	$sql="select userid from users where username='$username'";
	$res=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($res);
	
	$userid=$row['userid'];
	if($userid)
	{
		$msg['code']=0;
		$msg['msg']="用户已经存在";	
	}
	else if(!preg_match('/^[_0-9a-z]{6,16}$/',$password))
	{
		
		$msg['code']=0;
		$msg['msg']="密码为6位到16位长只能包含数字或字母";	
	}
	else if(!preg_match("/^1[34578]\d{9}$/",$tel))
	{
		$msg['code']=0;
		$msg['msg']="电话号码格式错误";	
	}
	else
	{
		$sql="
			insert into users(username,password,sex,tel,zcdate,addr)
			values('$username','$password','$sex','$tel','$zcdate','$addr')
		";
		$res=mysqli_query($link,$sql);
		$userid=mysqli_insert_id($link);
		if(!$userid)
		{
		  $msg['code']=0;
		  $msg['msg']="注册失败";	
		}	
	}
	 echo json_encode($msg);
?>
