<?php
define('DB_SERVER','localhost');
define('DB_USER','php_test');
define('DB_PASS' ,'irm2016HOLD*+*!');
define('DB_NAME', 'testing');

class DB_con
{
 	function __construct()
 	{
  		$conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die('localhost connection problem'.mysql_error());
  		mysql_select_db(DB_NAME,$conn);
 	}
 
	/*Recieve four parameters(sanitazed) from the object
	 * Creates an insert query and insert the data into
	 * Assign bolean value of true if query run succesfully
	 * Keep primary key of the current user and use it when
	 * returning the sign-up success text. 
	 * */
 	public function insert($name,$email,$country,$dob)
 	{
  		$res = mysql_query("INSERT INTO signup (id,name,email,country,dob) 
  			VALUES('','$name','$email','$country',$dob)");
  		return $res;
 	}

 	
}

?>