<?php
	session_start();
	$tel=$_GET['tel'];
	if(!preg_match("/^1[34578]\d{9}$/",$tel)) echo '<font color="#FF0000">电话号码格式错误</font>';
	else echo '<font color="#FF0000"></font>';
?>