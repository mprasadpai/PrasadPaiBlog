<?php
require_once 'functions.php';
session_start();
unset($_SESSION['logged_in']);
unset($_SESSION['username']);
session_destroy();
redirect("../index.php");

?>

