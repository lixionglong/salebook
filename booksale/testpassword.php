<?php
	session_start();
	$password=$_GET['password'];
	if(!preg_match('/^[_0-9a-z]{6,16}$/',$password)) echo '<font color="#FF0000">密码为6位到16位长只能包含数字或字母</font>';
	else echo '<font color="#FF0000"></font>';
?>