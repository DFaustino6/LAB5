<?php
	$query= "SELECT * from users where email = $_REQUEST['Email']"
	if($_REQUEST['Email']>0)
		return 1;
	if($_REQUEST['ConfPwd']!=$_REQUEST['Pwd'])
		return 4;
	else{
		$pwdHash=substr(md5($_REQUEST['Pwd']),0,32);
		INSERT INTO users(name,email,password_digest,created_at,updated_at)
		VALUES ($_REQUEST['Username'],$_REQUEST['Email'],$_REQUEST[$pwdHash],NOW(),NOW())
	}
?>	