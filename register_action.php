<?php
	include 'db.php';
	
	$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
		if($db && !empty($_REQUEST)){
			$Email = $_REQUEST['Email'];
			$query= "SELECT * from users where email = '$Email'";
			if(!($result = @ mysql_query($query,$db)))
   				showerror();
   			$nrows  = mysql_num_rows($result);
   			echo $nrows;
			if($nrows>0){
				$ErrorType=1;
				returnRegister("",$_REQUEST['Username'],$ErrorType);
			}
			if($_REQUEST['ConfPwd']!=$_REQUEST['Pwd']){
				$ErrorType=4;
				returnRegister($Email,$_REQUEST['Username'],$ErrorType);
			}
			else
				submit($db);
		}

	function submit($db){
			$pwdHash=substr(md5($_REQUEST['Pwd']),0,32);
			$Email = $_REQUEST['Email'];
			$Username = $_REQUEST['Username'];
			$query="INSERT INTO users(name,email,password_digest,created_at,updated_at)
			VALUES ('$Username','$Email','$pwdHash',NOW(),NOW())";
			$result= @ mysql_query($query,$db);
			header("Location: register_success.html");
	}
	mysql_close($db);

	function returnRegister($Email,$Username,$ErrorType) {
    	header("Location: register.php?ErrorType=$ErrorType&Email=$Email&Username=$Username");
	}
?>	