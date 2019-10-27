<?php
	include 'db.php';
	//print_r ($_REQUEST);


	$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
		if($db && !empty($_REQUEST)){
			$Email = $_REQUEST['Email'];
						$query= "SELECT * from users where email = '$Email'";
			if(!($result = @ mysql_query($query,$db)))
   				showerror();
   			$nrows  = mysql_num_rows($result);

			if($nrows>0)
				return 1;
			if($_REQUEST['ConfPwd']!=$_REQUEST['Pwd'])
				return 4;
			else
				submit($db);
		}

	function submit($db){
			$pwdHash=substr(md5($_REQUEST['Pwd']),0,32);
			$Email = $_REQUEST['Email'];
			$Username = $_REQUEST['Username'];
			$query="INSERT INTO users(name,email,password_digest,created_at,updated_at)
			VALUES ('$Username','$Email','$pwdHash',NOW(),NOW())";
	}
	mysql_close($db);
?>	