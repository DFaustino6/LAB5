<?php
	include 'db.php';
	

	function checkSubmission(){
	$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
		if($db){
			$query= "SELECT * from users where email = {$_REQUEST['Email']}";
		
			if($_REQUEST['Email']>0)
				return 1;
			if($_REQUEST['ConfPwd']!=$_REQUEST['Pwd'])
				return 4;
			else
				submit();
		}
	mysql_close($db);
	}

	function submit($db){
	$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
		if ($db) {
			echo "entered submit";
			$pwdHash=substr(md5($_REQUEST['Pwd']),0,32);
			$query="INSERT INTO users(name,email,password_digest,created_at,updated_at)
			VALUES ({$_REQUEST['Username']},{$_REQUEST['Email']},{$pwdHash},NOW(),NOW())";
		}
		 mysql_close($db);	
	}
	
?>	