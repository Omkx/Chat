<?php 
if(!isset($dbh)){
 session_start();
 date_default_timezone_set("UTC");
 $musername = "root";
 $mpassword = "";
 $hostname  = "localhost";
 $dbname    = "chat";
 $dbh=new PDO('mysql:dbname='.$dbname.';host='.$hostname.";port=3306",$musername, $mpassword);
}
?>