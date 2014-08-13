<?php
require_once('visitors_connections.php');//the file with connection code and functions
//get the required data

$visitor_ip = GetHostByName($REMOTE_ADDR);
$visitor_browser = getBrowserType();
$visitor_hour = date("h");
$visitor_minute = date("i");
$visitor_day = date("d");
$visitor_month = date("m");
$visitor_year = date("Y");
$visitor_refferer = GetHostByName($HTTP_REFERER);
$visited_page = selfURL();



mysqli_query($visitors,"INSERT INTO visitors_table (visitors_ip, visitors_browser, visitors_hour,
 visitors_minute, visitors_date, visitors_day, visitors_month, visitors_year, 
 visitors_refferer, visitors_page) VALUES ('$visitor_ip', '$visitor_browser', 
 '$visitor_hour', '$visitor_minute', '$visitor_date', '$visitor_day', '$visitor_month', 
 '$visitor_year', '$visitor_refferer', '$visitor_page')");



?>