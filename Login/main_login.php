<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Slick Login</title>
<meta name="description" content="slick Login">
<meta name="author" content="Webdesigntuts+">
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://www.modernizr.com/downloads/modernizr-latest.js"></script>
<script type="text/javascript" src="placeholder.js"></script>
</head>
<body>

<form id="slick-login" method="post" action="checklogin.php">
<?php 
session_start();
if($_SESSION['wrong_info']==true)
{
	echo '<b>Wrong Username or Password!</b>';
}
?>
<label for="username">username</label><input name="myusername" type="text" id="myusername">
<label for="password">password</label><input name="mypassword" type="password" id="mypassword">
<!--  <label for="username">username</label><input type="text" name="username" >
<label for="password">password</label><input type="password" name="password">-->
<input type="submit" value="Log In">
</form>
</body>
</html>