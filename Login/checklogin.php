<?php
require_once 'functions.php';

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="ppaidb"; // Database name 
$tbl_name="members"; // Table name 


//Start a session
session_start();



if($_SESSION['logged_in']==true)
{
	echo 'Logged_in';
}

else
{
		
	// Connect to server and select databse.
	$loginCon=mysqli_connect($host,$username,$password,$db_name);
	
	if(mysqli_connect_errno())
	{
		echo mysqli_connect_error();
		exit();
	}
	
	$myusername=$_POST['myusername'];
	$mypassword=$_POST['mypassword'];
	
	//$myusername=$mysqli->real_escape_string($_POST['myusername']);
	//$mypassword=$mysqli->real_escape_string($_POST['mypassword']);

	
	$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
	$result=mysqli_query($loginCon,$sql);

	
	if(is_object($result) && $result->num_rows==1)
	{
		
		$_SESSION['logged_in']=true;
		$_SESSION['wrong_info']=false;
		$_SESSION['username']=$myusername;
		redirect('../index.php');
	}
	else
	{
		$_SESSION['wrong_info']=true;
		redirect('main_login.php');
	}
	
}



?>
