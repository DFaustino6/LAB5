<?php
	include 'db.php';
	print_r ($_REQUEST);


	$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
		if($db && !empty($_REQUEST)){
			$Email = $_REQUEST['Email'];
			$query= "SELECT * from users where email = '$Email'";
			if(!($result = @ mysql_query($query,$db)))
   				showerror();
   			$nrows  = mysql_num_rows($result);

			if($nrows>0){
				mysql_close($db);
				$ErrorType=1;
				redirect("",$Username,$ErrorType);
				return $ErrorType;
			}
			if($_REQUEST['ConfPwd']!=$_REQUEST['Pwd']){
				mysql_close($db);
				$ErrorType=4;
				redirect("",$Username,$ErrorType);
				return $ErrorType;
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
			echo $query;
			header("Location: register_success.html");
	}
	mysql_close($db);

	function redirect($Email,$Username,$Error) {
    	header("Location: register.php?Error=$ErrorType&Email=$Email&Username=$Username");
	}
?>	