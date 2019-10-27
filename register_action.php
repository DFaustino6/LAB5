<?php
	include 'db.php';
	$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);

	function checkSubmission(){
	if($db){
		$query= "SELECT * from users where email = {$_REQUEST['Email']}";
	
		if($_REQUEST['Email']>0)
			return 1;
		if($_REQUEST['ConfPwd']!=$_REQUEST['Pwd'])
			return 4;
		else
			submit();
		}
	}

	function submit(){
	if ($db) {
		$pwdHash=substr(md5($_REQUEST['Pwd']),0,32);
		$query="INSERT INTO users(name,email,password_digest,created_at,updated_at)
		VALUES ({$_REQUEST['Username']},{$_REQUEST['Email']},{$pwdHash},NOW(),NOW())";
	}
		
	}
	 mysql_close($db);
?>	